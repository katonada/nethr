import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/site.css',   // Main CSS file
                'resources/js/site.js',     // Main JS file
                'resources/scss/styles.scss'  // Add the SCSS entry here
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
        // preprocessorOptions: {
        //     scss: {
        //         additionalData: `@use "@scss/styles" as *;`
        //     }
        // },
        postcss: {
            plugins: [
                require('tailwindcss'),   // Add Tailwind CSS plugin
                require('autoprefixer'),  // Add Autoprefixer for vendor prefixes
            ]
        }
    },
    build: {
        outDir: 'public/build/assets', // Output path for bundled assets
        emptyOutDir: true,
    }
});
