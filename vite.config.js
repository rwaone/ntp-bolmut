import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import react from "@vitejs/plugin-react";

import { resolve } from "path";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/app.scss",
                "resources/js/custom/store.js",
                "resources/js/main.js",
                "resources/js/app.js",
                "resources/js/app.jsx",
            ],
            // refresh: true,
        }),
        react(),
    ],
    resolve: (name) => {
        const pages = import.meta.glob("./Pages/**/*.jsx", { eager: true });
        return pages[`./Pages/${name}.jsx`];
    },
    esbuild: {
        loader: "jsx",
        include: /resources\/js\/.*\.jsx?$/,
        exclude: [],
    },
    optimizeDeps: {
        esbuildOptions: {
            loader: {
                ".js": "jsx",
            },
        },
    },
    server: {
        hmr: {
            host: "localhost",
        },
    },
});
