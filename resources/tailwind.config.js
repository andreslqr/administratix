module.exports = {
    plugins: [
        require("daisyui")
    ],
    daisyui: {
        styled: true,
        themes: [
            {
                admin: {
                    "primary": "#047AFF",
                    "secondary": "#463AA2",
                    "accent": "#C148AC",
                    "neutral": "#021431",
                    "base-100": "#ffffff",
                    "base-200": "#F2F7FF",
                    "base-300": "#E3E9F4",
                    "base-content": "#394E6A",
                    "info": "#93E7FB",
                    "success": "#81CFD1",
                    "warning": "#EFD7BB",
                    "error": "#E58B8B",
                },
            },
            "light",
            "dark"
        ],
        base: true,
        utils: true,
        logs: true,
        rtl: false,
        prefix: "",
        darkTheme: "dark",
    },
    content: [
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
        './vendor/administratix/administratix/src/**/*.php',
        './vendor/administratix/administratix/resources/views/**/*.blade.php',
        './vendor/administratix/administratix/resources/js/**/*.js',
        './vendor/administratix/administratix/config/administratix/**/*.php'
    ],
    theme: {
        extend: {
           
        },
        screens: {
            'sm': '640px',
            'md': '768px',
            'lg': '1024px',
            'xl': '1280px',
            '2xl': '1536px',
        }
    }
}