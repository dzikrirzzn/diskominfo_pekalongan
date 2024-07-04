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
        extend: {
            variants: {
                scrollbar: ['rounded'],
              },
              plugins: [
                function ({ addUtilities }) {
                  addUtilities({
                    '.scrollbar-hide': {
                      '::-webkit-scrollbar': {
                        display: 'none',
                      },
                      '-ms-overflow-style': 'none',
                      'scrollbar-width': 'none',
                    },
                  });
                },
              ],
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            backgroundImage: {
                'batik-pattern': "url('/public/img/batik_pkl.png')",
              },
        },
    },
    plugins: [
        require('daisyui'),
        forms],
};
