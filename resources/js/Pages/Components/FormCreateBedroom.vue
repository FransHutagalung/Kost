<template>


    <div class="modal1 none relative mx-auto border border-black w-[800px] max-w-md max-h-full ms-[400px]" x-data="{ showModal: true }" x-show="showModal" ref="modal">
      <!-- Modal content -->
      <div class="relative w-[850px] bg-white rounded-lg shadow dark:bg-gray-700 p-3">
        <!-- Modal header -->
        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
          <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
            Tambahkan Kamar
          </h3>
          <button type="button" 
          @click="close"
          class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
            <span class="sr-only">Close modal</span>
          </button>
        </div>
        <!-- Modal body -->
        <form class="p-4 md:p-5" @submit.prevent="goData">
          <div class="grid gap-4 mb-4 grid-cols-6">
            <div class="col-span-2">
              <label for="">Nama Kamar</label>
              <input type="text" v-model="form.nama_kamar" name="" class="w-full rounded-lg" :class="{ 'border-red-500': errors.nama_kamar }" id="">
              <p v-if="errors.nama_kamar" class="text-red-500 mt-1 text-sm">{{ errors.nama_kamar }}</p>
            </div>
            <div class="col-span-2 flex flex-col">
              <label for="">Status Kamar</label>
              <select name="" v-model="form.status" id="" class="w-full rounded-lg">
                <option value="Tersedia">Tersedia</option>
                <option value="Tidak Tersedia">Tidak Tersedia</option>
              </select>
            </div>
            <div class="col-span-2 row-span-2 flex flex-col">
              <label for="">Harga Kamar</label>
              <div class="flex flex-col w-full mt-[-19px]">
                <div class="flex items-center">
                  <p class="text-sm mx-1">Rp.</p>
                  <div class="flex flex-col w-full">
                    <div class="w-full flex items-end gap-2">
                      <input type="text" v-model="form.harga_bulan" class="w-4/5 rounded-lg mt-5" :class="{ 'border-red-500': errors.harga }" name="" id="">
                      <p class="text-sm">/bulan</p>
                    </div>
                    <p v-if="errors.harga" class="text-red-500 mt-1 text-sm">{{ errors.harga }}</p>
                  </div>
                </div>
                <button type="button" @click="autodata" class="bg-blue-500 w-[70%] text-white px-3 py-1 rounded-lg ms-8 mt-5">Otomatis Isi</button>
                <div class="flex items-center">
                  <p class="text-sm mx-1">Rp.</p>
                  <div class="flex flex-col w-full">
                    <div class="w-full flex items-end gap-2">
                      <input type="text" v-model="form.harga_6bulan" class="w-4/5 rounded-lg mt-5" :class="{ 'border-red-500': errors.harga }" name="" id="">
                      <p class="text-sm">/6 bulan</p>
                    </div>
                    <p v-if="errors.harga" class="text-red-500 mt-1 text-sm">{{ errors.harga }}</p>
                  </div>
                </div>
                <div class="flex items-center">
                  <p class="text-sm mx-1">Rp.</p>
                  <div class="flex flex-col w-full">
                    <div class="w-full flex items-end gap-2">
                      <input type="text" v-model="form.harga_tahun" class="w-4/5 rounded-lg mt-5" :class="{ 'border-red-500': errors.harga }" name="" id="">
                      <p class="text-sm">/tahun</p>
                    </div>
                    <p v-if="errors.harga" class="text-red-500 mt-1 text-sm">{{ errors.harga }}</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="flex flex-col col-span-4">
              <p>Ukuran kamar *cm</p>
              <div class="flex flex-row w-full gap-2">
                <div class="w-1/3 flex flex-col">
                  <p>Panjang</p>
                  <input type="text" name="" v-model="form.panjang" id="" class="w-full rounded-lg">
                </div>
                <div class="w-1/3 flex flex-col">
                  <p>Lebar</p>
                  <input type="text" name="" id="" v-model="form.lebar" class="w-full rounded-lg">
                </div>
                <div class="w-1/3 flex flex-col">
                  <p>Tinggi</p>
                  <input type="text" name="" id="" v-model="form.tinggi" class="w-full rounded-lg">
                </div>
              </div>
            </div>
            <div class="flex flex-col col-span-2">
              <label for="">Deskripsi</label>
              <textarea name="" v-model="form.deskripsi" id="" class="w-full h-60 rounded-lg"></textarea>
            </div>
            <div class="flex col-span-2 flex-col gap-4 p-3">
              <label for="">Fasilitas</label>
              <div class="flex flex-row w-full flex-wrap gap-2">
                <div class="flex gap-1 items-center">
                  <input type="checkbox" name="" v-model="form.fasilitas" value="Ac" id="">
                  <label for="">AC</label>
                </div>
                <div class="flex gap-1 items-center">
                  <input type="checkbox" name="" v-model="form.fasilitas" value="Wi-fi" id="">
                  <label for="">Wi -fi</label>
                </div>
                <div class="flex gap-1 items-center">
                  <input type="checkbox" name="" v-model="form.fasilitas" value="Kipas" id="">
                  <label for="">Kipas</label>
                </div>
                <div class="flex gap-1 items-center">
                  <input type="checkbox" name="" v-model="form.fasilitas" value="kamar Mandi Dalam" id="">
                  <label for="">Kamar Mandi Dalam</label>
                </div>
                <div class="flex gap-1 items-center">
                  <input type="checkbox" name="" v-model="form.fasilitas" value="Kasur" id="">
                  <label for="">Kasur</label>
                </div>
              </div>
              <input type="file" ref="fileInput" @change="handleFileChange" accept="image/*">
              <p v-if="errors.file" class="text-red-500 mt-1 text-sm">{{ errors.file }}</p>
            </div>
          </div>
          <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
            Simpan Data
          </button>
        </form>
      </div>
    </div>
  </template>
  
  <script setup>
  import { useForm } from '@inertiajs/vue3';
  import { router } from '@inertiajs/vue3';
  import { ref, defineProps,defineEmits , computed, reactive , onMounted} from 'vue';
  import Alpine from 'alpinejs'
  window.Alpine = Alpine
  Alpine.start()
  
  
  const form = reactive({
    nama_kamar: '',
    deskripsi: '',
    harga_bulan: 0,
    harga_6bulan: 0,
    harga_tahun: 0,
    status: 'available',
    panjang: 0,
    lebar: 0,
    tinggi: 0,
    fasilitas: [],
    file: null,
  });


  

  
  const errors = reactive({
    nama_kamar: '',
    harga: '',
    file: '',
  });
  
  const handleFileChange = (event) => {
    form.file = event.target.files[0];
  };
  
  const isValidForm = computed(() => {
    errors.nama_kamar = '';
    errors.harga = '';
    errors.file = '';
  
    if (!form.nama_kamar) {
      errors.nama_kamar = 'Nama kamar harus diisi';
    }
    if (!form.harga_bulan) {
      errors.harga = 'Harga harus diisi';
    }
    if (isNaN(form.harga_bulan)) {
      errors.harga = 'Harga harus berupa angka';
    }
    if (!form.file || form.file.size === 0) {
      errors.file = 'File harus diisi';
    }
  
    return Object.keys(errors).every((key) => errors[key] === '');
  });
  
  const autodata = () => {
    form.harga_bulan = form.harga_bulan;
    form.harga_6bulan = Number(form.harga_bulan) * 6 - 120000;
    form.harga_tahun = Number(form.harga_bulan) * 12 - 24000;
  };


  const emit = defineEmits(['success']);
  const close = () => {
    console.log('close')
    const updateCloseModal = {
            showModal: false ,
            status : true 
          }
          emit('success', updateCloseModal)
          resetData()
  }

  const resetData = () => {
          form.nama_kamar = '';
          form.deskripsi = '';
          form.harga_bulan = 0;
          form.harga_6bulan = 0;
          form.harga_tahun = 0;
          form.status = 'available';
          form.panjang = 0;
          form.lebar = 0;
          form.tinggi = 0;
          form.fasilitas = [];
          form.file = null;
  }

  
  const goData =  async() => {
    if (isValidForm.value) {
      console.log(form);
      let formData = new FormData();
      formData.append('nama_kamar', form.nama_kamar);
      formData.append('deskripsi', form.deskripsi);
      formData.append('harga_bulan', form.harga_bulan);
      formData.append('harga_6bulan', form.harga_6bulan);
      formData.append('harga_tahun', form.harga_tahun);
      formData.append('status', form.status);
      formData.append('panjang', form.panjang);
      formData.append('lebar', form.lebar);
      formData.append('tinggi', form.tinggi);
      formData.append('file', form.file);
  
      form.fasilitas.forEach((fasilitas, index) => {
        formData.append(`fasilitas[${index}]`, fasilitas);
      });
  
       router.post('/kamar/store', formData, {
        headers: {
          'Content-Type': 'multipart/form-data',
        },
        onSuccess: () => {
          console.log('Success')
          resetData()
          close()
          document.dispatchEvent(new CustomEvent('close-modal'));
        },
      });
    }
  };

  onMounted(() => {
    document.addEventListener('DOMContentLoaded', function () {
    document.addEventListener('close-modal', function () {
        Alpine.store('modalState', { showModal: false });
    });
    });
  })
  </script>
  