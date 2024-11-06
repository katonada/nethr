import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/site.css', // main CSS entry
                'resources/js/site.js',   // main JS entry

                // Control Panel assets (if needed)
                // 'resources/css/cp.css',
                // 'resources/js/cp.js',
            ],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            '@scss': path.resolve(__dirname, './assets/scss'),
        }
    },
    css: {
        preprocessorOptions: {
            scss: {
                additionalData: `@use "@scss/_styles" as *;`
            }
        },
        postcss: {
            plugins: [
                require('tailwindcss'),   // Add Tailwind CSS plugin
                require('autoprefixer'),  // Add Autoprefixer for vendor prefixes
            ]
        }
    },
    build: {
        outDir: 'public/assets', // Output path for bundled assets
        emptyOutDir: true,
    }
});
