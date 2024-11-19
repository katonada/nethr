import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue2 from '@vitejs/plugin-vue2';
import path from 'path';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/site.css', // Frontend CSS
                'resources/js/site.js',  // Frontend JS
                'resources/js/cp.js',    // Control Panel JS
                'resources/css/cp.css',  // Control Panel CSS
            ],
            refresh: true,
        }),
        vue2(), // Vue 2 plugin
    ],
    resolve: {
        alias: {
            '@scss': path.resolve(__dirname, './resources/scss'),
        },
    },
    css: {
        preprocessorOptions: {
            scss: {
                additionalData: `
                    @use "@scss/_variables.scss" as *;
                    @use "@scss/_mixins.scss" as *;
                `,
            },
        },
    },
    build: {
        outDir: 'public/build/',
        emptyOutDir: true,
        rollupOptions: {
            input: {
                site: 'resources/js/site.js',
                cp: 'resources/js/cp.js', // Include CP.js for Control Panel
                'cp-style': 'resources/css/cp.css', // Include CP.css
            },
        },
    },
    server: {
        hmr: {
            host: 'localhost', // Change if using a custom domain
        },
    },
});
