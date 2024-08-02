<template>

    <div class="w-full h-full  bg-white  p-2">
        <Navbar/>
        <div class="h-4"></div>
        <div class="w-full px-3 my-5 h-14 flex"> 
                <div class="w-[300px] h-full">
                    <SearchKost />
                </div>
        </div>
          <div class="w-full  flex items-center justify-center">
              <div class="w-[85%] flex h-[1000px] mx-auto ">
                <div class="w-[60%] px-3 h-full bg-gray-100">
                    <div class="w-full">
                        <img src="../Assets/relasikamar4.jpg" alt="">
                    </div>
                    <div class="mt-3 flex justify-between ">
                        <p class="text-xl font-bold">{{ data.nama_kamar }}</p>
                        <div class="h-10 w-60 flex px-3 items-center justify-between">
                            <div class="flex items-center h-full ">
                                    <img src="../Assets/verified.png" style="width: 30px;height: 30px;" alt="">

                                    <p class="text-sm text-blue-400">Terverifikasi</p>

                                </div>
                                <div>
                                    <div class="h-full w-20 flex items-center justify-center rounded-lg bg-green-500">
                                        <p class="text-sm text-white">Tersedia</p>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="w-full flex gap-3 my-2">
                        <span>
                            <i class="fa-solid fa-person fa-sm"></i>
                        </span>
                        <p class="mt-1 text-sm">Kost Putra/Putri</p>
                    </div>
                    <div class="w-full ">
                        <RentFacility 
                        :dataAll="fasilitas"
                        />
                    </div>
                    <div class="flex mt-2 h-[260px]  w-full ">
                        <div class="w-[500px] bg-black h-60" >
                            <div class="h-2"></div>
                            <Map />
                        </div>
                       <div class="flex flex-col h-[500px] w-60 items-center ">
                        <p class="text-lg">Gedung Terdekat</p>
                       </div>
                    </div>
                    <div class="w-full h-32 flex gap-2">
                       <div class="w-1/2 p-2 h-full bg-white rounded-lg">
                        <p>Spesifikasi Kamar</p>
                        <ul>
                            <li>Panjang {{ data.panjang }}</li>
                        </ul>
                       </div>
                       <div class="w-1/2 p-2 h-full bg-white rounded-lg">
                        <p>Fasilitas Kamar</p>
                       </div>
                    </div>
                </div>
                <div class="w-[40%]  p-4 h-full">
                    <KostAction :harga="{harga_bulan : data.harga_bulan, 
                    harga_6bulan : data.harga_6bulan, 
                    harga_tahun : data.harga_tahun}"/>
                </div>
              </div>
          </div>
          <!-- <div class="h-screen w-full bg-black"></div> -->
    </div>
</template>

<script setup>
import Navbar from './Navbar.vue';
import KostAction from './KostAction.vue';
import RentFacility from './RentFacility.vue';
import SearchKost from './SearchKost.vue';
import Map from './Map.vue';
import { defineProps } from 'vue';

const props = defineProps({
    data : {
        type : Array
    }     ,
    fasilitas : {
        type : Array
    }
})

console.log(props.data)
console.log(props.fasilitas)

</script>