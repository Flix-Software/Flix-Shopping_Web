<style scoped lang="less">
</style>

<template>
    <div id="Filesync">

        <ErrorPanel :error-messages="errorMessages" :failed-folders="failedFolders" :headline="i18n.t('COM_EVENTGALLERY_SYNC_ERROR_HEADLINE')"></ErrorPanel>

        <ProcessSteps :i18n="i18n"
                      :number-of-selected-files="numberOfSyncableFiles"
                      :number-of-selected-folders="selectedFolders.length"
                      :is-ready-for-sync-files="isSyncFilesProcessReadyToStart"
                      :running="running"
                      :i18n_label-step1="i18n.t('COM_EVENTGALLERY_SYNC_STEP1')"
                      :i18n_label-step2="i18n.t('COM_EVENTGALLERY_SYNC_STEP2')"
                      :i18n_label-items-step2="i18n.t('COM_EVENTGALLERY_SYNC_STEP2_ITEMS')"
                      :i18n_label-step3="i18n.t('COM_EVENTGALLERY_SYNC_STEP3')"
                      :i18n_label-items-step3="i18n.t('COM_EVENTGALLERY_SYNC_STEP3_ITEMS')"
                      :i18n_hint-step2="i18n.t('COM_EVENTGALLERY_SYNC_STEP2_HINT')"
                      :i18n_hint-step3="i18n.t('COM_EVENTGALLERY_SYNC_STEP3_HINT')"
                      :i18n_label-button-step2="i18n.t('COM_EVENTGALLERY_SYNC_STEP2_BUTTON_LABEL')"
                      :i18n_label-button-step3="i18n.t('COM_EVENTGALLERY_SYNC_STEP3_BUTTON_LABEL')"
                      v-on:sync-files="syncFiles"
                      v-on:sync-folders="syncFolders">
        </ProcessSteps>

        <div class="control-group">
            <div class="controls">
                <div class="btn-group sync-buttons">
                    <button class="btn checkall" v-on:click="checkAll">{{i18n.t('COM_EVENTGALLERY_SYNC_CHECK_ALL')}}</button>
                    <button class="btn" v-on:click="uncheckAll">{{i18n.t('COM_EVENTGALLERY_SYNC_CHECK_NONE')}}</button>
                    <button class="btn btn-warning" :disabled="!running" v-on:click="stopQueue">{{i18n.t('COM_EVENTGALLERY_SYNC_STOP_QUEUE')}}</button>
                </div>
            </div>
        </div>

        <Progress v-if="numberOfTasks>0"
                  :remaining="numberOfTasks"
                  :total="numberOfLastQueuePush"></Progress>
        <Folders :folders="folders" :blocked="running" :i18n_label-need-sync="i18n.t('COM_EVENTGALLERY_SYNC_OPEN_IMAGES_NEEDS_SYNC')"></Folders>

    </div>
</template>

