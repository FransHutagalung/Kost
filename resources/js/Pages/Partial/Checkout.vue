<template>
    <div class="flex py-4 h-screen w-full ">
         <div class="w-3/4 h-full rounded-md bg-gray-300 mx-auto">
            <div class="flex justify-center items-center w-full h-14 py-2">
                    <div class="w-1/4 flex items-center justify-center h-full rounded-lg border-2 border-green-400">
                        <p>Checkout Kamar</p>
                    </div>
            </div>
            <p>Paket Anda Adalah {{ selectedPackage }}</p>
         </div>
    </div>
</template>

<script setup>
import { defineProps } from 'vue';
const props = defineProps({
    kamar: {
        type: Object
    },
    selectedPackage: {
        type: String
    }
});
</script>
