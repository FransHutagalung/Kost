<template>

<div class="w-screen h-screen bg-gray-200">
   
   <div class="w-full h-full  flex items-center justify-center">
       <form @submit.prevent="handleRegister">

           <div class="w-96 p-3 flex flex-col gap-3 items-center  bg-white rounded-lg shadow-sm">
               <p class="text-xl font-bold">Sign Up User</p>
               <div 
               v-if="errorfromServer"
               class="w-full h-10 rounded-md bg-red-600 mt-3 flex items-center justify-center gap-3" style="color: white;">
                <i class="fa-solid fa-lg fa-xmark"></i>
                <p>{{ errorfromServer }}</p>
               </div>
               <div class="w-full">
                   <label for="">Username</label>
                   <input 
                   v-model="userData.username"
                   type="text" name="username" class="w-full rounded-lg border p-2">
                   <p
                   class="text-sm text-red-500"
                   v-if="error.username">{{ error.username }}</p>
               </div>
               <div class="w-full">
                   <label for="">Email</label>
                   <input
                   v-model="userData.email"
                    type="text" name="email" class="w-full rounded-lg border p-2">
                   <p
                   class="text-sm text-red-500"
                   v-if="error.email">{{ error.email }}</p>
               </div>
               <div class="w-full">
                   <label for="">Password</label>
                   <input 
                   v-model="userData.password"
                   type="password" name="password" class="w-full rounded-lg border p-2">
                   <p
                   class="text-sm text-red-500"
                   v-if="error.password">{{ error.password }}</p>
               </div>
               <div class="w-full">
                   <button type="submit" name="submit" value="submit" class="w-full border rounded-lg p-2 bg-blue-500 text-white">Daftar</button>
               </div>
               <div class="w-full mt-3">
                   <Link href="/login" class="">Login</Link>
               </div>
               
           </div>
       </form>
       </div>
       <!-- <button @click="show">test</button> -->
   </div>



</template>

<script setup >
import { Link  } from '@inertiajs/vue3';
import { router } from '@inertiajs/vue3';
import { reactive  , computed , defineProps} from 'vue';
import { usePage } from '@inertiajs/inertia-vue3';
import axios from 'axios';

const { version } = usePage();

// const errors = reactive(props.errors || {});
const props = defineProps({
    errorfromServer : {
        type : String
    }
})

const show = () => {
    console.log(props.errorfromServer)

}



const userData = reactive({
    username : '' , 
    email : '' , 
    password : ''
})

const error = reactive({
    username :  '', 
    email : '' , 
    password : ''
})

const errorHandle = computed(() => {
    error.email = ''
    error.username = ''
    error.password = ''

    if(/\s/.test(userData.username)){
        error.username = 'Username tidak boleh ada spasi'
    }
    if(userData.password.length < 8){
        error.password = 'Password minimal 8 karakter'
    }
    if(!userData.username) {
        error.username = "Masukkan Username";
    }
    if (!userData.email) {
        errowil = "Masukkan Email";
    }
    if(!userData.password) {
        error.password = "Masukkan Password";
    }

    return Object.keys(error).every(key => error[key] === '')
})

const handleRegister = async () => {
    if(errorHandle.value) {
        const formData = new FormData()
        formData.append('username', userData.username)
        formData.append('email', userData.email)
        formData.append('password', userData.password)
        formData.append('type', 'user')
        try {
         router.post('/customer/store', formData , {
                headers: {
                    'Content-Type': 'multipart/form-data',
                    // 'X-Inertia': true,
                    // 'X-Inertia-Partial-Component': 'User/index',
                    // 'X-Inertia-Partial-Data': 'users',
                    // 'X-Inertia-Version': version.value,
                }, 
            })
        }catch(error) {
            console.log(error)
            if (error.response && error.response.status === 400) {
            const responseErrors = error.response.data.errors;
            Object.keys(responseErrors).forEach(key => {
            error[key] = responseErrors[key][0];
            });
        }
        }
    }
            
}

</script>