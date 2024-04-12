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
                'background': '#1c2a51',
                'accentLight': '#6497b1',
                'accentMid': '#005b96',
                'accentDark': '#03396c',
                'white': '#ffffff',
                'gray-dark': '#273444',
                'gray': '#8492a6',
                'gray-light': '#d3dce6',
            },
        },
    },
    plugins: [],
}
