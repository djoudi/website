var elixir = require('laravel-elixir');

var paths = {
    'jquery': './resources/assets/components/jquery/',
    'vue': './resources/assets/components/vue/',
    'sweetalert': './resources/assets/components/sweetalert/dist/',
    'bootstrap': './resources/assets/components/bootstrap/dist/',
    'fontawesome': './resources/assets/components/font-awesome/',
    'general': './resources/assets/',
    'public': './public/'
}

elixir(function(mix) {
    mix.sass([
        'app.scss'
    ], 'public/css/app.css')
        .copy(paths.bootstrap + 'fonts/**', 'public/fonts')
        .copy(paths.fontawesome + 'fonts/**', 'public/fonts')
        .copy(paths.bootstrap + 'fonts/**', 'public/build/fonts')
        .copy(paths.fontawesome + 'fonts/**', 'public/build/fonts')

        .styles([
            paths.bootstrap + "css/bootstrap.css",
            paths.fontawesome + "css/font-awesome.css",
            paths.sweetalert + "sweetalert.css",
            paths.general + "components/lity/dist/lity.css",
            paths.general + "components/At.js/dist/css/jquery.atwho.css",
            paths.general + "components/angular-google-places-autocomplete/src/autocomplete.css",
        ], 'public/css/vendor.css')

        .scripts([
            paths.jquery + "dist/jquery.js",
            paths.vue + "dist/vue.js",
            paths.sweetalert + "sweetalert-dev.js",
            paths.bootstrap + "js/bootstrap.js",
            paths.general + "components/lity/dist/lity.js",
            paths.general + "components/jquery-textcomplete/dist/jquery.textcomplete.js",
            paths.general + "components/Caret.js/dist/jquery.caret.js",
            paths.general + "components/At.js/dist/js/jquery.atwho.js",
            paths.general + "components/noty/js/noty/packaged/jquery.noty.packaged.js",
            paths.general + "components/typeahead.js/dist/typeahead.jquery.js",
            paths.general + "components/angular/angular.js",
            paths.general + "components/algoliasearch/dist/algoliasearch.js",
            paths.general + "components/algoliasearch-helper/dist/algoliasearch.helper.js",
            paths.general + "components/angular-auto-validate/dist/jcs-auto-validate.js",
            paths.general + "components/angular-google-places-autocomplete/src/autocomplete.js",
            paths.general + "components/hogan.js/web/builds/3.0.2/hogan-3.0.2.common.js",
        ], 'public/js/vendor.js')

        .scripts([
            paths.general + "js/app.js"
        ], 'public/js/app.js')

        .scripts([
            paths.general + "js/lists.js"
        ], 'public/js/lists.js')

        .scripts([
            paths.general + "js/meetups.js"
        ], 'public/js/meetups.js')

        .scripts([
            paths.general + "js/jobs.js"
        ], 'public/js/jobs.js')

        .scripts([
            paths.general + "js/projects.js"
        ], 'public/js/projects.js')

        .version(['css/vendor.css', 'css/app.css', 'js/vendor.js', 'js/app.js', 'js/lists.js', 'js/meetups.js', 'js/jobs.js', 'js/projects.js']);;
});
