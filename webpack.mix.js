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
  .js('resources/js/show.js', 'public/js')
  .sass('resources/sass/app.scss', 'public/css')
    .sourceMaps();

    const path = require('path');

module.exports = {
  entry: './src/app.js',
  output: {
    path: path.resolve(__dirname, 'dist'),
    filename: 'bundle.js'
  },
  module: {
    rules: [
      {
        test: /\.hbs$/,
        use: [{
          loader: "handlebars-loader",
          options: {
            helperDirs: path.resolve(__dirname, "./src/helpers")
          }
        }]
      }
    ]
  },
  node: {
    fs: 'empty'
  }
};
    