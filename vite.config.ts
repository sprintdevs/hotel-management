import { defineConfig, loadEnv } from 'vite'
import laravel from 'laravel-vite-plugin'
import vue from '@vitejs/plugin-vue'

export default ({mode}) => {
  const env = loadEnv(mode, process.cwd(), '')

  return defineConfig({
    plugins: [
      laravel({
        input: ['resources/css/app.css', 'resources/js/app.ts'],
        refresh: true
      }),
      vue({
        template: {
          transformAssetUrls: {
              includeAbsolute: false,
          },
        },
      })
    ],
    server: {
      port: parseInt(env.VITE_PORT) || 5173,
      host: '0.0.0.0',
      hmr: {
        host: 'localhost'
      }
    }
  })
}