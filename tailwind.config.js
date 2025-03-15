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
            headerColor : '#820C0C'
            
        }
    },
  },
  plugins: [],
}

