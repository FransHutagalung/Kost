<template>

<div class="w-full h-full bg-white flex flex-row">
       
       <div class="w-1/6 hidden md:block bg-gray-200 h-26 fixed">
            <Navbar />
       </div>
       <div class="w-1/6"></div>

       <div class="md:w-5/6 w-full bg-blue-100 rounded-md h-screen mx-2 p-2">
        <div class="flex w-full h-20">
                <!-- <div class="w-1/6 h-full"></div> -->
                <div class="w-1/6 h-full "></div>
                <div class="w-1/6 h-full"></div>
                <div class="w-1/6 h-full"></div>
                <div class="w-1/6 h-full"></div>
                <div class="w-2/6 h-full flex flex-col">
                    <p>Keterangan</p>
                    <div class="flex h-1/2 w-full ">
                        <img class="" style="width: 30px;height: 30px; margin-top: -5px;" src="../Assets/verified.png" alt="">
                        <p class="text-sm font-bold">Customer Sudah Terverifikasi</p>
                    </div>
                    <div class="flex h-1/2 w-full ">
                         <p class="text-2xl font-bold mt-[-5px] mx-2">-</p>
                        <p class="text-sm font-bold">Customer Belum Terverifikasi</p>
                    </div>
                </div>
        </div>
                <table class="w-full">
                    <thead class="p-2">
                       <tr class="p-2 h-8">
                        <th class="text-start">Nama</th>
                        <th class="text-start">Status</th>
                        <th class="text-start">verivied</th>
                        <th class="text-start">no telp</th>
                        <th class="text-start">Email</th>
                        <th class="text-start">Aksi</th>
                       </tr>
                    </thead>
                    <tbody>
                        <!-- <tr v-for="(data , index) in customer" :key="data.id"> -->
                            <tr v-for="(data, index) in customer" :key="data.id" class="bg-white ">
                            <td class=" ms-2">{{ data.nama_Lengkap }}</td>
                            <td :class="data.status ? 'text-green-600' : 'text-red-500'">{{ data.status }}</td>
                            <td>
                                <div v-if="data.verified == 'yes'">
                                        <img class="verif" src="../Assets/verified.png"  alt="">
                                </div>
                                <div v-else>
                                    <p>-</p>
                                </div>
                            </td>
                            <td>{{ data.no_telp }}</td>
                            <td>{{ data.email }}</td>
                            <td>
                            <button @click="goToDetail(data.id)">Lihat Detail</button>
                            </td>
                           </tr>
                    </tbody>
                </table>

                <!-- <div class="flex w-32 h-32 bg-blue-300">y</div> -->
       </div>
</div>

</template>


<script setup>

import Navbar from '../Components/Navbar.vue';
import {defineProps} from 'vue';

const props = defineProps({
    customer : {
        type : Array ,
        required : true                        
    }    
})

console.log(props.customer)

</script>

<style scoped>

thead tr th{
    align-items: start;
    background-color:black;
    color: white;
}

tbody tr td{
    align-items: start;
}

.verif{
    width: 40px;
}

</style>