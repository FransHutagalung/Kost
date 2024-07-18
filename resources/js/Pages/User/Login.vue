<template>
    <div class="w-full h-screen">
        <div class="container flex items-center justify-center">
            <div class="relative z-40 h-screen w-full flex flex-row">
                <div class="w-1/2 p-5">
                    <h2 class="ms-5 text-3xl font-bold">Selamat Datang di Sistem Kost Jeisman</h2>
                    <img class="ms-4 mt-5" src="../Assets/employe2.png" style="width:380px;height: 270px" alt="">
                </div>
                <div class="w-3/5 h-screen flex items-center justify-center ps-5">
                    <div class="flex flex-col justify-center w-full h-screen">
                        <h2 class="text-xl my-3">Login Admin</h2>
                        <div class="w-4/5 h-[340px] bg-white rounded-lg border-2 border-black mt-[0px] p-2">
                            <form @submit.prevent="handleRegister" class="flex flex-col p-3">
                                <div class="flex flex-col gap-2">
                                    <label for="username">Username</label>
                                    <input type="text" id="username" class="w-full rounded-lg" :class="{ 'border-2 border-red-500': errors.username || isError.request.status  }" v-model="userLogin.username">
                                    <p v-if="errors.username" class="text-sm text-red-500">{{ errors.username }}</p>
                                </div>
                                <div class="flex flex-col gap-2">
                                    <label for="password">Password</label>
                                    <input type="password" id="password" class="w-full rounded-lg" :class="{ 'border-2 border-red-500': errors.password   || isError.request.status  }" v-model="userLogin.password">
                                    <p v-if="errors.password" class="text-sm text-red-500">{{ errors.password }}</p>
                                </div>
                                <p v-if="isError.request.status" class="text-sm text-red-500">{{ isError.request.status }}</p>
                                <div class="my-5">
                                    <button type="submit" class="w-full h-10 rounded-lg bg-blue-300">Login</button>
                                </div>
                                <div class="h-10 w-full flex gap-3">
                                    <p>Belum Punya Akun ??</p>
                                    <Link :href="route('user.register')">Daftar</Link>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import { reactive, computed } from 'vue';
import { Link } from '@inertiajs/vue3';
import { Inertia } from '@inertiajs/inertia';

const userLogin = reactive({
    username: '',
    password: '',
});

const errors = reactive({
    username: '',
    password: '',
    loginError: '',
});

const isError = defineProps({
    request: {
        type: Object,
        default: () => ({})
    }
});

console.log(isError.request)

const validForm = computed(() => {
    errors.username = '';
    errors.password = '';
    errors.loginError = '';

    if (!userLogin.username) {
        errors.username = "Masukkan Username";
    }
    if (!userLogin.password) {
        errors.password = "Masukkan Password";
    }
    return Object.keys(errors).every(key => errors[key] === '');
});

const handleRegister = async () => {
    console.log('woii')
    if (validForm.value) {
        const formData = new FormData();
        formData.append('name', userLogin.username);
        formData.append('password', userLogin.password);

        try {
            await Inertia.post('/user/signin', formData, {
                onError: (error) => {
                    if (error.username) {
                        errors.username = error.username[0];
                    }
                    if (error.password) {
                        errors.password = error.password[0];
                    }
                    if (error.loginError) {
                        errors.loginError = error.loginError[0];
                    }
                }
            });

        } catch (e) {
            if (e.response && e.response.status === 422) {
                errors.username = e.response.data.errors.username || '';
                errors.password = e.response.data.errors.password || '';
                errors.loginError = e.response.data.errors.loginError || '';
            }
        }
    }
};
</script>

<style scoped>
html, body {
    height: 100%;
    margin: 0;
}
.container {
    position: relative;
    width: 100%;
    height: 100%;
    overflow: hidden;
}
.container::before,
.container::after {
    content: '';
    position: absolute;
    width: 0;
    height: 0;
    border-style: solid;
}
.container::before {
    border-width: 130vh 100vw 0 0;
    border-color: white transparent transparent transparent;
    top: 0;
    left: 0;
}
.container::after {
    border-width: 0 0 120vh 80vw;
    border-color: transparent transparent #6497b1 transparent;
    bottom: 0;
    right: 0;
}
img {
    animation: move 5s infinite alternate;
}
* {
    animation-timing-function: ease-in-out;
}
@keyframes move {
    0% { transform: translateX(0); }
    25% { transform: translateX(10px); }
    50% { transform: translateX(0); }
    75% { transform: translateX(-10px); }
    100% { transform: translateX(0); }
}
</style>
