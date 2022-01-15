const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    mode: 'jit',
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
        },
        container: {
            center: true,
        },
        colors: {
            primary: '#004ebf',
            secondary: '#1aa479',
            'blue': '#004ebf',
            'pink': '#ff49db',
            'orange': '#ff7849',
            'green': '#1aa479',
            'gray-dark': '#273444',
            'gray': '#8492a6',
            'gray-light': '#d3dce6',
        }
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
