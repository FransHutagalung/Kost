<template>
    <div
     @click="getDetail(props.bedroom.id)"
     class="w-full flex h-full ">
        <div class="w-1/4">
            <img :src="computedImageUrl" @error="handleImageError" alt=""
            style=" 
            height: 100%;
            width: 100%;
            object-fit: cover;"
            >
        </div>
        <div class="w-3/4 p-3 flex flex-col justify-between">
            <p>{{ props.bedroom.nama_kamar }}</p>
            <div class="h-10 w-full flex items-end justify-end">
                <i class="fa-regular fa-heart"></i>
            </div>
        </div>
    </div>
</template>

<script setup>
import { defineProps , ref } from 'vue';
import { router, Link } from '@inertiajs/vue3';


const props = defineProps({
    bedroom: Object
})

const imageUrl = `../storage/${props.bedroom.path}`;
console.log(imageUrl);
const computedImageUrl = ref(imageUrl);

const handleImageError = () => {
    computedImageUrl.value = '../Assets/default.jpg';
};

const getDetail = (id) => {
        router.get(route('bedroom.userdetail', id), {
            
        })

}
</script>