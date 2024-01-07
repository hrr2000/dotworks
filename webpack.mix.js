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
    .js('resources/js/user_panel/profile/index.js', 'public/js/user_panel/profile.js')
    .js('resources/js/user_panel/services/index.js', 'public/js/user_panel/services.js')
    .js('resources/js/user_panel/orders/index.js', 'public/js/user_panel/orders.js')
    .js('resources/js/user_panel/wallet/index.js', 'public/js/user_panel/wallet.js')
    .js('resources/js/user_panel/messages/index.js', 'public/js/user_panel/messages.js')
    .sass('resources/sass/app.scss', 'public/css')
    .postCss("resources/css/app.css", "public/tailwindcss", [
        require("tailwindcss"),
    ]);
mix.minify(['public/js/app.js', 'public/css/app.css']);
