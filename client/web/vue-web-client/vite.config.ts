import { fileURLToPath, URL } from "node:url";

import { defineConfig } from "vite";
import vue from "@vitejs/plugin-vue";
import eslint from 'vite-plugin-eslint'


// https://vitejs.dev/config/
export default defineConfig({
  plugins: [
    vue(),
    eslint({
      emitWarning: true,
      failOnWarning: false,
      fix: true,
    })
  ],
  resolve: {
    alias: {
      "@": fileURLToPath(new URL("./src", import.meta.url)),
    },
  },
});
