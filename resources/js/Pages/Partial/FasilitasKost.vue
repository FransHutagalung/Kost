<template>

<div class="w-full h-full p-3">

    <p>Fasilitas Kost</p>
    <button 
     @click="toggleAdd"
     class="h-10 w-full rounded-lg bg-yellow-300 ">Tambah Fasilitas</button>

     <div class="w-full mt-3  flex gap-2 h-10" v-if="isAdd">
         <input type="text" class="w-4/5 rounded-md h-full" v-model="fasilitas.nama">
         <button 
         @click="addFasilitas"
         class="w-1/5 h-full bg-green-400 rounded-md">Simpan</button>
        </div>
        <div class="h-6"></div>

    <div 
    class="w-full flex items-center px-3 bg-green-700 text-white h-8 rounded-md justify-between my-2"
    v-for="d in data" :key="d"
    >
    {{ d.fasilitas_gedung }}
    <Link :href="route('fasilitas.destroy', { id: d.id })">
                    <span class="" style="color: white">
                        <i class="fa-solid fa-trash"></i>
                    </span>
                </Link>
    </div>


</div>

</template>

<script setup>
import { defineProps, reactive , ref } from 'vue';
import { Link } from '@inertiajs/vue3';
import { router } from '@inertiajs/vue3';

const props = defineProps({
    data : {
        type : Array
    }
})

const fasilitas = reactive({
    nama : '' , 
    status : ''
})
const isAdd = ref(false)

const addFasilitas = () => {
    const formdata = new FormData()
    formdata.append('fasilitas' , fasilitas.nama)
    formdata.append('status' , 'Ada')

    try {
        router.post('/admin/fasilitas/store' , formdata , {
            onSuccess : () => {
                isAdd.value = false
                fasilitas.nama = ''
            }
        })
    } catch (error) {
         console.log(error)
    }
}
const toggleAdd = () => {
  isAdd.value = !isAdd.value;
};

</script>