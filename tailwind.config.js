/** @type {import('tailwindcss').Config} */

const colors = require('tailwindcss/colors')
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                'primary': '#1e40af',
                'background': '#1c2a51',
                'backgroundDark': '#0d1427',
                'accentLight': '#6497b1',
                'accentMid': '#005b96',
                'accentDark': '#03396c',
                'white': '#ffffff',
                'gray-dark': '#273444',
                'gray': '#8492a6',
                'gray-light': '#d3dce6',
                'error': '#bb1515',
                'error-light': '#f4b7b7',
                'contrast-dark': '#004c5b'
            },
        },
    },
    plugins: [],
}
