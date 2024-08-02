<template>
    <div class="w-full cursor-pointer h-auto font-poppins p-2 bg-white">
        <Navbar @scrollTo="scrollToSection" />
        <div ref="homeSection">
            <Home />
        </div>
        <div ref="bedroomSection">
            <Bedroom :Bedrooms="props.Bedrooms" />
        </div>
        <div ref="aboutSection">
            <About />
        </div>
        <Testimonial />
        <div ref="contactSection">
            <Contact/>
        </div>
    </div>
</template>

<script setup>
import Navbar from './Partial/Navbar.vue';
import Home from './Partial/Home.vue';
import About from './Partial/About.vue';
import Bedroom from './Partial/Bedroom.vue';
import Testimonial from './Partial/Testimonial.vue';
import Contact from './Partial/Contact.vue';
import { defineProps, ref, watch } from 'vue';
import { useDataStore } from './Stores/GeneratedClient';

const props = defineProps({
    errors: Object,
    Bedrooms: Array,
    isLogin: Boolean,
    user: {
        type: Object,
        default: null
    }
});

const homeSection = ref(null);
const bedroomSection = ref(null);
const aboutSection = ref(null);
const contactSection = ref(null);

const sections = {
    home: homeSection,
    bedroom: bedroomSection,
    about: aboutSection,
    contact: contactSection,
};

const dataStore = useDataStore();

// homepage.vue
watch(() => props.user, (newUser) => {
    if (newUser) {
        console.log(newUser)
        dataStore.setUser(newUser);
    } else {
        dataStore.setUser({ name: '', id: null });
    }
} , { immediate: true });

watch(() => props.isLogin, (newStatus) => {
    dataStore.setLogin(!!newStatus); // Pastikan newStatus adalah boolean
} , { immediate: true });


const scrollToSection = (section) => {
    sections[section]?.value.scrollIntoView({ behavior: 'smooth' });
};
</script>
