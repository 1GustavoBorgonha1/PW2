const mix = require('laravel-mix');

/* CSS */
mix.postCss('resources/css/campanha.css', 'public/css', [
    require('postcss-import'),
    require('tailwindcss'), // Remova esta linha se não usar Tailwind
]);
