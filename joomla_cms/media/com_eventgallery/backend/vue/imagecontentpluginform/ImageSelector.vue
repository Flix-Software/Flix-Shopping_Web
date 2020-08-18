<style scoped>
    .fullscreenOverlay {
        /* Height & width depends on how you want to reveal the overlay (see JS below) */
        height: 100%;
        width: 100%;
        position: absolute;
        z-index: 1; /* Sit on top */
        left: 0;
        top: 0;
        background-color: white;
        padding: 10px;
        box-sizing: border-box;
    }

    .ImageSelector {
        display: flex;
        width: 100%;
    }

    .folders {
        width: 250px;
        margin-right: 20px;
        flex: 1;
    }

    ul {
        margin: 0;
    }

    li {
        cursor: pointer;
    }

    li:hover{
        background-color: #eee;
    }

    li.active {
        background-color: orange;
    }

    .folders ul {
        list-style: none;
    }

    .folders li {
        margin: 5px 0;
        padding: 5px;
    }



    .files {
        flex: 3;
        width: 100%;
        display: flex;
        flex-flow: row wrap;
        list-style: none;
        padding: 0;
    }

    .files ul {
        display: flex;
        flex-flow: row wrap;
    }

    .files li {
        display: block;
        box-sizing: border-box;
        width: 25%;
        flex-grow: 0;
        padding: 10px;
    }

    .files li img {
        width: 100%;
    }

    label {
        word-break: break-all;
    }

    .lds-dual-ring {
        display: inline-block;
        width: 80px;
        height: 80px;
    }
    .lds-dual-ring:after {
        content: " ";
        display: block;
        width: 64px;
        height: 64px;
        margin: 8px;
        border-radius: 50%;
        border: 6px solid #000;
        border-color: #000 transparent #000 transparent;
        animation: lds-dual-ring 1.2s linear infinite;
    }
    @keyframes lds-dual-ring {
        0% {
            transform: rotate(0deg);
        }
        100% {
            transform: rotate(360deg);
        }
    }
</style>
<template>
    <div>
        <div v-show="!showImageSelectorState">
            <div class="control-group">
                <div class="control-label"><Label :description="description" :label="label"></Label></div>
                <div class="controls">
                    <p v-show="value.thumb">
                    <img :src="value.thumb" style="max-height: 150px;">
                    </p>
                    <button v-on:click.prevent="showImageSelector">{{label}}</button>
                </div>
            </div>

        </div>
        <div v-show="showImageSelectorState" class="fullscreenOverlay">
            <div class="overlay-content">
                <div class="ImageSelector">
                    <div class="folders">
                        <button v-on:click.prevent="hideImageSelector">&lt;&lt;</button>
                        <input type="text" v-model="folderFilter">
                        <ul>
                            <li v-for="myFolder in filteredFolders" :key="myFolder.folder" :class="{active: (myFolder.folder === folder)}" v-on:click="loadFiles(myFolder.folder)">{{myFolder.name}}</li>
                        </ul>
                    </div>
                    <div class="files">
                        <div v-show="isLoading"><div class="lds-dual-ring"></div></div>
                        <ul v-show="!isLoading">
                            <li v-for="file in files" :key="file.id " v-on:click="setImage(file)">
                                <label>{{file.file}}</label>
                                <img :src="file.thumb">
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
    import Label from "./Label";

    export default {
        components: {
            Label
        },
        props: {
            name: null,
            label: null,
            description: null,
            loadFoldersUrl: null,
            loadFilesUrl: null,
            value: null
        },
        data() {
            return {
                file: "",
                thumb: "",
                folder: "",
                folders: [],
                files: [],
                isLoading: false,
                folderFilter: "",
                showImageSelectorState: false
            };
        },
        computed: {
            filteredFolders: function() {
                if (this.folderFilter === "") return this.folders;
                return this.folders.filter((folder)=>{
                    if (folder.folder.toLowerCase().indexOf(this.folderFilter.toLowerCase())>0) {
                        return true;
                    }
                    if (folder.name.toLowerCase().indexOf(this.folderFilter.toLowerCase())>0) {
                        return true;
                    }
                    return false;
                })
            },
            image: function() {
                let imageObject = {
                    file: this.file,
                    folder: this.folder,
                    thumb: this.thumb
                };
                return imageObject;
            }
        },
        created() {
            let xhr = new XMLHttpRequest();
            xhr.onreadystatechange = () => {
                if (xhr.readyState === 4) {
                    if (xhr.status === 200) {
                        try {
                            this.folders = JSON.parse(xhr.responseText);
                        } catch (e) {
                            console.log(e);
                        }
                    }
                }
            };

            xhr.open("GET", this.loadFoldersUrl);
            xhr.send();
        },
        methods: {
            loadFiles: function(folder) {
                if (this.isLoading) return;
                this.folder = folder;
                this.isLoading = true;
                let xhr = new XMLHttpRequest();
                xhr.onreadystatechange = () => {
                    if (xhr.readyState === 4) {
                        if (xhr.status === 200) {
                            try {
                                this.files = JSON.parse(xhr.responseText);
                                setTimeout(this.sendCustomEvent,500);

                            } catch (e) {
                                console.log(e);
                            }
                            this.isLoading = false;
                        }
                    }
                };

                xhr.open("GET", this.loadFilesUrl + '&folder=' + folder);
                xhr.send();
            },
            setImage: function(file) {
                if (file) {
                    this.folder = file.folder;
                    this.file = file.file;
                    this.thumb = file.thumb;
                }
                this.$emit('input', this.image);
                if (this.callback) this.callback();
                this.hideImageSelector();
                setTimeout(this.sendCustomEvent, 500);

            },
            sendCustomEvent: function() {
                let event = new CustomEvent('eventgallery-images-added');
                document.dispatchEvent(event);
            },
            showImageSelector: function() {
                this.showImageSelectorState = true;
            },
            hideImageSelector: function() {
                this.showImageSelectorState = false;
            }
        }
    };
</script>
