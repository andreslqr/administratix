const colors = require('tailwindcss/colors');

module.exports = {
    darkMode: 'class',
    content: [
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
        './vendor/administratix/administratix/resources/**/*.blade.php',
        './vendor/administratix/administratix/resources/**/*.js',
        './vendor/administratix/admiistratix/config/**/*.php'
    ],
    safelist: [
        {
            pattern: /bg-(primary|secondary|danger|success|info|alert)/,
        },
        {
            pattern: /border-(primary|secondary|danger|success|info|alert)/
        },
        {
            pattern: /text-(primary|secondary|danger|success|info|alert)/
        },
        {
            pattern: /shadow-(primary|secondary|danger|success|info|alert)/
        },
        {
            pattern: /accent-(primary|secondary|danger|success|info|alert)/
        },
        {
            pattern: /rounded-(md|lg|full)/
        },
        {
            pattern: /grid-cols-*/,
            variants: ['sm', 'md', 'lg', 'xl', '2xl']
        },
        {
            pattern: /grid-rows-*/,
            variants: ['sm', 'md', 'lg', 'xl', '2xl']
        },
        {
            pattern: /gap-*/,
            variants: ['sm', 'md', 'lg', 'xl', '2xl']
        }
    ],
    theme: {
        extend: {
            colors: {
                'background-general': {
                    light: colors.slate['200'],
                    DEFAULT: colors.slate['200'],
                    dark: colors.slate['800'],
                },
                'background-secondary': {
                    light: colors.slate['50'],
                    DEFAULT: colors.slate['50'],
                    dark: colors.slate['800'],
                },
                overlay: "var(--color-overlay)",
                primary: "var(--color-primary)",
                secondary: "var(--color-secondary)",
                danger: "var(--color-danger)",
                success: "var(--color-sucess)",
                info: "var(--color-info)",
                alert: "var(--color-alert)"
            },
            spacing: {
                '256': '16rem',
                '64': "4rem",
                '56': '3.5rem'
            },
        },
        screens: {
            'sm': '640px',
            'md': '768px',
            'lg': '1024px',
            'xl': '1280px',
            '2xl': '1536px',
        },
        container: {
            center: true,
        },
    },
    plugins: [],
}