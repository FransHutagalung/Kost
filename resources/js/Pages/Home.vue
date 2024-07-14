<template>

    <div class="w-full h-full bg-white flex flex-row">
       
            <div class="w-1/6 hidden md:block bg-gray-200 h-26">
                 <Navbar />
            </div>

            <div class="md:w-5/6 w-full bg-blue-100 rounded-md h-screen mx-2 p-2">
                <h2 class="text-2xl my-2 font-bold">Kost Jeissman</h2>
                <div class="flex flex-col md:flex-row w-full gap-5 h-24">
                   <ChildDashboard :nama="parentMessage1" :url="gambar1" />
                   <ChildDashboard :nama="parentMessage2" :url="gambar2"/>
                </div>
                <div class="flex flex-col h-full w-full px-2 py-5">
                    <div class="flex flex-row h-60">
                        <div class="w-60 h-full">
                        <Chart1 />
                    </div>
                    </div>
                    <div class="my-2">
                        <ownwerCard />
                    </div>
                </div>
            </div>


    </div>

</template>

<script setup>
import Navbar from './Components/Navbar.vue';
import gambar1 from './Assets/kamar3.png'
import gambar2 from './Assets/customer.png'
import ChildDashboard from './Components/ChildDashboard.vue';
import ownwerCard from './Components/OwnerCard.vue';
import { defineProps , ref } from 'vue';
import Chart1 from './Components/Chart1.vue';

const parentMessage1 = "Total Kamar"
const parentMessage2 = "Total Customer"


</script>