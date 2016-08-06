require('es6-promise').polyfill();
var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.copy(
        'vendor/bower_components/bootstrap/dist/js/bootstrap.min.js',
        'public/js/vendor/bootstrap.min.js'
    )
    .copy(
        'vendor/bower_components/bootstrap/dist/css/bootstrap.min.css',
        'public/css/vendor/bootstrap.min.css'
    )
   .copy(
        'vendor/bower_components/jquery/dist/jquery.min.js',
        'public/js/vendor/jquery.min.js'
    )
    .copy(
        'vendor/bower_components/fontawesome/css/font-awesome.css',
        'public/css/vendor/fontawesome.css'
    )
    .copy(
        'vendor/bower_components/fontawesome/fonts/*.{otf,ttf,woff,eot,svg,woff2}',
        'public/build/fonts'
    );

    mix.sass('app.scss');

    mix.styles([
            'vendor/fontawesome.css',
            'vendor/bootstrap.min.css',
            'app.css'
        ], 'public/css/all.css', 'public/css')
        .scripts([
            'vendor/jquery.min.js',
            'vendor/bootstrap.min.js',
        ], 'public/js/all.js', 'public/js');

        mix.version([
            'public/css/all.css',
            'public/js/all.js',
        ]);
});
