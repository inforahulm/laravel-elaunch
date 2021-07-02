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
    .js('resources/js/employee/employee.js',
    'public/js/employee/employee.js')
    .js('resources/js/blog/blog.js','public/js/blog/blog.js')
    .js('resources/js/post/post.js','public/js/post/post.js')
    .js('resources/js/book/book.js','public/js/book/book.js')
    .sass('resources/sass/app.scss', 'public/css')
    .sourceMaps();
