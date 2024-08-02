<template>
     <div 
     class="w-72 h-[400px] border-2 border-black bg-white shadow-md rounded-xl duration-500 hover:scale-105 hover:shadow-xl"
     :class="{ 'h-[430px]' : props.height }"
     >
     
        <a href="#">
            <img :src="props.image"
                    alt="artis" class="h-60 w-72 object-cover rounded-t-xl" 
                    style="object-fit: cover;"
                    />
            <div class="px-4 py-3 w-72">
                <span class="text-gray-400 mr-3 uppercase text-xs">Soana</span>
                <p class="text-lg font-bold text-black truncate block capitalize">Ambasador</p>
                <div class="flex items-center">
                     <p>Kost ini sangat bagus </p>
                </div>
            </div>
        </a>
    </div>
</template>

<script setup>
import { defineProps } from 'vue';

const props = defineProps({
    image : {
        type : String
    }, 
    height : {
        type : Boolean , 
        default : false
    }
})
</script>