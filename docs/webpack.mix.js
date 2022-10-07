const mix = require('laravel-mix');


 mix.js('resources/js/app.js', 'wiki/assets/js')
    .sass('resources/sass/app.scss', 'wiki/assets/css');