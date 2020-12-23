const mix = require('laravel-mix')
const fs = require('fs')
const path = require('path')
const webpack = require('webpack')

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

/**
 * webpack 配置
 */

mix.webpackConfig({
  output: {
    // 依据该路径进行编译以及异步加载
    publicPath: '/',
    // 注意开发期间不加 hash，以免自动刷新失败
    chunkFilename: `dist/js/chunk[name].${mix.inProduction() ? '[chunkhash].' : ''}js`
  },

  plugins: []
})

mix.setResourceRoot('/')

mix.setPublicPath(path.normalize('public'))
  .js('resources/backend/js/app.js', 'public/dist/js/backend')
  .sass('resources/backend/sass/app.scss', 'public/dist/css/backend')
  .version()
  .disableNotifications()


mix.browserSync({
  proxy: 'tp.localhost',
  files: [
    'public/dist/js/*.js',
    'public/dist/css/*.css',
  ]
})
