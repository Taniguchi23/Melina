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
// mix.sass('assets/sass/style_1.scss', 'assets/css/style_1.css', {
//     implementation: require('node-sass')
// });

mix.sass('public/assets/sass/style_1.scss', 'public/assets/css/style_1.css');
