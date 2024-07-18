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
                        <div border type="info" class="al flex gap-3 rounded-lg items-center justify-center bg-yellow-400 text-white w-4/5 h-12  my-3" :class="{ hidden: !userRegisterData.alert, block: userRegisterData.alert }">
                        <i class="fa-solid fa-info fa-sm"></i>
                        Akun telah Selesai didaftar Silahkan 
                        <a href="/user/login" class="text-black rounded-lg h-6 w-14 ps-2 bg-white">Login</a>
                    </div>
                        <h2 class="text-xl my-3">Registrasi Admin</h2>
                        <div class="w-4/5 h-[500px] bg-white rounded-lg border-2 border-black mt-[0px] p-2">
                            <form @submit.prevent="handleRegister" class="flex flex-col p-3">
                                <div class="flex flex-col gap-2">
                                    <label for="">Username</label>
                                    <input type="text" class="w-full rounded-lg" :class="{ 'border-2 border-red-500': errors.username }" v-model="userRegisterData.username">
                                    <p v-if="errors.username" class="text-sm text-red-500">{{ errors.username }}</p>
                                </div>
                                <div class="flex flex-col gap-2">
                                    <label for="">Email</label>
                                    <input type="email" class="w-full rounded-lg" :class="{ 'border-2 border-red-500': errors.email }" v-model="userRegisterData.email">
                                    <p v-if="errors.email" class="text-sm mt-[-8px] text-red-500">{{ errors.email }}</p>
                                </div>
                                <div class="flex flex-col gap-2">
                                    <label for="">Password</label>
                                    <input type="password" class="w-full rounded-lg" :class="{ 'border-2 border-red-500': errors.password }" v-model="userRegisterData.password">
                                    <p v-if="errors.password" class="text-sm mt-[-8px] text-red-500">{{ errors.password }}</p>
                                </div>
                                <div class="flex flex-col gap-2">
                                    <label for="">Password</label>
                                    <input type="password" class="w-full rounded-lg" :class="{ 'border-2 border-red-500': errors.confirm_password }" v-model="userRegisterData.confirm_password">
                                    <p v-if="errors.confirm_password" class="text-sm mt-[-8px] text-red-500">{{ errors.confirm_password }}</p>
                                </div>
                                <div class="my-5">
                                    <button type="submit" class="w-full h-10 rounded-lg bg-blue-300">Register</button>
                                </div>
                                <div class="h-10 w-full flex gap-3">
                                    <p>Sudah Punya Akun ??</p>
                                    <Link :href="route('user.login')">Login</Link>
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

import axios from 'axios';

const userRegisterData = reactive({
    username: '',
    email: '',
    password: '',
    confirm_password: '',
    alert: false
});

const errors = reactive({
    username: '',
    email: '',
    password: '',
    confirm_password: ''
});

const validForm = computed(() => {
    errors.username = '';
    errors.email = '';
    errors.password = '';
    errors.confirm_password = '';

    if (/\s/.test(userRegisterData.username)) {
        errors.username = "Username tidak boleh ada spasi";
    }
    if(!userRegisterData.username) {
        errors.username = "Masukkan Username";
    }
    if (!userRegisterData.email) {
        errors.email = "Masukkan Email";
    }
    if(!userRegisterData.password) {
        errors.password = "Masukkan Password";
    }
    if (userRegisterData.password !== userRegisterData.confirm_password) {
        errors.confirm_password = "Password tidak sama";
    }

    return Object.keys(errors).every(key => errors[key] === '');
});

const handleRegister = async () => {
    if (validForm.value) {
        const formData = new FormData();
        formData.append('name', userRegisterData.username);
        formData.append('email', userRegisterData.email);
        formData.append('password', userRegisterData.password);
        console.log(formData)
        try {
            await axios.post('/user/store', formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            });

            userRegisterData.alert = true;
            setTimeout(() => {
                userRegisterData.alert = false;
            }, 10000);

            userRegisterData.username = '';
            userRegisterData.email = '';
            userRegisterData.password = '';
            userRegisterData.confirm_password = '';

        } catch (error) {
            console.error('Registration error', error);
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
.al {
    animation: move2 5s infinite alternate;
}
*{
    animation-timing-function: ease-in-out;
}
@keyframes move {
    0% { transform: translateX(0); }
    25% { transform: translateX(10px); }
    50% { transform: translateX(0); }
    75% { transform: translateX(-10px); }
    100% { transform: translateX(0); }
}
@keyframes move2 {
    0% { transform: translateY(0); }
    20% { transform: translateY(10px); }
    40% { transform: translateY(15px); }
    60% { transform: translateY(10px); }
    80% { transform: translateY(5px); }
    100% { transform: translateY(0px); }
}
</style>
