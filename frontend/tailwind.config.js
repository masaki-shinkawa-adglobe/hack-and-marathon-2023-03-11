/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./components/**/*.{js,vue,ts}",
    "./layouts/**/*.vue",
    "./pages/**/*.vue",
    "./plugins/**/*.{js,ts}",
    "./nuxt.config.{js,ts}",
    "./app.vue",
  ],
  theme: {
    extend: {
      colors: {
        main: '#4B4B4B',
        sub: '#D9D9D9',
        accent: '#25968C',
        base: '#F8F8F8',
      }
    },
  },
  plugins: [],
}
