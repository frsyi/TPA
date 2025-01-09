import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class', // Mengaktifkan mode dark berbasis class
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                light: {
                    background: '#00738a', // Warna latar belakang untuk tema light
                    primary: '#1a73e8',    // Warna utama untuk tema light
                    secondary: '#f5f5f5', // Warna sekunder untuk tema light
                    text: '#333333',       // Warna teks untuk tema light
                    active: '#00738a',
                },
                dark: {
                    background: '#1e1e2f', // Warna latar belakang untuk tema dark
                    primary: '#8ab4f8',    // Warna utama untuk tema dark
                    secondary: '#2c2c3b', // Warna sekunder untuk tema dark
                    text: '#e5e5e5',       // Warna teks untuk tema dark
                },
            },
        },
    },

    plugins: [forms],
};
