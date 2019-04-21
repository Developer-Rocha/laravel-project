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
   .js('resources/js/functions.js', 'public/js')
   .js('resources/js/angular/app.js', 'public/js/angular')
   .js('resources/js/angular/controllers/taskController.js', 'public/js/angular/controllers')
   .js('resources/js/angular/controllers/menuController.js', 'public/js/angular/controllers')
   .sass('resources/sass/main.scss', 'public/css');

mix.copy('resources/images', 'public/images');
