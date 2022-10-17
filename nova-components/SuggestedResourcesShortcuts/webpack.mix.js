let mix = require('laravel-mix')

import './nova.mix'

mix
  .setPublicPath('dist')
  .js('resources/js/card.js', 'js')
  .vue({ version: 3 })
  .css('resources/css/card.css', 'css')
  .nova('tightenco/suggested-resources-shortcuts')
