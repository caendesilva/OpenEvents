const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    content: [
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
            typography: {
                DEFAULT: {
                    css: {
                        lineHeight: '1.5em',
                        h2: {
                            marginBottom: '0.75em',
                            marginTop: '1.5em',
                        },
                        a: {
                            color: '#5956eb',
                            '&:hover': {
                                color: '#4f46e5',
                            },
                            textDecoration: 'none'
                        },
                        blockquote: {
                            backgroundColor: '#80808020',
                            borderLeftColor: '#d1d5db',
                            color: 'unset',
                            fontWeight: 500,
                            fontStyle: 'unset',
                            lineHeight: '1.25em',
                            paddingLeft: '0.75em',
                            paddingTop: '.25em',
                            paddingBottom: '.25em',
                            marginTop: '1em',
                            marginBottom: '1em',
                            p: {
                                paddingRight: '.25em',
                                marginTop: '.25em',
                                marginBottom: '.25em',
                            },
                            'p::before': {
                                content: 'unset',
                            },
                            'p::after': {
                                content: 'unset',
                            },
                        },
                        code: {
                            font: 'unset',
                            backgroundColor: '#80808033',
                            paddingLeft: '4px',
                            paddingRight: '4px',
                            marginLeft: '-2px',
                            marginRight: '1px',
                            borderRadius: '4px',
                            whiteSpace: 'pre',
                        },
                        'code::before': {
                            content: 'unset',
                        },
                        'code::after': {
                            content: 'unset',
                        },
                        pre: {
                            code: {
                                fontFamily: "'Fira Code Regular', Consolas, Monospace, 'Courier New'",
                            }
                        }
                    },
                },
            },
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
