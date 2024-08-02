<template>
    <div class="flex h-[260px] w-full rounded-lg shadow-xl bg-white flex-col">
        <div class="h-8 w-full ps-2 pt-1 bg-neutral-500">
            <h2 class="text-xl text-white">Informasi  Kost</h2>
            <div class="w-full flex h-full">
                <div class="w-1/3 pt-5">
                    <img src="../Assets/kostlogo.png" alt="">
                    <button @click="kostInfo" class="bg-blue-500 rounded-xl w-full h-8">Edit Data</button>
                </div>
                <div class="flex w-2/3 flex-row p-2 gap-2">
                     <div class="w-1/3 flex flex-col gap-2 ">
                        <p>Nama Kost</p>
                        <p>Lokasi</p>
                        <p>Alamat Kost</p>
                        <p>No telp</p>
                        <p>email</p>
                     </div>
                     <div class="w-2/3 gap-2 flex flex-col">
                        <p class="font-bold text-md">Kost Jeisman</p>
                        <p class="font-bold text-md">Medan Polonia , Medan</p>
                        <p class="font-bold text-md">Jalan Cendrawsih</p>
                        <p class="font-bold text-md">062 8237 2112</p>
                        <p class="font-bold text-md">kostjeisman@jeisman.com</p>
                     </div>
                </div>
            </div>
        </div>
       
    </div>
</template>

<script setup>
import { router } from '@inertiajs/vue3';


const kostInfo = () => {
    // console.log('kost info')
    router.get('/admin/informasikost')
}

</script>