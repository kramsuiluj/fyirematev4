/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
  ],
  theme: {
    extend: {
        fontFamily: {
            silkscreen: ['Silkscreen', 'cursive'],
            kanit: ['Kanit', 'sans-serif'],
            varela: ['Varela Round', 'sans-serif'],
            montserrat: ['Montserrat', 'sans-serif']
        }
    },
  },
  plugins: [],
}
