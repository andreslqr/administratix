const colors = require('tailwindcss/colors');

module.exports = {
    content: [
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue'
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
                primary: "var(--color-primary)",
                secondary: "var(--color-secondary)",
                danger: "var(--color-danger)",
                success: "var(--color-sucess)",
                info: "var(--color-info)",
                alert: "var(--color-alert)"
            },
            spacing: {
                '256': '16rem',
                '56': '3.5rem'
            },
        },
        screens: {
            'sm': '640px',
            'md': '768px',
            'lg': '1024px',
            'xl': '1280px',
            '2xl': '1536px',
        }
    },
    plugins: [],
}