import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/js/app.js',
                'resources/js/script.js',
                'resources/js/main.js',
                'resources/scss/style.scss'
            ],
            refresh: true,
        }),
    ],
});
