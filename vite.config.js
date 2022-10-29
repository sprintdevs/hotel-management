import { defineConfig, loadEnv } from 'vite'
import laravel from 'laravel-vite-plugin'
import vue from '@vitejs/plugin-vue'
import path from 'path'

export default defineConfig(({_, mode}) => {
  const env = loadEnv(mode, process.cwd(), '')

  return {
    plugins: [
      laravel({
        input: ['resources/css/app.css', 'resources/js/app.ts'],
        refresh: true
      }),
      vue()
    ],
    server: {
      port: env.VITE_PORT || 5173,
      host: '0.0.0.0',
      hmr: {
        host: 'localhost'
      }
    },
    resolve: {
      alias: {
        '@/': `${path.resolve(__dirname, 'resources/js')}/`
      },
  },
  }
})
