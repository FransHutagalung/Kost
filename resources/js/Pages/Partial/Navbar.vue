<template>
    <nav class="bg-white border-b w-full h-12 flex justify-between items-center px-5 pe-[80px] fixed top-0 z-50 border-gray-100">
        <h2 class="text-3xl font-bold">Kost Jeisman</h2>
        <ul class="flex flex-row gap-5">
            <li @click="handleScroll('home')">Home</li>
            <li @click="handleScroll('bedroom')">Bedroom</li>
            <li @click="handleScroll('about')">About</li>
            <li @click="handleScroll('contact')">Contact</li>
            <li v-if="isLogin">
                {{ user.name }}
            </li>
            <li v-else>
                <Link href="/login">Login</Link>
            </li>
        </ul>
    </nav>
</template>

<script setup>
import { computed } from 'vue';
import { Link } from '@inertiajs/vue3';
import { useDataStore } from '../Stores/GeneratedClient';

const dataStore = useDataStore();

const user = computed(() => dataStore.getUser);
const isLogin = computed(() => dataStore.getLoginStatus);

const emit = defineEmits(['scrollTo']);

const handleScroll = (section) => {
    emit('scrollTo', section);
};
</script>
