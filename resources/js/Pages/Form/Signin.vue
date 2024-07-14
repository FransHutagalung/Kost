<template>
        <div class="w-full md:p-0 p-2 h-screen flex justify-center items-center">
        <div class="md:w-3/5 w-full md:h-60 h-[350px] md:bg-blue-300 rounded-lg flex items-center flex-col md:flex-row ">
            <div class="flex w-1/2 h-full "></div>
            
                  <form class="w-full md:w-1/2 h-full flex flex-col gap-3 justify-center px-3" action="" @submit.prevent="goData">
                     <div class="">
                        <label class="text-sm" for="Username">Username</label>
                        <input class="w-full rounded-lg "  type="text" v-model="form.username" name="" id="">
                     </div>
                     <div class="">
                        <label class="text-sm" for="Password">Password</label>
                        <input class="w-full rounded-lg " type="password" v-model="form.password" name="" id="">
                     </div>
                     <div class="">
                        <input type="submit" value="Login" class="w-full rounded-lg bg-blue-500 h-10">
                     </div>
                  </form>
            
        </div>
    </div>
</template>

<script setup lang="ts">
import { useForm } from '@inertiajs/vue3';
import { ref, defineProps, computed } from 'vue';

const props = defineProps({
    status: {
        type: String,
    },
});

const form = useForm({
    username: ref(''),
    password: ref(''),
});
const goData = () => {
    if(form.username.value.length < 5 ){

    }
}

const getlastId = computed(() => {
    return props.status
})

</script>