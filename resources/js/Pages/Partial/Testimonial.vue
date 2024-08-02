<template>

        <div class="flex w-full justify-center mt-[50px] items-center">
            <h2 class="text-3xl">Apa Kata Mereka</h2>
        </div>
        <div class="w-full  flex flex-row  justify-center items-center  my-[100px] gap-[60px]">
            <TestimonialCard :image="image1" />
            <TestimonialCard :image="image2" :height="true"/>
            <TestimonialCard :image="image3" />
        </div>

</template>

<script setup>
import TestimonialCard from './TestimonialCard.vue';
import image1 from '../Assets/artis1.jpg'   
import image2 from '../Assets/artis2.jpg'   
import image3 from '../Assets/artis3.jpg'   
</script>