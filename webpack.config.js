const webpack = require('webpack');
const path = require('path');
const HtmlWebpackPlugin = require('html-webpack-plugin');
const CopyWebpackPlugin = require('copy-webpack-plugin');

module.exports = {
    entry: './src/index.js',
    output: {
        filename: 'bundle.js',
        path: path.resolve(__dirname, 'build')
    },
    module: {
        rules: [
            {
                test: /\.js$/,
                exclude: /node_modules/,
                loader: 'babel-loader'
            },
            {
                test: /\.(png|jpg|gif)$/,
                use: [
                    {
                        loader: 'file-loader',
                        options: {
                            name: '[name].[ext]',
                            outputPath: 'images/',
                            publicPath: ''
                        }
                    }
                ]
            },
            {
                test: /\.html$/,
                use: [ { loader: "html-loader" } ]
            }
        ]
    },
    plugins: [
        new HtmlWebpackPlugin({
            template: path.resolve(__dirname, 'src', 'index.html')
        }),
        // copy PDF files over
        new CopyWebpackPlugin([{from: 'src/files/*', to: 'files/[name].[ext]'}])
        // new webpack.optimize.UglifyJsPlugin({
        //     compress: {warnings: false}
        // })
    ]
}