<script>

    import queue from 'async/queue';
    import { createBatches } from "../../../common/js/BatchCreator";
    import Folders from "../components/Folders.vue";
    import ProcessSteps from "../components/ProcessSteps.vue";
    import Progress from "../components/Progress.vue";
    import ErrorPanel from "../components/ErrorPanel.vue";

    export default {
        components: {
            Folders, Progress, ErrorPanel, ProcessSteps
        },
        props: {
            i18n: null,
            loadFoldersUrl: null,
            fileSyncUrl: null,
            folderSyncUrl: null,
            csrfToken: null,
            fileBatchSize: null,
            maxParallelRequests: null,
        },
        data() {
            return {
                folders: [],
                failedFolders: [],
                errorMessages: [],
                queue: null,
                numberOfRunningTasks: 0,
                numberOfTasks: 0,
                numberOfLastQueuePush: 0,
                running: false

            };
        },
        created: function() {
            this.queue = queue((task, callback) => {
                task(callback);
            }, this.maxParallelRequests);
            this.queue.drain(()=>{
                this.updateQueueStatus();
                this.running = false;
            });
        },
        mounted: function() {
            this.loadFolders();
        },
        computed: {
            numberOfSyncableFiles: function() {
                let number = 0;
                this.selectedFolders.forEach((folder) => {
                    if (folder.files) {
                        number +=folder.files.length
                    }
                });
                return number;
            },
            selectedFolders: function() {
                return this.folders.filter((folder)=> {
                    return folder.checked;
                });
            },
            isSyncFilesProcessReadyToStart: function() {
                let isReady = this.selectedFolders.length>0;
                this.selectedFolders.forEach((folder) => {
                    if (!folder.files) {
                        isReady = false;
                    }
                });
                return isReady;
            }
        },
        methods: {
            checkAll: function() {
                this.folders.forEach(folder=>{folder.checked=true})
            },
            uncheckAll: function() {
                this.folders.forEach(folder=>{folder.checked=false})
            },
            stopQueue: function(){
                this.queue.remove(() => {return true});
            },
            updateQueueStatus: function() {
                this.numberOfRunningTasks = this.queue.running();
                this.numberOfTasks = this.queue.length() + this.numberOfRunningTasks;
            },
            syncFolders: function() {
                this.running = true;
                this.selectedFolders.forEach((folder) => {
                        this.queue.push((done) => { this.syncFolder(folder, () => {done(); this.updateQueueStatus(); })});
                });
                this.numberOfLastQueuePush = this.selectedFolders.length;
            },
            syncFolder: function(folder, done) {

                let data = 'folder=' + folder.foldername + "&foldertype=" + folder.foldertype + '&' + this.csrfToken + '=1';
                let xhr = new XMLHttpRequest();

                xhr.onreadystatechange = () => {
                    if (xhr.readyState === 4) {
                        if(xhr.status === 200) {
                            try {
                                let responseJSON = JSON.parse(xhr.responseText);
                                let files = [];
                                responseJSON.files.forEach(file => {
                                    files.push({foldername: folder.foldername, filename: file, status: 'new'})
                                });

                                this.$set(folder, 'files', files);
                                this.$set(folder, 'status', responseJSON.status);
                            } catch(e) {
                                console.log(e);
                                this.errorMessages.push(xhr.responseText);
                            }
                        }
                        done();
                    }
                };

                xhr.open("POST", this.folderSyncUrl);
                xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
                xhr.send(data);
            },
            syncFiles: function() {
                this.running = true;

                let files = [];

                this.folders.forEach((folder) => {
                    if (folder.checked) {
                        folder.files.forEach((file)=>{
                            files.push(file);
                        })
                    }
                });

                let batches = createBatches(files, this.fileBatchSize);
                batches.forEach((fileBatch) => {
                    this.queue.push((done) => { this.syncFileBatch(fileBatch, () => {done(); this.updateQueueStatus();})});
                });
                this.numberOfLastQueuePush = files.length>0 ? batches.length : 0;
            },
            syncFileBatch: function(fileBatch, done) {
                let data = this.csrfToken + '=1';

                fileBatch.forEach(file =>  {
                    data +='&folder[]=' + encodeURIComponent(file.foldername) + '&file[]=' + encodeURIComponent(file.filename)
                });

                let xhr = new XMLHttpRequest();
                xhr.onreadystatechange = () => {
                    if (xhr.readyState === 4) {
                        if (xhr.status === 200) {
                            try {
                                let resultFiles = JSON.parse(xhr.responseText);
                                fileBatch.forEach(file => {
                                    resultFiles.forEach(resultFile => {
                                        if (file.foldername === resultFile.foldername && file.filename === resultFile.filename) {
                                            file.status = resultFile.sync;
                                        }
                                    });
                                })
                            } catch (e) {
                                console.log(e);
                                this.errorMessages.push(xhr.responseText);
                            }
                        }
                        done();
                    }
                };

                xhr.open("POST", this.fileSyncUrl);
                xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
                xhr.send(data);
            },
            loadFolders: function() {
                let xhr = new XMLHttpRequest();
                let data = this.csrfToken + '=1';
                xhr.onreadystatechange = () => {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        try {
                            let folders = JSON.parse(xhr.responseText);

                            folders.forEach(folder => {
                                if (folder.error != null) {
                                    this.failedFolders.push(folder);
                                } else {
                                    folder.checked = folder.isNew;
                                    this.folders.push(folder);
                                }
                            });
                        } catch(e) {
                            console.log(e);
                            this.errorMessages.push(xhr.responseText);
                        }                     
                    }
                };

                xhr.open("POST", this.loadFoldersUrl);
                xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
                xhr.send(data);
            }
        }
    };
</script>
