import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],
    
    theme: {
        extend: {
            colors: {
                customYellow: '#C68D2E',
            },
            fontSize: {
                'xxs': '0.625rem', // Tambahkan ukuran font baru
            },
            variants: {
                scrollbar: ["rounded"],
            },
            fontFamily: {
                sans: ['Poppins', "Figtree", ...defaultTheme.fontFamily.sans],
            },
            backgroundImage: {
                "batik-pattern": "url('/public/img/batik_pkl.png')",
            },
        },
    },
    
    plugins: [
        require("daisyui"),
        forms,
        function ({ addUtilities }) {
            addUtilities({
                ".scrollbar-hide": {
                    "::-webkit-scrollbar": {
                        display: "none",
                    },
                    "-ms-overflow-style": "none",
                    "scrollbar-width": "none",
                },
                ".text-justify": {
                    "text-align": "justify",
                },
                ".placeholder-lg::placeholder": {
                    "font-size": "1.25rem", // Atur ukuran placeholder
                    "color": "#000", // Atur warna placeholder jika diperlukan
                },
            });
        },
    ],
};
