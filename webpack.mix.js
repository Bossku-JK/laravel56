const { mix } = require('laravel-mix');


mix.autoload({
    quill: ['window.Quill']
})

//https://github.com/kensnyder/quill-image-resize-module/issues/7#issuecomment-410870526 แก้ imports
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

mix.js('resources/assets/js/app.js', 'public/js')
.js('resources/assets/js/admin/admin.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css')
   .sass('resources/assets/sass/admin/admin.scss', 'public/css');
