<template>

    <div class="flex flex-col w-60 h-60 rounded-lg bg-white ">
       <div class="w-full h-1/2">
        <img src="../Assets/house.jpg" alt="">
       </div>
       <div class="w-full h-1/2 p-2">
            <h2>{{props.data.nama_kamar ?? Kost}}</h2>
            <button class="bg-blue-400 h-8 w-16 rounded-lg" @click="goDetail(props.data.id)">Detail</button>
       </div>
    </div>

</template>

<script setup>
import {defineProps} from 'vue';
import { router } from '@inertiajs/vue3'

const props = defineProps({
    data : {
        type : Object                         
    }    
})
// const form = useForm({
//   name: null,
// })
const goDetail = () => {   
    router.get(
        route('bedroom.detail', props.data.id) , {
            onSuccess: () => {
                close()
            },
            onerror : (error) => {
                console.log(error)
            }
        })
 }
</script>

<style scoped>
img{
    width: 100%;
    height: 100%;
}
</style>