import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue2';

export default defineConfig(({command}) => ({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
                'resources/js/scripts.js',
            ],
            refresh: true,
            valetTls: 'onramp.test',
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
            vue: command === 'serve'
                ? 'node_modules/vue/dist/vue.esm.browser.js'
                : 'node_modules/vue/dist/vue.esm.browser.min.js',
        },
    },
}));
