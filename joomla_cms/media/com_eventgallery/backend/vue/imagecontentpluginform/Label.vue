<style scoped>
    /* Tooltip container */
    .eg-tooltip {
        position: relative;
        display: inline-block;
        padding-right: 10px;
    }

    /* Tooltip text */
    .eg-tooltip .eg-tooltiptext {
        visibility: hidden;
        width: 170px;
        background-color: #EEE;
        color: #000;
        text-align: center;
        padding: 5px;
        border-radius: 6px;
        border: 1px solid #CCC;
        position: absolute;
        z-index: 1;
    }

    .eg-tooltip:hover .eg-tooltiptext,
    .eg-tooltip:active .eg-tooltiptext{
        visibility: visible;
    }

    .eg-tooltip-right {
        top: -50%;
        left: 100%;
    }
</style>

<template>
    <label class="eg-tooltip"><span class="eg-tooltiptext eg-tooltip-right">{{description}}</span>{{label}}</label>
</template>

<script>
    export default {
        props: {
            label: String,
            description: String
        }
    };
</script>
