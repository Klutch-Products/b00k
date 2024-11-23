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
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'primary': {
                    DEFAULT: '#1e3a8a', // blue-900
                    'light': '#bfdbfe', // blue-200
                },
                'accent': '#eab308', // yellow-500
                'jet': {
                    DEFAULT: '#343434',
                    100: '#0a0a0a',
                    200: '#141414',
                    300: '#1f1f1f',
                    400: '#292929',
                    500: '#343434',
                    600: '#5c5c5c',
                    700: '#858585',
                    800: '#adadad',
                    900: '#d6d6d6'
                },
                'delft-blue': {
                    DEFAULT: '#2f3061',
                    100: '#090913',
                    200: '#131327',
                    300: '#1c1c3a',
                    400: '#25264d',
                    500: '#2f3061',
                    600: '#464892',
                    700: '#6a6cb7',
                    800: '#9c9dcf',
                    900: '#cdcee7'
                },
                'egyptian-blue': {
                    DEFAULT: '#0e34a0',
                    100: '#030b20',
                    200: '#061540',
                    300: '#082060',
                    400: '#0b2a80',
                    500: '#0e34a0',
                    600: '#1349dd',
                    700: '#4572ef',
                    800: '#83a1f4',
                    900: '#c1d0fa'
                },
                'ultra-violet': {
                    DEFAULT: '#5f5980',
                    100: '#13121a',
                    200: '#262434',
                    300: '#3a364e',
                    400: '#4d4868',
                    500: '#5f5980',
                    600: '#7c76a0',
                    700: '#9d98b7',
                    800: '#bebacf',
                    900: '#dedde7'
                },
                'platinum': {
                    DEFAULT: '#dfdfdf',
                    100: '#2c2c2c',
                    200: '#595959',
                    300: '#858585',
                    400: '#b1b1b1',
                    500: '#dfdfdf',
                    600: '#e4e4e4',
                    700: '#ebebeb',
                    800: '#f2f2f2',
                    900: '#f8f8f8'
                }
            }
        },
    },
    plugins: [forms],
}
