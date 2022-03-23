module.exports = {
  content: [
      './resources/views/*.blade.php',
      './resources/views/layouts/*.blade.php',
      './resources/views/components/*.blade.php',
      './resources/views/components/**/*.blade.php',
      './resources/views/livewire/*.blade.php',
  ],
  theme: {
    extend: {},
    spinner: (theme) => ({
        default: {
            color:'#dae1e7',
            size:'1em',
            border:'2px',
            speed:'500ms',
        },
        // md: {
      //   color: theme('colors.red.500', 'red'),
      //   size: '2em',
      //   border: '2px',
      //   speed: '500ms',
    //     },
    })
  },
  variants: { // all the following default to ['responsive']
    spinner: ['responsive'],
  },
  plugins: [
      require('tailwindcss-spinner')(),
  ],
}
