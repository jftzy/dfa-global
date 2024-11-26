import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
const ASSET_URL = process.env.ASSET_URL || '';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
            base: `${ASSET_URL}/`,
        }),
    ],
    server: {
    host: 'localhost',
    port: 8000,
    hmr: {
            host: '172.16.11.70',
        },
  }
});
