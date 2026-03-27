import tailwindcss from '@tailwindcss/vite';
import vue from '@vitejs/plugin-vue';
import laravel from 'laravel-vite-plugin';
import { defineConfig } from 'vite';

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
        tailwindcss(),
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js', 'resources/js/scripts.js'],
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
