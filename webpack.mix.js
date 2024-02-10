const mix = require('laravel-mix');
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');

mix.js('resources/js/materialize.js', 'public/js')
   .styles('resources/css/materialize.css', 'public/css/materialize.css') // Compilar archivos CSS en lugar de Sass
   .webpackConfig({
      plugins: [
         new BrowserSyncPlugin({
            proxy: 'smart-board.test',
            files: [
               'app/**/*.php',
               'resources/views/**/*.php',
               'public/**/*.(js|css)'
            ],
            open: false,
            notify: false
         })
      ]
   });
