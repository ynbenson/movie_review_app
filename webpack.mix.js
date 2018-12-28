const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
   .js('node_modules/@glidejs/glide/dist/glide.min.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css')
   .sass('node_modules/@glidejs/glide/src/assets/sass/glide.core.scss', 'public/css')
   .sass('node_modules/@glidejs/glide/src/assets/sass/glide.theme.scss', 'public/css');