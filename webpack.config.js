const webpack = require('webpack');
const path = require('path');
const HtmlWebpackPlugin = require('html-webpack-plugin');
const CopyWebpackPlugin = require('copy-webpack-plugin');
const ExtractTextPlugin = require("extract-text-webpack-plugin");
const HtmlWebpackIncludeAssetsPlugin = require('html-webpack-include-assets-plugin');

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
				test: /\.css$/,
				use: ExtractTextPlugin.extract({
					fallback: {
						loader: 'style-loader',
						options: {
							minify: true
						}
					},
					use: [
						{
							loader: 'css-loader',
							options: {
								minify: true
							}
						}
					]
				})
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
				use: [ {
					loader: "html-loader",
					options: {
						minify: true
					}
				} ]
			}
		]
	},
	plugins: [
		// copy PDF files over
		new CopyWebpackPlugin([
			{from: 'src/files/*', to: 'files/[name].[ext]'},
			{from: 'src/styles.css', to: 'styles.css'}
		]),
		new HtmlWebpackPlugin({
			template: path.resolve(__dirname, 'src', 'index.html')
		}),
		new HtmlWebpackIncludeAssetsPlugin({
			assets: ['styles.css'],
			append: true
		})
		// new webpack.optimize.UglifyJsPlugin({
		//     compress: {warnings: false}
		// })
	]
}
