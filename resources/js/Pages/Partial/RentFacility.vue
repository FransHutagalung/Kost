<template>

    <div class="w-full h-full rounded-lg bg-white  p-2 px-4">
         <h2 class="text-sm">Fasilitas Kost</h2>
         <div class="w-full">
            <ul class="ms-3 flex flex-row gap-3">
                <li v-for="data in props.dataAll">
                    {{data.fasilitas_gedung}}
                </li>
            </ul>
         </div>
    </div>
</template>


<script setup>
import { defineProps } from 'vue';

const props = defineProps({
    dataAll : {
        type : Array
    }
})


</script>

<style scoped>
ul li{
    list-style:disc;
    margin-right: 10px;
}
</style>