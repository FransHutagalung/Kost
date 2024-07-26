<template>
    <div class="flex flex-col w-60 h-60 rounded-lg bg-white">
        <div class="w-full h-1/2">
            <img :src="computedImageUrl" @error="handleImageError" alt="">
        </div>
        <div class="w-full flex flex-col justify-between h-1/2 p-2">
            <h2>{{ props.data.nama_kamar ?? 'Kost' }}</h2>
            <div class="flex justify-between w-full">
                <Link :href="route('bedroom.destroy', { id: props.data.id })">
                    <span class="" style="color: red">
                        <i class="fa-solid fa-trash"></i>
                    </span>
                </Link>
                <button class="bg-blue-400 h-8 w-2/3 rounded-lg" @click="goDetail(props.data.id)">Detail</button>
            </div>
        </div>
    </div>
</template>

<script setup>
import { defineProps, ref } from 'vue';
import { router, Link } from '@inertiajs/vue3';

const props = defineProps({
    data: {
        type: Object
    },
    defaultImageUrl: {
        type: String
    }
});

const imageUrl = `../storage/${props.data.path}`;
console.log(imageUrl);
const computedImageUrl = ref(imageUrl);

const handleImageError = () => {
    computedImageUrl.value = props.defaultImageUrl;
};

const goDetail = (id) => {
    router.get(route('bedroom.detail', id), {
        onSuccess: () => {
            close();
        },
        onError: (error) => {
            console.log(error);
        }
    });
};
</script>

<style scoped>
img {
    width: 100%;
    height: 100%;
}
</style>
