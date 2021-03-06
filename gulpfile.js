//
//var elixir = require('laravel-elixir');
//
///*
// |--------------------------------------------------------------------------
// | Elixir Asset Management
// |--------------------------------------------------------------------------
// |
// | Elixir provides a clean, fluent API for defining some basic Gulp tasks
// | for your Laravel application. By default, we are compiling the Sass
// | file for our application, as well as publishing vendor resources.
// |
// */
//
//elixir(function(mix) {
//    mix.sass('app.scss');
//
//    // Javascript
//    var jQuery = '../../../node_modules/jquery/dist/jquery.js';
//    var foundationJsFolder = '../../../node_modules/foundation-sites/js/';
//});

var elixir = require('laravel-elixir');

elixir(function(mix) {

    // Sass
    var options = {
        includePaths: [
            'node_modules/foundation-sites/scss',
            'node_modules/motion-ui/src'
        ]
    };

    mix.sass('app.scss', null, options);

    // Javascript
    var jQuery = '../../../node_modules/jquery/dist/jquery.js';
    var sweetAlert = '../../../node_modules/sweetalert/dist/sweetalert-dev.js';
    var dropZone = '../../../node_modules/dropzone/dist/dropzone.js';
    var lity = '../../../node_modules/lity/dist/lity.js';
    //var foundationJsFolder = '../../../node_modules/foundation-sites/js/';
    var foundationJs = '../../../node_modules/foundation-sites/dist/foundation.min.js';

    mix.scripts([
        jQuery,
        foundationJs,
        //foundationJsFolder + 'foundation.core.js',
        // Include any needed components here. The following are just examples.
        //foundationJsFolder + 'foundation.util.mediaquery.js',
        //foundationJsFolder + 'foundation.util.keyboard.js',
        //foundationJsFolder + 'foundation.util.timerAndImageLoader.js',
        //foundationJsFolder + 'foundation.tabs.js',
        //foundationJsFolder + 'foundation.offcanvas.js',

        sweetAlert,
        dropZone,
        lity,

        // This file initializes foundation
        'start_foundation.js'
    ]);


});