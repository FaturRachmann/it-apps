import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        tailwindcss(),
    ],
    server: {
        host: '127.0.0.1',
        port: 5173,
        strictPort: false,
        hmr: {
            host: 'localhost',
            port: 5173,
            protocol: 'ws',
        },
        watch: {
            ignored: ['**/storage/framework/views/**', '**/node_modules/**', '**/.git/**'],
            usePolling: false,
        },
        middlewareMode: false,
    },
    build: {
        target: 'esnext',
        minify: 'terser',
        rollupOptions: {
            output: {
                manualChunks: {
                    vendor: ['axios'],
                },
            },
        },
    },
    optimize: {
        esbuild: {
            drop: ['console', 'debugger'],
        },
    },
});

