import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig(({ command }) => ({
    server: {
        watch: {
            ignored: ['**/storage/framework/views/**'],
        },
        cors: true,
        hmr: {
            host: 'onramp.test',
        },
    },
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/scripts.js',
            ],
            refresh: true,
            detectTls: 'onramp.test',
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
    resolve: {
        alias: {
            vue:
                command === 'serve'
                    ? 'vue/dist/vue.esm-browser.js'
                    : 'vue/dist/vue.esm-browser.prod.js',
        },
    },
}));
