import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import fs from 'fs';


export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/admin/sass/app.scss',
                ...fs.readdirSync('resources/admin/js/plugins').map((file) => `resources/admin/js/plugins/${file}`),
                
                'resources/admin/js/app.js',
                ...fs.readdirSync('resources/admin/sass/plugins').map((file) => `resources/admin/sass/plugins/${file}`)
            ],
            refresh: true
        })
    ]
});
