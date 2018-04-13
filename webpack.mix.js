let mix = require('laravel-mix');
var dist = 'public';

if (process.env.NODE_ENV === 'local') {
  dist += '/.build';
  mix.setPublicPath(dist);
}

mix.js('resources/assets/js/app.js', dist + '/js')
  .extract(['vue', 'jquery', 'bootstrap', 'axios', 'lodash', 'popper.js']);
// mix.sass('resources/assets/sass/vendor.scss', dist + '/css');
mix.sass('resources/assets/sass/app.scss', dist + '/css');
mix.version();

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

// mix.js('resources/assets/js/app.js', 'public/js')
//    .sass('resources/assets/sass/app.scss', 'public/css');
