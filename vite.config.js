import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/site.css',
                'resources/js/site.js',

                // Control Panel assets
                // https://statamic.dev/extending/control-panel#adding-css-and-js-assets
                // 'resources/css/cp.css',
                // 'resources/js/cp.js',
            ],
            refresh: true,
        }),
        // vue2(),
    ],
    resolve: {
        alias: {
            '@scss': path.resolve(__dirname, './assets/scss'),
        }
    },
    css: {
        preprocessorOptions: {
            scss: {
                additionalData: `@use "@scss/base/index" as *;`
            }
        }
    },
    build: {
        outDir: 'public/assets', // Ensuring assets are bundled in Statamic’s public folder
        emptyOutDir: true,
    }
});
