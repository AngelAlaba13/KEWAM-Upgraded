/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
        colors: {
            'table': '',
            'navigation': '',
            headerColor : '#A61010'
            
        }
    },
  },
  plugins: [],
}

