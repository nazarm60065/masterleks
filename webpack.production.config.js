'use strict';

const HOST = process.env.HOST || 'http://127.0.0.1';
const webpack = require('webpack');
const UglifyJsPlugin = require('uglifyjs-webpack-plugin');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const CleanWebpackPlugin = require('clean-webpack-plugin');
const OptimizeCssAssetsPlugin = require('optimize-css-assets-webpack-plugin');
const entry = require('./entry');

process.env.NODE_ENV = 'production';

module.exports = {
    mode: 'production',
    entry: entry,
    output: {
        filename: 'local/[name]/[name].js',
        path: __dirname + '/public_html/local/assets/',
        publicPath: '/local/assets/'
    },
    watch: false,
    watchOptions: {
        aggregateTimeout: 100,
    },
    devtool: false,
    plugins: [
        new CleanWebpackPlugin(['public_html/local/assets/local']),
        new MiniCssExtractPlugin({
            filename: "local/[name]/[name].css",
            chunkFilename: "[id].css"
        }),
        new OptimizeCssAssetsPlugin({
            assetNameRegExp: /\.css$/g,
            cssProcessor: require('cssnano'),
            cssProcessorOptions: {
                discardComments: { removeAll: true }
            },
            canPrint: false
        })
    ],
    module: {
        rules: [
            {
                test: /\.(js|jsx)$/,
                exclude: /(node_modules|bower_components|public_html\/build\/)/,
                loader: "babel-loader",
                options: {
                    presets: ['env'],
                },
            },
            {
                test: /\.sass$/,
                use: [
                    MiniCssExtractPlugin.loader,
                    "css-loader",
                    {
                        loader: 'postcss-loader',
                        options: require('./postcss.config')
                    },
                    'resolve-url-loader',
                    "sass-loader"
                ]
            },
            {
                test: /\.css$/,
                use: [
                    MiniCssExtractPlugin.loader,
                    "css-loader",
                    {
                        loader: 'postcss-loader',
                        options: require('./postcss.config')
                    },
                ]
            },
            {
                test: /\.eot(\?v=\d+\.\d+\.\d+)?$/,
                loader: "url-loader",
                options: {
                    name: "local/fonts/[name].[ext]?[hash]",
                    limit: 10000
                }
            },
            {
                test: /\.(woff|woff2)$/,
                loader: "url-loader",
                options: {
                    name: "local/fonts/[name].[ext]?[hash]",
                    limit: 10000
                }
            },
            {
                test: /\.ttf(\?v=\d+\.\d+\.\d+)?$/,
                loader: "url-loader",
                options: {
                    name: "local/fonts/[name].[ext]?[hash]",
                    limit: 10000,
                    mimetype: "application/octet-stream"
                }
            },
            {
                test: /\.svg(\?v=\d+\.\d+\.\d+)?$/,
                loader: "url-loader",
                options: {
                    name: "local/fonts/[name].[ext]?[hash]",
                    limit: 10000,
                    mimetype: "image/svg+xml"
                }
            },
            {
                test: /\.gif/,
                exclude: /(node_modules|bower_components)/,
                loader: "url-loader",
                options: {
                    name: "local/fonts/[name].[ext]?[hash]",
                    limit: 10000,
                    mimetype: "image/gif"
                }
            },
            {
                test: /\.jpg/,
                exclude: /(node_modules|bower_components)/,
                loader: "url-loader"
            },
            {
                test: /\.png/,
                exclude: /(node_modules|bower_components)/,
                loader: "url-loader",
                options: {
                    name: "local/fonts/[name].[ext]?[hash]",
                    limit: 10000,
                    mimetype: "image/png"
                }
            },
            {
                test: /\.mustache$/,
                loader: 'file-loader',
                options: {
                    name: '[name].mustache?[hash]',
                    outputPath: 'mustache/'
                }
            }
        ]
    },
    resolve: {
        modules: ['node_modules', 'blocks', 'public_html/local/assets/vendor'],
        extensions: ['*', '.js']
    },
    resolveLoader: {
        modules: ['node_modules'],
        moduleExtensions: ["*-loader", "*"],
        extensions: ['*', '.js']
    },
    optimization: {
        minimizer: [
            new UglifyJsPlugin({
                test: /\.js$/i,
                parallel: true,
            })
        ]
    }
};