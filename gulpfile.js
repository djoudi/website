var elixir = require('laravel-elixir');

var paths = {
    'jquery': './resources/assets/components/jquery/',
    'vue': './resources/assets/components/vue/',
    'sweetalert': './resources/assets/components/sweetalert/dist/',
    'bootstrap': './resources/assets/components/bootstrap/dist/',
    'fontawesome': './resources/assets/components/font-awesome/',
    'general': './resources/assets/components/',
    'public': './public/'
}

elixir(function(mix) {
    mix.sass([
        'app.scss'
    ], 'public/css/app.css')
        .copy(paths.bootstrap + 'fonts/**', 'public/fonts')
        .copy(paths.fontawesome + 'fonts/**', 'public/fonts')

        .styles([
            paths.bootstrap + "css/bootstrap.css",
            paths.fontawesome + "css/font-awesome.css",
            paths.sweetalert + "sweetalert.css",
            paths.general + "lity/dist/lity.css"
        ], 'public/css/vendor.css')

        .scripts([
            paths.jquery + "dist/jquery.js",
            paths.vue + "dist/vue.js",
            paths.sweetalert + "sweetalert-dev.js",
            paths.bootstrap + "js/bootstrap.js",
            paths.general + "lity/dist/lity.js"
        ], 'public/js/vendor.js')

        .version(['css/vendor.css', 'css/app.css', 'js/vendor.js']);;
});
