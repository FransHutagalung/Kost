<template>
   <div>
     <h1>Welcome to Home Page</h1>
   </div>
 </template>
 
 <script setup>
 import { defineProps } from 'vue';
 
 const props = defineProps({
   errors: Object,
 });
 </script>
 