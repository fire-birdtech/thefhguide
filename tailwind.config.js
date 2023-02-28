const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Open Sans', ...defaultTheme.fontFamily.sans],
                display: ['Montserrat', ...defaultTheme.fontFamily.sans]
            },
            fontSize: {
                '2.5xl': '1.75rem',
                '4.5xl': '2.5rem'
            },
            minHeight: {
                '32': '8rem',
            },
        },
    },

    plugins: [
        require('@tailwindcss/aspect-ratio'),
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography')
    ],
};
