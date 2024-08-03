<template>
    <div class="w-full rounded-lg h-[300px] p-3 sticky top-8 flex flex-col bg-gray-300 items-center justify-center">
        <div class="w-full h-28">
            <p>Harga Mulai dari</p>
            <div class="w-[90%] flex items-center justify-center h-16">
                <p>Rp.</p>
                <p class="text-4xl text-red-700">{{ formatNumber(selectedPrice) }}</p>
            </div>
        </div>
        <div class="h-10 my-2 w-[90%] items-center flex gap-2">
            <p class="text-xs">Pilih Paket</p>
            <select @change="updatePrice" class="w-[80%] flex items-center p-1  border-0 text-sm rounded-md h-8">
                <option class="text-sm" value="harga_bulan">Perbulan</option>
                <option class="text-sm" value="harga_6bulan">Per 6 bulan</option>
                <option class="text-sm" value="harga_tahun">Pertahun</option>
            </select>
        </div>
        <div class="w-full flex justify-center items-center flex-col gap-3">
            <button 
            @click="handleCheckout"
            class="rounded-lg w-[90%] h-10 flex items-center justify-center bg-blue-400">Pesan Sekarang</button>
            <button class="rounded-lg w-[90%] h-10 flex items-center justify-center bg-gray-200">Ajukan Pengecekan</button>
        </div>
    </div>
</template>


<script setup>
import { defineProps, reactive, ref , defineEmits, computed } from 'vue';

const props = defineProps({
    harga: {
        type: Object
    }
});
// console.log(props.harga)

const emit = defineEmits(['checkout']);


const paket = computed(() => {
    if(selectedPrice.value === props.harga.harga_bulan){ 
        return 'A';
    }else if (selectedPrice.value === props.harga.harga_6bulan){
        return 'B';
    }else if (selectedPrice.value === props.harga.harga_tahun){
        return 'C';
    }
})

const handleCheckout = () => {
    console.log(paket.value)
    const data = {
        selectedPrice : selectedPrice.value,
        selectedPackage : paket.value
    }
    emit('checkout' , data);
};

const harga = reactive(props.harga);
const selectedPrice = ref(harga.harga_bulan);

const updatePrice = (event) => {
    const selectedValue = event.target.value;
    selectedPrice.value = harga[selectedValue];
};

function formatNumber(number) {
    return number.toLocaleString('id-ID');
}
</script>
