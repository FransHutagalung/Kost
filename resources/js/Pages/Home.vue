<template>

    <div class="w-full h-full bg-white flex flex-row">
       
            <div class="w-1/6 hidden md:block bg-gray-200 h-26">
                 <Navbar />
            </div>

            <div class="md:w-5/6 w-full bg-blue-100 rounded-md h-screen mx-2 p-2">
                <div class="flex w-full justify-between h-12 px-3">
                    <h2 class="text-2xl my-2 font-bold">Kost Jeissman</h2>
               
                    <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 flex h-10  gap-3  text-center  items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button"> 
                        <span class="inline">
                            <i class="fa-solid fa-user"></i>
                         </span>
                         {{ user.name}}
                    </button>

<!-- Dropdown menu -->
                <div id="dropdown" class="z-10 hidden bg-gray-300 divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                    <li>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Profil</a>
                    </li>
                    <li>
                        <Link href="/logout" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Keluar</Link>
                    </li>
                    <!-- <li>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Earnings</a>
                    </li>
                    <li>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Sign out</a>
                    </li> -->
                    </ul>
                </div>


        
                </div>
                <div class="flex flex-row w-full gap-2">
                    <div class="w-1/2 flex flex-col gap-2  px-2">
                        <div class="relative flex flex-col h-[360px] w-full  items-start justify-start">
                          <carousel />
                           <div class=" gambarbawah flex mt-3 w-full gap-2 h-1/3 ">
                            <div class="w-13 h-13">
                                <img src="./Assets/rumah2.jpg" alt="">
                            </div>
                            <div class="w-13 h-13">
                                <img src="./Assets/rumah3.jpg" alt="">
                            </div>
                            <div class="w-13 h-13">
                                <img src="./Assets/rumah4.jpg" alt="">
                            </div>
                            <div class="w-13 h-13">
                                <img src="./Assets/rumah1.jpg" alt="">
                            </div>
                           </div>
                        </div>
                        <div class=" flex w-full mt-[11px] h-[220px] ">
                            <Kostcard />
                        </div>
                    </div>
                    <div class="w-1/2">
                        <div class="flex flex-col md:flex-row w-full gap-1 h-24">
                   <ChildDashboard :nama="parentMessage1" :url="gambar1" />
                   <ChildDashboard :nama="parentMessage2" :url="gambar2"/>
                   <ChildDashboard :nama="parentMessage3" :url="gambar3"/>
                </div>
                <div class="flex flex-col h-full w-full px-2 py-5">
                    <div class="flex flex-row h-60">
                        <div class="w-60 h-full">
                        <Chart1 />
                    </div>
                    </div>
                    <div class="my-2 flex gap-2">
                       
                            <ownwerCard />
                        
                      
                            <Contact /> 
                       
                        <!-- <Contact /> -->
                    </div>
                </div>
                    </div>
                </div>
            </div>


    </div>

</template>

<script setup>
import Navbar from './Components/Navbar.vue';
import gambar1 from './Assets/kamar3.png'
import gambar2 from './Assets/customer.png'
import gambar3 from './Assets/emp2.png'
import carousel from './Components/Carousel.vue';
import Kostcard from './Components/KostCard.vue';
import ChildDashboard from './Components/ChildDashboard.vue';
import ownwerCard from './Components/OwnerCard.vue';
import Contact from './Components/Contact.vue';
import { defineProps , ref } from 'vue';
import Chart1 from './Components/Chart1.vue';
import { Link } from '@inertiajs/vue3';


const props = defineProps({
    'user' : {
        type : Object
    }
})

// console.log(user.name)

const parentMessage1 = "Total Kamar"
const parentMessage2 = "Total Customer"
const parentMessage3 = "Total Pegawai"


</script>

<style scoped>
.gambarbawah img{
    width: 100%;
    height: 100%
}
</style>