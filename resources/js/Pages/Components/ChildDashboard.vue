<template>
    <div class="flex flex-row h-full md:w-60 w-full mx-1 bg-white border border-black rounded-lg">
       <diV class="w-2/5">
        <img :src="url ?? altUrl" alt="">
       </diV>
       <div class="w-3/5 flex flex-col p-2">
        <p class="font-bold">{{ nama }}</p>
        <h1 class="text-3xl font-bold">{{ value ?? 0 }}</h1>
       </div>
    </div>
</template>

<script setup>
import { ref , defineProps } from 'vue';
import localImage from '../Assets/kamar2.png'; 

const altUrl = ref(localImage)
const props = defineProps({
    nama:{
        type : String
    },
    url : {
        type : String, 
    } , 
    value :{
        type  : Number
    }
})
</script>


<style scoped>
img{
    margin: 2px;
    height: 100px;
}
</style>