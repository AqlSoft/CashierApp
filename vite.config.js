import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/js/bootstrap.js'],
            refresh: true,
        }),
    ],
    server: {
        host: 'www.cashier.local',
        hmr: { host: 'www.cashier.local' },
        port: 5173,
        strictPort: true,
        cors: true,
    },
});
