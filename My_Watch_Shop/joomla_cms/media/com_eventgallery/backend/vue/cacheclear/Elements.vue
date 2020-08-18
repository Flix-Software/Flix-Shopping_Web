<style lang="less" scoped>

    .elements {
        list-style: none;

        li {
            margin: 10px;
        }

        .checkbox  {
            float:left;
        }
    }
</style>

<template>
    <div v-if="sortedElements.length>0"><h2>{{group.displayname}}</h2>

    <ul class="elements">
        <template v-for="element in sortedElements">
            <li @click="element.checked = !element.checked" v-bind:key="element.value">
                <div class="checkbox"><input type="checkbox" v-model="element.checked" ></div>
                <div class="description">
                    {{element.name}} <span class="filecount">({{element.count}} / {{element.size}})</span>
                </div>
            </li>
        </template>
    </ul>
    </div>
</template>

<script>
    export default {
        props: {
            group: null,
            elements: null,
        },
        computed: {
            sortedElements: function(){
                return this.elements.slice().filter(a => {
                    return !a.removed && a.group === this.group.name && a.count > 0;
                }).sort((a, b) => {
                    return a.name.localeCompare(b.name);
                });
            }
        }
    };
</script>
