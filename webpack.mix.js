let mix = require('laravel-mix');

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
mix.js('resources/assets/js/app.js', 'public/js/all.js')
    .styles([
        'bower_components/summernote/dist/summernote.css',
    ], 'public/css/all.css')
    .js('bower_components/summernote/dist/summernote.js', 'public/js/all.js')
    .js('resources/assets/js/initEditor.js','public/js/all.js')
   .sass('resources/assets/sass/app.scss', 'public/css')
    .copy('bower_components/summernote/dist/font', 'public/css/font')
    .version();
