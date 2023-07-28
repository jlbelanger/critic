const path = require('path');
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const { styles } = require('@ckeditor/ckeditor5-dev-utils');
const TerserPlugin = require('terser-webpack-plugin');
const { WebpackManifestPlugin } = require('webpack-manifest-plugin');

require('dotenv').config();

module.exports = {
	devtool: false,
	entry: {
		admin: './resources/js/admin.js',
		app: './resources/js/app.js',
		ckeditor: './resources/js/ckeditor.js',
	},
	output: {
		filename: 'assets/js/[name].min.js?[contenthash]',
		path: path.resolve(__dirname, 'public'),
		publicPath: '/',
	},
	plugins: [
		new MiniCssExtractPlugin({
			filename: 'assets/css/[name].min.css?[contenthash]',
		}),
		new WebpackManifestPlugin({
			map: (f) => {
				f.name = f.path.replace(/\?.+$/, '');
				return f;
			},
			fileName: 'mix-manifest.json',
		}),
		new BrowserSyncPlugin({
			// injectChanges: true,
			proxy: process.env.APP_URL,
			files: [
				'public/assets/js/*.js',
				'public/assets/css/*.css',
			],
		}, {
			reload: false,
		}),
	],
	module: {
		rules: [
			{
				test: /ckeditor5-[^/\\]+[/\\]theme[/\\]icons[/\\][^/\\]+\.svg$/,
				use: ['raw-loader'],
			},
			{
				test: /resources\/js\/ckeditor\/.+\.svg$/,
				use: ['raw-loader'],
			},
			{
				test: /ckeditor5-[^/\\]+[/\\]theme[/\\].+\.css$/,
				use: [
					{
						loader: 'style-loader',
						options: {
							injectType: 'singletonStyleTag',
							attributes: {
								'data-cke': true,
							},
						},
					},
					'css-loader',
					{
						loader: 'postcss-loader',
						options: {
							postcssOptions: styles.getPostCssConfig({
								themeImporter: {
									themePath: require.resolve('@ckeditor/ckeditor5-theme-lark'),
								},
								minify: true,
							}),
						},
					},
				],
			},
			{
				test: /\.js$/,
				exclude: /node_modules/,
				use: ['babel-loader'],
			},
			{
				test: /\.scss$/,
				use: [
					MiniCssExtractPlugin.loader,
					{
						loader: 'css-loader',
						options: {
							url: false,
						},
					},
					{
						loader: 'postcss-loader',
						options: {
							postcssOptions: {
								plugins: [
									'autoprefixer',
									'cssnano',
								],
							},
						},
					},
					'sass-loader',
				],
			},
		],
	},
	optimization: {
		minimizer: [
			new TerserPlugin({
				extractComments: false,
			}),
		],
		splitChunks: {
			cacheGroups: {
				style: {
					name: 'style',
					type: 'css/mini-extract',
					chunks: (chunk) => (chunk.name === 'app'),
					enforce: true,
				},
				admin: {
					name: 'admin',
					type: 'css/mini-extract',
					chunks: (chunk) => (chunk.name === 'admin'),
					enforce: true,
				},
			},
		},
	},
};
