import Vue from 'vue';
import Cacheclear from './Cacheclear.vue';
import {mapLocalizationData} from '../../../common/vue/helper/LocalizationMapper'

document.addEventListener('DOMContentLoaded', () =>{
    let rootId = 'cacheclear';

    if (document.getElementById(rootId)) {

        new Vue({
            el: '#' + rootId,
            mounted: function() {
                this.id = this.$el.getAttribute('data-id');
            },
            render: function (createElement) {
                return createElement(Cacheclear, {
                    props: {
                        cacheClearUrl: this.$el.getAttribute('data-cache-clear-url'),
                        elementsJson: decodeURI(this.$el.getAttribute('data-elements-json')),
                        groupsJson: decodeURI(this.$el.getAttribute('data-groups-json')),
                        csrfToken: this.$el.getAttribute('data-csrf-token'),
                        i18n: mapLocalizationData(this.$el),
                    },
                })
            }
        });
    }

});
