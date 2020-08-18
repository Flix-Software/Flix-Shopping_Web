<style scoped lang="less">
</style>

<template>
    <div id="Cacheclear">

        <div>{{i18n.t('COM_EVENTGALLERY_CLEAR_CACHE_START_DESC')}}</div>

        <div class="control-group">
            <div class="controls">
                <div class="btn-group sync-buttons">
                    <button class="btn checkall" v-on:click="checkAll">{{i18n.t('COM_EVENTGALLERY_CLEAR_CACHE_CHECK_ALL')}}</button>
                    <button class="btn" v-on:click="uncheckAll">{{i18n.t('COM_EVENTGALLERY_CLEAR_CACHE_CHECK_NONE')}}</button>
                    <button class="btn btn-warning" :disabled="!running" v-on:click="stopQueue">{{i18n.t('COM_EVENTGALLERY_CLEAR_CACHE_STOP_QUEUE')}}</button>
                    <button class="btn btn-danger" :disabled="running || !isReadyForCacheDeletion" v-on:click="clearCache">{{i18n.t('COM_EVENTGALLERY_CLEAR_CACHE_START')}}</button>
                </div>
            </div>
        </div>

        <Progress v-if="numberOfTasks>0"
                  :remaining="numberOfTasks"
                  :total="numberOfLastQueuePush"></Progress>

        <Groups :groups="groups" :elements="elements" :blocked="running"></Groups>

    </div>
</template>

<script>

    import queue from 'async/queue';
    import Groups from "./Groups.vue";
    import ProcessSteps from "../components/ProcessSteps.vue";
    import Progress from "../components/Progress.vue";
    import ErrorPanel from "../components/ErrorPanel.vue";

    export default {
        components: {
            Groups, Progress, ErrorPanel, ProcessSteps
        },
        props: {
            i18n: null,
            elementsJson: null,
            groupsJson: null,
            cacheClearUrl: null,
            csrfToken: null,
        },
        data() {
            return {
                elements: [],
                groups: [],
                failedElements: [],
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
            }, 1);
            this.queue.drain(()=>{
                this.updateQueueStatus();
                this.running = false;
            });
        },
        mounted: function() {
            this.elements = JSON.parse(this.elementsJson);
            this.groups = JSON.parse(this.groupsJson);
        },
        computed: {
            selectedElements: function() {
                return this.elements.filter((element)=> {
                    return element.checked;
                });
            },
            isReadyForCacheDeletion: function() {
                return this.selectedElements.filter(element => {
                    return !element.removed;
                }).length > 0;
            }
        },
        methods: {
            checkAll: function() {
                this.elements.forEach(element=>{element.checked=true})
            },
            uncheckAll: function() {
                this.elements.forEach(element=>{element.checked=false})
            },
            stopQueue: function(){
                this.queue.remove(() => {return true});
            },
            updateQueueStatus: function() {
                this.numberOfRunningTasks = this.queue.running();
                this.numberOfTasks = this.queue.length() + this.numberOfRunningTasks;
            },
            clearCache: function() {
                this.running = true;
                this.selectedElements.forEach((element) => {
                        this.queue.push((done) => { this.clearCacheForElement(element, () => {done(); this.updateQueueStatus(); })});
                });
                this.numberOfLastQueuePush = this.selectedElements.length;
            },
            clearCacheForElement: function(element, done) {

                let data = element.group + '=' + element.value + '&' + this.csrfToken + '=1';
                let xhr = new XMLHttpRequest();

                xhr.onreadystatechange = () => {
                    if (xhr.readyState === 4) {
                        if(xhr.status === 200) {
                            try {
                                this.$set(element, 'removed', true);
                            } catch(e) {
                                console.log(e);
                                this.errorMessages.push(xhr.responseText);
                            }
                        }
                        done();
                    }
                };

                xhr.open("POST", this.cacheClearUrl);
                xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
                xhr.send(data);
            },

        }
    };
</script>
