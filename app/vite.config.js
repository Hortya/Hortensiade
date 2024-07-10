import { defineConfig } from 'vite';
import sass from 'vite-plugin-sass';
 
export default defineConfig({
    build: {
        manifest: true,
        outDir: 'build',
        rollupOptions: {
          input: '/js/main.js', // par exemple: 'src/main.js'
        },
    },
    plugins:  [sass()],
    
})