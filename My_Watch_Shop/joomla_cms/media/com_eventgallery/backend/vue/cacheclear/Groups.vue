<style lang="less" scoped>
    .blocked {
        opacity: 0.4;
    }
</style>

<template>
    <div class="groups" v-bind:class="{blocked: blocked}">
        <Elements v-for="group in groups" v-bind:key="group.value" :group="group" :elements="elements"></Elements>
    </div>
</template>

<script>
    import Elements from "./Elements.vue";

    export default {
        components: {
            Elements
        },
        props: {
            groups: null,
            elements: null,
            blocked: null
        },
        computed: {
        }

    };
</script>
