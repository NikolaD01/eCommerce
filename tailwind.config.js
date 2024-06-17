import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],
    safelist: [
      'bg-yellow-500',
      'focus:ring-yellow-300',
      'bg-neutral-500',
      'focus:ring-neutral-300',
      'bg-blue-500',
      'focus:ring-blue-300',
      'bg-brown-500',
      'focus:ring-brown-300',
      'bg-green-500',
      'focus:ring-green-300',
      'bg-orange-500',
      'focus:ring-orange-300',
      'bg-pink-500',
      'focus:ring-pink-300',
      'bg-purple-500',
      'focus:ring-purple-300',
      'bg-red-500',
      'focus:ring-red-300',
      'bg-white-500',
      'focus:ring-white-300',
      'bg-indigo-500',
      'focus:ring-indigo-300',
      'bg-teal-500',
      'focus:ring-teal-300',

    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms],
};
