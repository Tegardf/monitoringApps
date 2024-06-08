import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        fontFamily: {
            sans: ['"TT Commons Pro"', 'sans-serif'],
        },
        extend: {
            
            colors:{
                color1:"#D8E6ED",
            }
        },

    },

    plugins: [forms],
};
