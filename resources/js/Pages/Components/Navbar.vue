<template>

<div class="flex flex-col gap-2 w-full py-5 ">

    <div class="flex flex-row w-full justify-center">
        <img class="gambar" src="../Assets/kamar.png" alt="">
    </div>

<div class="h-10"></div>

<ul  class="flex flex-col gap-[20px] ms-5">
    <li class="flex gap-3 text-lg ">
        <span class="inline">
            <i class="fa-solid fa-chart-simple fa-sm"></i>
        </span>
        <Link href="/" >Dashboard</Link>
    </li>
    <li class="flex gap-3 text-lg ">
        <span class="inline">
            <i class="fa-solid fa-bed fa-sm"></i>
        </span>
        <Link href="/kamar">Kamar</Link>
    </li>
    <li class="flex gap-3 text-lg">
        <span class="inline" >
            <i class="fa-solid fa-user fa-sm"></i>
        </span>
        User
    </li>
    <li class="flex gap-3 text-lg">
        <span class="inline" >
            <i class="fa-regular fa-credit-card fa-sm"></i>
        </span>
        Transaksi
    </li>
</ul>
</div>
 

</template>


<script setup>
import { Link } from '@inertiajs/vue3';
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