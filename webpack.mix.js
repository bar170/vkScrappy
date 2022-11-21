const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        //
    ]);

mix.styles([
    'resources/css/welcome.css',
// Другие стили
], 'public/css/welcome.css');

mix.styles([
    'resources/css/sb-admin-2.css',
// Другие стили
], 'public/css/sb-admin-2.css');

