<template>
    <div class="control-group">
        <div class="control-label"><Label :description="description" :label="label"></Label></div>
        <div class="controls">
            <input
                    :name="name"
                    v-bind:value="value"
                    v-on:input="$emit('input', $event.target.value)"
            >
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
        },
        data() {
            return {
            };
        },
        methods: {
        }
    };
</script>
