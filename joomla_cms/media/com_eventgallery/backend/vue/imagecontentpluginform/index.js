import Vue from 'vue';
import {mapLocalizationData} from '../../../common/vue/helper/LocalizationMapper'
import ImageContentPluginForm from "./ImageContentPluginForm.vue";

document.addEventListener('DOMContentLoaded', () =>{
    let rootId = 'imagecontentpluginform';

    if (document.getElementById(rootId)) {
        new Vue({
            el: '#' + rootId,
            mounted: function() {
                this.id = this.$el.getAttribute('data-id');
            },
            render: function (createElement) {
                return createElement(ImageContentPluginForm, {
                    props: {
                        editorName: this.$el.getAttribute('data-editor-name'),
                        loadFoldersUrl: this.$el.getAttribute('data-load-folders-url'),
                        loadFilesUrl: this.$el.getAttribute('data-load-files-url'),
                        formId: this.$el.getAttribute('data-form-id'),
                        formDefinitionJson: this.$el.getAttribute('data-form-definition-json'),
                        csrfToken: this.$el.getAttribute('data-csrf-token'),
                        i18n: mapLocalizationData(this.$el),
                    },
                })
            }
        });
    }

});
