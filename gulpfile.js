const elixir = require('laravel-elixir')

require('laravel-elixir-vue-2')

const cssIncludePaths = ['node_modules/foundation-sites/scss', 'node_modules/motion-ui/src/']

elixir((mix) => {
    mix
        .sass([
            'app.scss'
        ], 'public/dist/css/main.css', null, {
            includePaths: cssIncludePaths
        })
        .styles([
            'public/dist/css/main.css',
        ], 'public/dist/css/app.css', './')
        .scripts([
            'node_modules/js-cookie/src/js.cookie.js',
            'node_modules/foundation-sites/dist/plugins/foundation.core.js',
            'node_modules/foundation-sites/dist/plugins/foundation.util.*.js',
            'node_modules/foundation-sites/dist/plugins/foundation.accordion.js',
            'node_modules/foundation-sites/dist/plugins/foundation.accordionMenu.js',
            'node_modules/foundation-sites/dist/plugins/foundation.dropdown.js',
            'node_modules/foundation-sites/dist/plugins/foundation.dropdownMenu.js',
            'node_modules/foundation-sites/dist/plugins/foundation.tabs.js',
            'node_modules/foundation-sites/dist/plugins/foundation.tooltip.js',
        ], 'public/dist/js/vendor-scripts.js', './')
        .combine([
            'node_modules/jquery/dist/jquery.min.js',
            'public/dist/js/vendor-scripts.js',
        ], 'public/dist/js/vendor.js', './')
         .webpack('app.js', 'public/dist/js/app.js')
         .version([
              'public/dist/css/app.css',
              'public/dist/js/app.js',
              'public/dist/js/vendor.js'
          ])
         .copy('node_modules/jquery/dist/jquery.min.map', 'public/build/dist/js/jquery.min.map');
})