import {defineConfig} from 'vite';
import laravel from 'laravel-vite-plugin';
import react from '@vitejs/plugin-react';

export default defineConfig({
  plugins: [
    laravel({
      input: 'resources/js/app.tsx',
      ssr: 'resources/js/ssr.tsx',
      refresh: true,
    }),
    react(),
  ],
  resolve: {
    alias: {
      '@': '/resources/js',
      '@images': '/resources/images'
    }
  },
  ssr: {
    noExternal: ['@inertiajs/server'],
  },
  server: {
    hmr: {
      host: 'localhost',
      protocol: 'ws'
    }
  }
});
