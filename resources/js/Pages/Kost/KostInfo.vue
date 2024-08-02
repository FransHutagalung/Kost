<template>

<div class="w-full h-full bg-white flex flex-row">
        <div class="w-1/6 hidden md:block bg-gray-200 h-26 fixed">
            <Navbar />
        </div>
        <div class="w-1/6"></div>

        <div class="md:w-5/6 w-full gap-2 flex bg-blue-100 rounded-md h-screen mx-2 p-2">

            <div class=" w-1/2 flex flex-col gap-3">
                <p class="text-xl">Informasi Kost</p>
                <div class="flex flex-row w-full">
                     <div class="w-1/4">
                        <div class="h-10">
                            <p>Nama Kost</p>
                        </div>
                        <div class="h-10">
                            <p>Email Kost</p>
                        </div>
                        <div class="h-10">
                            <p>Telp Kost</p>
                        </div>
                        <div class="h-10">
                            <p>Luas Tanah</p>
                        </div>
                        <div class="h-10">
                            <p>Alamat Kost</p>
                        </div>
                     </div>
                     <div class="w-3/4">
                        <div class="h-10">
                            <input 
                            :disabled="Editable"
                            class="w-full h-8 border-0 focus:border-gray-300 hover:border-gray-300 focus:ring-0"
                            type="text" v-model="data.namaKost">
                        </div>
                        <div class="h-10">
                            <input 
                            :disabled="Editable"
                            class="w-full h-8 border-0 focus:border-gray-300 hover:border-gray-300 focus:ring-0"
                            type="text" v-model="data.email">
                        </div>
                        <div class="h-10">
                            <input 
                            :disabled="Editable"
                            class="w-full h-8 border-0 focus:border-gray-300 hover:border-gray-300 focus:ring-0"
                            type="text" v-model="data.notelp">
                        </div>
                        <div class="h-10 flex items-center gap-3 ">
                            <input 
                            :disabled="Editable"
                            class="w-3/4 h-8 border-0 focus:border-gray-300 hover:border-gray-300 focus:ring-0"
                            type="text" v-model="data.luasTanah">
                            <p>Meter Persegi</p>
                        </div>
                        <div class="h-40 pt-1 flex items-center w-full">
                            <textarea
                            :disabled="Editable"
                             name="" id="" class="w-full h-full rounded-md border-0 focus:border-gray-300 hover:border-gray-300 focus:ring-0" v-model="data.lokasiKost"></textarea>
                        </div>

                     </div>
                </div>
             
                <div v-if="Editable" class="w-[100%] h-12">
                    <button 
                    @click="goToEdit"
                    class="w-full  h-10 bg-blue-400" >Ubah Data</button>
                </div>
                <div v-else class="w-[100%] flex gap-2 h-12">
                    <button
                     @click="goToEdit"
                     class="w-1/2 h-10 bg-yellow-500 ">
                        Reset Data
                    </button>
                    <button
                    @click="saveData"
                     class="w-1/2 h-10 bg-green-500 "
                    > Simpan Perubahan </button>
                </div>
            </div>

            <div class="w-1/2">
                 <FasilitasKost
                 :data="fasilitas"
                 />
            </div>

        </div>
</div>

</template>

<script setup>
import Navbar from '../Components/Navbar.vue';
import { router } from '@inertiajs/vue3';
import { computed, defineProps , reactive , watch } from 'vue';
import FasilitasKost from '../Partial/FasilitasKost.vue';

const data = reactive({
    namaKost : '' , 
    lokasiKost : '' , 
    notelp :  '' ,
    disabled : true  , 
    email : '' , 
    luasTanah : 0 , 
    id : '' , 
    updated : false
})

const originalData = reactive({
  namaKost: '',
  lokasiKost: '',
  notelp: '',
  email : ''  , 
  luasTanah :  0 , 
});

const props = defineProps({
    data : {
        type : Object , 
        required : true
    } , 
    fasilitas : {
        type : Array
    }
})

const Editable = computed(() =>{
   return data.disabled || data.updated
})

const resetData = () => {
    console.log('reset data')
    Object.assign(data , {...originalData})
}

const goToEdit =  () => {
    data.disabled = !data.disabled
    resetData()
}

const saveData = () => {
    if(!data.disabled){
        const formData = new FormData()
        formData.append('id' , data.id)
        formData.append('nama_kost' , data.namaKost)
        formData.append('alamat' , data.lokasiKost)
        formData.append('no_telp' , data.notelp)
        formData.append('email' , data.email)
        formData.append('luas_tanah' , data.luasTanah)
        try {
            router.post('/admin/kost/update' , formData , {
                onSuccess : () => {
                    data.updated = true
                }
            })
        }catch(e) {
            console.log(e)
        }
    }

}

watch(() => props.data , (newData) => {
    Object.assign(data , {
        namaKost : newData.nama_kost , 
        lokasiKost : newData.alamat , 
        notelp : newData.no_telp ,
        email : newData.email , 
        luasTanah : newData.luas_tanah,
        id : newData.id
    })
    Object.assign(originalData , {
        namaKost : newData.nama_kost , 
        lokasiKost : newData.alamat , 
        notelp : newData.no_telp , 
        email : newData.email , 
        luasTanah : newData.luas_tanah
    })
}, {immediate : true})


</script>