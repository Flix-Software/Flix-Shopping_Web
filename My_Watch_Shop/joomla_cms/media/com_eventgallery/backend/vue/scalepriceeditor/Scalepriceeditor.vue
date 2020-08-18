<style scoped>
    table {
        min-width: 200px;
        margin-top: 20px;
    }

    th{
        text-align: left;
    }

    td {
        padding: 10px;
    }

    td.action {
        text-align: right;
    }

    input {
        width: 75px;
    }

    tr:nth-child(even) {
        background-color: #eee;
    }

    tr:hover {
        background-color: orange;
    }

    .form-control {
        display: inline-block;
        margin: 0 10px;
    }
</style>
<template>
    <div>
        <input type="hidden" :name="inputName" :value="currentInputValue" :id="inputId">

        <div class="input-append">
            <span class="add-on">Quantity</span><input class="form-control" v-model="newQuantity" type="number" min="2">
            <span class="add-on">Price</span><input class="form-control" v-model="newPrice" type="text" >
            <button class="btn btn-success" v-on:click.prevent="addScalePrice">+</button>
        </div>

        <table>
            <tr>
                <th>Quantity</th>
                <th>Price</th>
                <th>&nbsp;</th>
            </tr>

            <tr v-for="scalePrice in sortedScalePrices" :key="scalePrice.id">
                <td>{{scalePrice.quantity}}</td>
                <td>{{scalePrice.price}}</td>
                <td class="action"><button class="btn btn-danger" v-on:click.prevent="deleteQuantity(scalePrice.quantity)">-</button></td>
            </tr>
        </table>
    </div>
</template>

<script>
    export default {
        props: {
            inputName: null,
            inputId: null,
            inputValue: null,
            i18n: null,
        },
        data() {
            return {
                scalePrices: [],
                newQuantity: '',
                newPrice: '',
                currentId: 0
            };
        },
        computed: {
            sortedScalePrices: function() {
                return this.scalePrices.sort((sp1, sp2) => {
                    let n1 = parseInt(sp1.quantity);
                    let n2 = parseInt(sp2.quantity);
                    if (n1 > n2) return 1;
                    if (n1 < n2) return -1;
                    return 0;
                })
            },
            currentInputValue: function() {
                let simpleDataStructure = [];

                this.sortedScalePrices.map((scalePrice) => {
                    return {
                        quantity: scalePrice.quantity,
                        price: scalePrice.price
                    }
                });

                return JSON.stringify(simpleDataStructure);
            },
        },
        mounted() {
            let data = JSON.parse(this.inputValue);
            this.scalePrices = [];
            Object.entries(data).forEach((entry) => {
                this.createEntry(entry.quantity, entry.price);
            })
        },
        methods: {
            addScalePrice: function() {
                if (this.newQuantity>1 && this.newPrice.length>0) {
                    this.deleteQuantity(this.newQuantity);
                    this.createEntry(this.newQuantity, this.newPrice);
                    this.newPrice = '';
                    this.newQuantity = '';
                }
            },
            deleteQuantity: function(quantity) {
                this.scalePrices = this.scalePrices.filter((scalePrice)=> {
                    return scalePrice.quantity !== quantity;
                })
            },
            createEntry: function(quantity, price) {
                this.scalePrices.push({price: price, quantity: quantity, id: this.getNextId()})
            },
            getNextId: function() {
                return this.currentId++;
            }
        }
    };
</script>
