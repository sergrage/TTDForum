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

mix.scripts(['resources/js/jquery.min.js','resources/js/bootstrap.bundle.min.js','resources/js/app.js',], 'public/js/app.js')
    .sass('resources/sass/app.scss', 'public/css/app.css').version();
