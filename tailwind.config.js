/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ['./*.php', './inc/**/*.php', './assets/js/**/*.js'],
  theme: {
    extend: {
      colors: {
        ink:   { DEFAULT: '#0A0A0C', 2: '#111116', 3: '#17171D', 4: '#212129', 5: '#2E2E38' },
        brand: { DEFAULT: '#E11225', dark: '#A60D1B', light: '#FF3B4D' },
        bone:  { DEFAULT: '#F3F1EB', 2: '#E6E3DA' },
        chalk: '#F7F6F3'
      },
      fontFamily: {
        display: ['Archivo', 'system-ui', 'sans-serif'],
        sans: ['Inter', 'system-ui', 'sans-serif'],
        mono: ['"JetBrains Mono"', 'ui-monospace', 'monospace']
      },
      fontSize: {
        '2xs': ['0.68rem', { lineHeight: '1.3' }]
      },
      letterSpacing: {
        tightest: '-0.045em',
        label: '0.2em'
      },
      maxWidth: {
        site: '1920px'
      },
      screens: {
        xs: '420px'
      },
      transitionTimingFunction: {
        out: 'cubic-bezier(.16,1,.3,1)',
        smooth: 'cubic-bezier(.22,.61,.36,1)'
      },
      animation: {
        marquee: 'marquee 30s linear infinite',
        'slow-zoom': 'slowZoom 24s cubic-bezier(.4,0,.2,1) infinite alternate',
        sweep: 'sweep 2.4s cubic-bezier(.22,.61,.36,1) infinite'
      },
      keyframes: {
        marquee: { to: { transform: 'translateX(-50%)' } },
        slowZoom: { from: { transform: 'scale(1.04)' }, to: { transform: 'scale(1.16)' } },
        sweep: { '0%': { transform: 'translateX(-100%)' }, '60%,100%': { transform: 'translateX(100%)' } }
      }
    }
  },
  plugins: []
};
