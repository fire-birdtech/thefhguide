const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.ts',
        './resources/js/**/*.tsx',
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
            boxShadow: {
                'action': '0 0 0 2px rgba(255, 255, 255, 0), 0 0px 0px 2px rgba(76, 159, 254, 0)'
            }
        },
    },

    plugins: [
        require('@tailwindcss/aspect-ratio'),
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography')
    ],
};
