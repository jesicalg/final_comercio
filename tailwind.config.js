/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./storage/framework/views/*.php",
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
        gridTemplateRows:{
            app:'64px 1fr 150px',
        },
        backgroundImage: {
            'circle-2': "url('/imgs/circle-2.png')",
        },
        colors: {
            'green-neon': '#028d7f',
        },
        borderColor:{
          'green-neon':'#028d7f',
        }
    },
  },
plugins: [],
}