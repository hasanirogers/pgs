const { resolve, join } = require('path');
const webpack = require('webpack');
const StyleLintPlugin = require('stylelint-webpack-plugin');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');


// directories
// -----------

const themeDirectory = resolve('wp-content/themes/pgs');


// configuration options
// ---------------------

const pluginConfigs = {
  styleLint: {
    context: './src',
    failOnError: true
  },

  miniCSSExtract: {
    filename: "bundle.css" // this is what actually get served after sass is compiled
  },

  browserSync: {
    files: '**/*.php', // we have to tell browserSync to reload when we change php files
    proxy: 'http://pgsinc.local' // this address your WordPress site runs on locally
  }
}

const loaderConfigs = {
  babel: [{
    loader: 'babel-loader',
  }],

  // order is important here
  // execute bottom first to top
  miniCSSExtract: [
    MiniCssExtractPlugin.loader,
    {
      loader: "css-loader",
      options: {sourceMap: true}
    },
    {
      loader: "postcss-loader",
      options: {sourceMap: true}
    },
    {
      loader: "sass-loader",
      options: {sourceMap: true}
    }
  ]
}


// main export
// -----------

module.exports = {
  context: __dirname,

  entry: [
    // 'regenerator-runtime/runtime', // is needed for async/await
    `${themeDirectory}/src/javascript/index.js`,
    `${themeDirectory}/src/styles/app.scss`
  ],

  output: {
    path: join(__dirname, 'wp-content/themes/pgs/bundles'),
    filename: 'bundle.js',
  },

  module: {
    rules: [
      {
        test: /\.js$/,
        use: loaderConfigs.babel
      },

      {
        test: /\.scss$/,
        exclude: /node_modules/,
        use: loaderConfigs.miniCSSExtract
      }
    ]
  },

  devtool: 'cheap-module-source-map',

  plugins: [
    new StyleLintPlugin(pluginConfigs.styleLint),
    new MiniCssExtractPlugin(pluginConfigs.miniCSSExtract),
    new webpack.optimize.LimitChunkCountPlugin({maxChunks: 1}), // we only want to produce 1 bundle.js file
    new BrowserSyncPlugin(pluginConfigs.browserSync, { reload: false })
  ]
};
