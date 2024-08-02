import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
        "./node_modules/flowbite/**/*.js",
        'node_modules/flowbite-vue/**/*.{js,jsx,ts,tsx,vue}',
        'node_modules/flowbite/**/*.{js,jsx,ts,tsx}'
    ],

    theme: {
        extend: {
            fontFamily: {
                'sans': ['Inter', 'Roboto', 'sans-serif'],
                'serif': ['Merriweather', 'serif'],
                'mono': ['Menlo', 'monospace'],
                "Poppins" : ["Poppins", "sans-serif"]
            },

            colors: {
                'gopek': '#2471A3'
            },
            keyframes: {
                'slide-left': {
                  from: { transform: 'translateX(0)' },
                  to: { transform: 'translateX(-100%)' },
                },
              },
              animation: {
                'slide-left': 'slide-left 8s linear infinite',
              },
        },
    },

    plugins: [
        forms , 
        require('flowbite/plugin')
    ],
};
