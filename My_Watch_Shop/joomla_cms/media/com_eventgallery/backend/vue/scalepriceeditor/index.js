import Vue from 'vue';
import {mapLocalizationData} from '../../../common/vue/helper/LocalizationMapper'
import ImageContentPluginForm from "./Scalepriceeditor.vue";

document.addEventListener('DOMContentLoaded', () =>{
    let rootSelector = '.scale-price-editor';

    let nodes = document.querySelectorAll(rootSelector);

    for (let i=0; i<nodes.length;i++) {
        let node = nodes[i];
        new Vue({
            el: node,
            mounted: function() {
                this.id = this.$el.getAttribute('data-id');
            },
            render: function (createElement) {
                return createElement(ImageContentPluginForm, {
                    props: {
                        inputName: this.$el.getAttribute('name'),
                        inputId: this.$el.getAttribute('id'),
                        inputValue: this.$el.getAttribute('value'),
                        i18n: mapLocalizationData(this.$el),
                    },
                })
            }
        });
    }




});
