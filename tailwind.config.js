import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
const fs = require('fs');
const colors = JSON.parse(fs.readFileSync('./storage/colors.json'));

const generateSafeList = (colors) => {
    const safelist = [];
    colors.forEach(color => {
        safelist.push(`bg-${color}-500`);
        safelist.push(`focus:ring-${color}-300`);
    });
    return safelist;
}

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],
    safelist: generateSafeList(colors),
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms],
};
