import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/css/admin/category/index.css',
                'resources/css/admin/user/create-user.css' // <-- PASTIKAN BARIS INI ADA YA!
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
});