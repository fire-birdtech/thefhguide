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
            maxWidth: {
                'body': '1072px',
            },
            minHeight: {
                '16': '4rem',
            },

            typography: ({ theme }) => ({
                DEFAULT: {
                    css: {
                        body: {
                            lineHeight: '1.5rem',
                        },
                        a: {
                            color: theme('colors.teal[600]'),
                            textDecorationLine: 'none',
                            '&:hover': {
                                color: theme('colors.amber[500]'),
                            },
                        },
                        '--tw-prose-body': theme('colors.neutral[900]'),
                        '--tw-prose-bullets': theme('colors.neutral[800]')
                    }
                }
            })
        },
    },

    plugins: [
        require('@tailwindcss/aspect-ratio'),
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography')
    ],
};
