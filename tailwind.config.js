import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: ['./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php', './storage/framework/views/*.php', './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            colors: {
                'primary': {
                    DEFAULT: '#1e3a8a', // blue-900
                    'light': '#bfdbfe', // blue-200
                }, 'accent': '#eab308', // yellow-500
            },
        },
    }, plugins: [],
    plugins: [forms],
}



