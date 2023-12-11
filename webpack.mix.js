const mix = require("laravel-mix");

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

mix.js("resources/js/laravel-echo-server.js", "public/js/laravel-server")
    .sass("resources/sass/admin/app.scss", "public/admin/app/css")
    // .sass("resources/sass/admin/_variables.scss", "public/admin/app/css")
    // .sass("resources/sass/admin/_responsive.scss", "public/admin/app/css")
    // .sass("resources/sass/admin/_layout.scss", "public/admin/app/css")
    // .sass("resources/sass/admin/_naviteam.scss", "public/admin/app/css")
    .sass("resources/sass/client/app.scss", "public/client/app/css")
    // .sass("resources/sass/client/_variables.scss", "public/client/app/css")
    // .sass("resources/sass/client/_responsive.scss", "public/client/app/css")
    // .sass("resources/sass/client/_layout.scss", "public/client/app/css")
    // .sass("resources/sass/client/_naviteam.scss", "public/client/app/css")
    // .sass("resources/sass/client/_component.scss", "public/client/app/css")
    // .sass("resources/sass/client/_footer.scss", "public/client/app/css");
