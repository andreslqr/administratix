import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/admin/sass/app.scss',
                'resources/admin/js/app.js'
            ],
            refresh: true
        })
    ]
});
