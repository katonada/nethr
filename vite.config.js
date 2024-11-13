import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/site.css',
                'resources/js/site.js',
                'resources/scss/main.scss'
            ],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            '@scss': path.resolve(__dirname, './resources/scss'),
        }
    },
    css: {
        preprocessorOptions: {
            scss: {
                additionalData: `
                    @use "@scss/_variables.scss" as *;
                    @use "@scss/_mixins.scss" as *;
                `
            }
        },
        postcss: {
            plugins: [
                require('tailwindcss'),
                require('autoprefixer'),
            ]
        }
    },
    build: {
        outDir: 'public/build/',
        emptyOutDir: true,
    }
});
