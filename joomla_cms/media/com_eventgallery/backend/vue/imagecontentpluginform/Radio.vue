<template>
    <div class="control-group">
        <div class="control-label"><Label :description="description" :label="label"></Label></div>
        <div class="controls">
            <fieldset v-for="item in options" class="btn-group">
                <label class="radio">
                    <input type="radio" class="btn"
                           v-model="value" :value="item.value" :key="item.Id" :selected="value === item.value" @input="$emit('input', $event.target.value)"></input>
                    {{item.text}}
                </label>
            </fieldset>
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
            this.currentOption = this.options[0].value;
            this.$emit('input', this.currentOption);
        },
        methods: {

        }
    };
</script>
