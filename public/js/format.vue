<template>
    <input placeholder="uashuashas" v-model.lazy="price" v-money="money" /> 
</template>

<script>

import Vue from 'vue'
// import money from 'v-money'

import {VMoney} from 'v-money'

Vue.use(VMoney)

export default {
    data(){
       return {
        price: 123.45,
        money: {
          decimal: ',',
          thousands: '.',
          prefix: 'R$ ',
          suffix: ' #',
          precision: 2,
          masked: false /* doesn't work with directive */
        }
       }
    },
    directives: {money: VMoney}
}
</script>