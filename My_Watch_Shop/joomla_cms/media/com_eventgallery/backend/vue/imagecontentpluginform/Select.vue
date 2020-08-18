<template>
    <div class="control-group">
        <div class="control-label"><Label :description="description" :label="label"></Label></div>
        <div class="controls">
            <select v-model="currentOption" @input="$emit('input', $event.target.value)">
                <option v-for="item in options" :value="item.value" :key="item.value" :selected="value === item.value">{{ item.text }}</option>
            </select>
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
            value: null,
            options: null,
            defaultValue: null,
        },
        data() {
            return {
                currentOption: ""
            };
        },
        watch: {
            value: function(newValue){
                this.currentOption = newValue;
            }
        },
        mounted() {
            this.currentOption = this.defaultValue;
            this.$emit('input', this.currentOption);
        },
        methods: {

        }
    };
</script>
