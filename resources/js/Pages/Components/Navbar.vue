<template>

<div class="flex flex-col gap-2 w-full py-5 ">

    <div class="flex flex-row w-full justify-center">
        <img class="gambar" src="../Assets/kostlogo.png" alt="">
    </div>

<div class="h-10"></div>

<ul  class="flex flex-col gap-[20px] ms-5">
    <li class="flex gap-3 text-lg ">
        <span class="inline">
            <i class="fa-solid fa-chart-simple fa-sm"></i>
        </span>
        <Link href="/admin" >Dashboard</Link>
    </li>
    <li class="flex gap-3 text-lg "> 
        <span class="inline">
            <i class="fa-solid fa-bed fa-sm"></i>
        </span>
        <Link
         @click="reloadPage"
          href="/admin/kamar">Kamar</Link>
    </li>
    <li class="flex gap-3 text-lg ">
        <span class="inline">
            <i class="fa-solid fa-bell fa-sm"></i>
        </span>
        <Link
         @click="reloadPage"
          href="/admin/request">Request Kamar</Link>
          <p class="text-sm text-red-700 font-bold">{{ props.notif ?? '2' }}</p>
    </li>
    <li class="flex gap-3 text-lg">
        <span class="inline" >
            <i class="fa-solid fa-user fa-sm"></i>
        </span>
        <Link
         @click="reloadPage"
          href="/admin/user">User</Link>
    </li>
    <li class="flex gap-3 text-lg">
        <span class="inline" >
            <i class="fa-regular fa-credit-card fa-sm"></i>
        </span>
        <Link href="/admin/transaksi">Transaksi</Link>
    </li>
</ul>
</div>
 

</template>


<script setup>
import { Link } from '@inertiajs/vue3';
import { createRouter, createWebHistory } from 'vue-router';
const props = defineProps({
    notif : {
        type : Number
    }
})
const reloadPage = () =>{

}
</script>



<style scoped>

.gambar{
    height: 100px;
    width: 100px;
}
li{
    height: 30px;
}
span{
    color: blue;
}

</style>