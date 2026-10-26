/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class',

    content: ['./src/**/*.{html,js}'],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', 'ui-sans-serif', 'system-ui', 'sans-serif'],
            },
        },
    },

    plugins: [],
};
