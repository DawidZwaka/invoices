// https://tailwindcss.com/docs/configuration
module.exports = {
  content: [
    "./index.php", 
    "./app/**/*.php", 
    "./resources/**/*.{php,vue,js}",
    "./node_modules/flowbite/**/*.js"
    ],
  theme: {
    extend: {
      colors: {}, // Extend Tailwind's default colors
    },
  },
  plugins: [
    require('flowbite/plugin')
  ],
};
