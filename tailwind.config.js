import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    './storage/framework/views/*.php',
    './resources/views/**/*.blade.php',
    './resources/js/**/*.vue',
  ],
  theme: {
    extend: {
      fontFamily: {
        sans: ['Montserrat', ...defaultTheme.fontFamily.sans],
      },
      container: {
        center: true,
        screens: {
          xs: '350px',
          sm: '540px',
          md: '720px',
          lg: '960px',
          xl: '1240px',
        },
      },
      colors: {
        'primary': '#000000',
        'secondary': '#ff9015',
        'secondary-muted': '#ffaf15',
        'blue-light': '#a8c3dc'
      }
    },
  },
  plugins: [forms],
}

