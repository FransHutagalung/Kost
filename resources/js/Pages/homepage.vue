<template>
    <div class="w-full h-auto font-poppins p-2 bg-white">

        <Navbar />
        <Carousel />
        <Welcome />
        <Home />
        <About />
        <Bedroom :Bedrooms="props.Bedrooms" />

    </div>
</template>


<script setup>
import Navbar from './Partial/Navbar.vue';
import Carousel from './Partial/Carousel.vue';
import Welcome from './Partial/Welcome.vue';
import Home from './Partial/Home.vue';
import About from './Partial/About.vue';
import Bedroom from './Partial/Bedroom.vue';
import { defineProps } from 'vue';

const props = defineProps({
    errors: Object,
    Bedrooms: Array
});

console.log(props.Bedrooms)

</script>