<template>
    <div class="w-full h-full bg-white flex flex-row">
        <div class="w-1/6 hidden md:block bg-gray-200 h-26 fixed">
            <Navbar />
        </div>
        <div class="w-1/6"></div>

        <div class="md:w-5/6 w-full bg-blue-100 rounded-md h-screen mx-2 p-2">
            <h2 class="text-2xl my-2 font-bold">Kost Bunga Cempaka</h2>
            <div class="flex w-full h-20">
                <ul class="flex flex-row gap-3 ">
                    <li>Semua</li>
                    <li>Terisi</li>
                    <li>Belum Terisi</li>
                </ul>
            </div>
            <button @click="modal.show" 
            data-modal-target="crud-modal"
             data-modal-toggle="crud-modal" 
             class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                Tambah Kamar
            </button>

            <div v-if="isExist" class="w-full p-2 h-auto flex flex-row flex-wrap gap-5 mt-3 ">
                <div v-for="(data, index) in props.dataAll" :key="index" class="w-60 h-60">
                    <Bedroom :data="data" :defaultImageUrl="gambarDefault" />
                </div>
            </div>
            <div v-else class="flex w-full h-screen">
                <h2 class="text-xl text-center">Tidak ada kost</h2>
            </div>
        </div>

        <div id="crud-modal" tabindex="-1" aria-hidden="true" ref="crudModal" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <FormCreateBedroom @success="closeModal" />
        </div>
    </div>
</template>

<script setup lang="ts">
import { initFlowbite, Modal } from 'flowbite';
import type { ModalOptions, ModalInterface } from 'flowbite';
import gambarDefault from './Assets/default.jpg';
import Navbar from './Components/Navbar.vue';
import { defineProps, ref, onMounted } from 'vue';
import FormCreateBedroom from './Components/FormCreateBedroom.vue';
import Bedroom from './Bedroom/Bedroom.vue';

const props = defineProps({
    isExist: {
        type: Boolean,
        required: true
    },
    dataAll: {
        type: Array,
        required: false
    }
});

const crudModal = ref<HTMLElement | null>(null);
let modal: ModalInterface | null = null;

const modalOptions: ModalOptions = {
    placement: 'center',
    backdrop: 'dynamic',
    backdropClasses: 'bg-gray-900/50 dark:bg-gray-900/80 fixed inset-0 z-40',
    closable: true,
    onHide: () => {
        console.log('modal is hidden');
    },
    onShow: () => {
        console.log('modal is shown');
    },
    onToggle: () => {
        console.log('modal has been toggled');
    },
};




const closeModal = () => {
    modal.hide()    
}
onMounted(() => {
    initFlowbite();
    if (crudModal.value) {
        modal = new Modal(crudModal.value, modalOptions);
        // modal.show();
    }
});
</script>

<style scoped>
li {
    background-color: black;
    color: white;
    height: 30px;
    padding: 5px;
    border-radius: 5px;
}
</style>
