/** @type {import('tailwindcss').Config} */
export default {
    content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
    ],
    theme: {
      extend: { 
        boxShadow: {
          'shadow-2xl': '100px 0 0px rgba(0, 0, 0, 1)', 
        },},
        fontFamily: {
          raleway: ['Raleway', 'sans-serif'],
          bodoniModa: ['Bodoni Moda', 'serif'],
        },
    },
    plugins: [],
  }
  
  