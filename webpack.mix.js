let mix = require('laravel-mix')

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

mix.copy('resources/img/', 'public/img/')
    .sass('resources/sass/style.default.scss', 'public/css/app.css')
    .js('resources/js/app.js', 'public/js')

if (mix.inProduction()) {
    mix.version()
}

const path = require('path')

mix.webpackConfig({
    resolve: {
        alias: {
            '@': path.resolve('resources/js'),
            '@aptoclick': path.resolve('app/Modules/Aptoclick/Resources/Javascript'),
            '@dashboard': path.resolve('app/Modules/Dashboard/Resources/Javascript')
        }
    }
})
