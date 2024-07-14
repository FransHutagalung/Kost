<template>

    <div class="w-full h-full bg-white flex flex-row">
       
            <div class="w-1/6 hidden md:block bg-gray-200 h-26">
                 <Navbar />
            </div>

            <div class="md:w-5/6 w-full bg-blue-100 rounded-md h-screen mx-2 p-2">
                <h2 class="text-2xl my-2 font-bold">Kost Jeissman</h2>
                <p>Kamar Kost</p>
            </div>

    </div>

</template>

<script setup>
import Navbar from './Components/Navbar.vue';
import ChildDashboard from './Components/ChildDashboard.vue';
import { defineProps , ref } from 'vue';

const parentMessage = "Total kamar"


</script>