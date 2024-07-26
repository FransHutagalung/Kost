<template>


<div class="w-full h-full bg-white flex flex-row">
       
       <div class="w-1/6 hidden md:block bg-gray-200 h-26 fixed">
            <Navbar />
       </div>
       <div class="w-1/6  bg-gray-200 h-screen"></div>
       <div class="w-5/6 flex ">
            <div class="h-12 w-full  gap-3 p-2 ">
                <div class="flex gap-4 items-center">
                    <Link :href="route('bedroom')">
                        <span class="inline">
                        <i class="fa-solid fa-lg fa-backward"></i>
                    </span>
                    </Link>
                    <p class="text-lg">Data Kamar</p>
                </div>
                <div class="flex w-full h-screen">
                        <div class="w-[54%] h-screen  px-3 py-2">
                                <div class="w-full">
                                    <img :src="computedImageUrl" @error="handleImageError" alt="">
                                    <div class="flex w-full flex-col py-3">
                                        <div class="h-10 w-full border-2 border-black rounded-lg px-3  flex items-center gap-2">
                                            <p>Nama Kamar : </p>
                                            <p class="font-bold">{{ data.nama_kamar }}</p>
                                            <p class="ms-[20px]">Kode Kamar</p>
                                            <p class="font-bold">{{ data.kode_kamar }}</p>
                                        </div>
                                        <div class="flex w-full py-3">
                                            <div class="flex flex-col w-1/2">
                                                <p class="font-bold text-xl mb-3">Spesifikasi Kamar :</p>
                                             <ul>
                                                <li> Panjang :  {{ data.panjang }} cm </li>
                                                <li> Lebar : {{ data.lebar }} cm </li>
                                                <li> Tinggi :  {{ data.tinggi }} cm </li>
                                             </ul>
                                            </div>
                                            <div class="fasilitas w-1/2">
                                                <p class="font-bold text-xl mb-3">Fasilitas Kamar</p>
                                                <ul class="ms-4">
                                                    <li v-for="fasilitas in data.fasilitas_kamar">
                                                        {{ fasilitas }}
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-full flex flex-col gap-2a">
                                        <p class="text-xl  font-bold">Harga Kamar</p>
                                        <p>Rp.{{ data.harga_bulan }} / bulan</p>
                                        <p>Rp.{{ data.harga_6bulan }} / 6 bulan</p>
                                        <p>Rp.{{ data.harga_tahun }} / tahun</p>
                                    </div>
                                </div>
                        </div>
                        
                        <div class="w-[23%]">
                            <BedroomHistory 
                            
                            />
                        </div>
                        <div class="w-[23%]">
                            <CommentRoom 
                            
                            />
                        </div>
                </div>
            </div>
       </div>
</div>


</template>

<script setup>

import {defineProps} from 'vue';
import { ref } from 'vue';
import Navbar from '../Components/Navbar.vue';
import CommentRoom from  './CommentRoom.vue'
import BedroomHistory from './BedroomHistory.vue';
import { Link } from '@inertiajs/vue3';
import defaultImage from '../Assets/default.jpg'

const props = defineProps({
    data : {
        type : Object
    }
})

console.log(props.data.fasilitas_kamar)

const imageUrl = `../storage/${props.data.path}`;
const computedImageUrl = ref(imageUrl);
// console.log(props.w)
const handleImageError = () => {
  computedImageUrl.value = defaultImage;
};

</script>

<style scoped>
img{
    width: 100%;
    height: 300px;
}
.fasilitas ul li {
    list-style:disc
}
</style>