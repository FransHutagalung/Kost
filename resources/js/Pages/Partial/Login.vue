<template>

<div class="w-screen h-screen bg-gray-200">
   
   <div class="w-full h-full  flex items-center justify-center">
         <div class="w-96 p-3 flex flex-col gap-3 items-center h-80 bg-white rounded-lg shadow-sm">
           <p class="text-xl font-bold">Login User</p>
           <form @submit.prevent="login"  class="w-full flex flex-col gap-3">
           <div class="w-full">
               <label for="">Username</label>
               <input v-model="userModel.username" type="text" name="username" class="w-full rounded-lg border p-2">
           </div>
           <div class="w-full">
               <label for="">Password</label>
               <input  v-model="userModel.password" type="password" name="password" class="w-full rounded-lg border p-2">
           </div>
           <div class="w-full">
               <button type="submit" name="submit" value="submit" class="w-full border rounded-lg p-2 bg-blue-500 text-white">Login</button>
           </div>  
           </form>
           <div class="w-full mt-3">
               <Link href="/signup" class="">Register</Link>
           </div>
           
           </div>
         </div>

</div>

</template>

<script setup>
import { defineProps , reactive} from 'vue';
import { Link, router } from '@inertiajs/vue3';

const userModel = reactive({
    username : '' , 
    password : ''
})

const login = () => {
    const formdata = new FormData()
    formdata.append('username' , userModel.username )
    formdata.append('password' , userModel.password )
    router.post('/user/getlogin' , formdata , {
        
    })
}


</script>