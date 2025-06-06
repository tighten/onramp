import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import vue from "@vitejs/plugin-vue2";
import { resolve } from "path";

export default defineConfig(({ command }) => ({
    plugins: [
        laravel({
            input: [
                "resources/sass/app.scss",
                "resources/js/app.js",
                "resources/js/scripts.js",
            ],
            refresh: true,
            detectTls: "onramp.test",
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
                command === "serve"
                    ? resolve(
                          __dirname,
                          "node_modules/vue/dist/vue.esm.browser.js"
                      )
                    : resolve(
                          __dirname,
                          "node_modules/vue/dist/vue.esm.browser.min.js"
                      ),
        },
    },
}));
