<template>

    <div class="w-[99%] mx-auto">
        <p>Daftar Kamar</p>
        <div class="w-[90%] mx-auto shadow-xl h-full bg-white p-2">
            <div class="w-full h-[560px] overflow-auto  ">
                <div class="h-auto flex flex-col flex-wrap gap-3 px-3 py-5">
                    <div v-for="Bedroom in props.Bedrooms" class="w-full h-36 rounded-md bg-gray-200 ">
                    <BedroomSpesific :bedroom="Bedroom" />
                </div>
                </div>
            </div>
           <div class="h-10 px-[30px] w-full flex justify-end items-center">
            <button>Lihat Semua</button>
           </div>
        </div>
=
    </div>
   

</template>

<script setup>
import { defineProps } from 'vue';
import { Link } from '@inertiajs/vue3';
import BedroomSpesific from './BedroomSpesific.vue';
const props = defineProps({
    Bedrooms : Array
})
</script>

<style scoped>
*::-webkit-scrollbar{
  /* background-color: blue;
  color: white; */
  visibility: hidden;
}
</style>