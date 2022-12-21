'use strict';

const HOST = process.env.HOST || 'http://127.0.0.1';
const webpack = require('webpack');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const CleanWebpackPlugin = require('clean-webpack-plugin');
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');
const WriteFilePlugin = require('write-file-webpack-plugin');
const CopyWebpackPlugin = require('copy-webpack-plugin');
const entry = require('./entry');

process.env.NODE_ENV = 'development';

module.exports = {
    mode: 'development',
    entry: entry,
    output: {
        filename: 'local/[name]/[name].js',
        path: __dirname + '/public_html/local/assets/',
        publicPath: '/local/assets/'
    },
    watch: true,
    watchOptions: {
        aggregateTimeout: 100,
    },
    devtool: "inline-cheap-module-source-map",
    plugins: [
        new CleanWebpackPlugin(['public_html/local/assets/local']),
        new MiniCssExtractPlugin({
            filename: "local/[name]/[name].css",
            chunkFilename: "[id].css"
        }),
        new BrowserSyncPlugin(
            {
                host: 'localhost',
                port: 3000,
                proxy: 'http://localhost:3100',
                startPath: '/verstka/index.php',
                ignore: ['bitrix', 'vendor'],
                open: true,
                files: [
                    {
                        match: [
                            '**/*.php'
                        ],
                        options: {
                            ignored: [
                                'public_html/bitrix/**/*',
                                'node_modules/**/*',
                                'vendor/**/*'
                            ]
                        }
                    }
                ]

            },
            {
                reload: false
            }
        ),
        new CopyWebpackPlugin([
            {
                from: 'blocks',
                to: 'mustache/[name].[ext]',
                test: /\.mustache$/
            }
        ]),
        new WriteFilePlugin({
            test: /\.mustache$/,
            useHashIndex: true
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
                    'style-loader',
                    "css-loader",
                    {
                        loader: 'postcss-loader',
                        options: require('./postcss.config')
                    },
                    'resolve-url-loader',
                    "sass-loader"
                ],
            },
            {
                test: /\.css$/,
                use: [
                    'style-loader',
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
    devServer: {
        contentBase: false,
        hot: true,
        port: 3100,
        open: false,
        host: "localhost",
        openPage: 'verstka/index.php',
        proxy: {
            "**/*": {
                target: HOST, // target host
                secure: false,
                changeOrigin: true
            }
        }
    },
};