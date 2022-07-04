const mix = require('laravel-mix');
const dotenv = require('dotenv');
const dotenvExpand = require('dotenv-expand');
const { styles } = require('@ckeditor/ckeditor5-dev-utils');

const myEnv = dotenv.config();
dotenvExpand.expand(myEnv);

mix.options({ processCssUrls: false });

mix.js('resources/js/app.js', 'assets/js')
	.minify('public/assets/js/app.js');

mix.js('resources/js/admin.js', 'assets/js')
	.minify('public/assets/js/admin.js');

mix.js('resources/js/ckeditor.js', 'assets/js')
	.minify('public/assets/js/ckeditor.js');

mix.sass('resources/scss/style.scss', 'assets/css')
	.minify('public/assets/css/style.css');

const CKERegex = {
	svg: /ckeditor5-[^/\\]+[/\\]theme[/\\]icons[/\\][^/\\]+\.svg$/,
	css: /ckeditor5-[^/\\]+[/\\]theme[/\\].+\.css$/,
};

// https://stackoverflow.com/a/60196916
Mix.listen('configReady', (webpackConfig) => {
	const rules = webpackConfig.module.rules;
	const targetSVG = /(\.(png|jpe?g|gif|webp|avif)$|^((?!font).)*\.svg$)/;
	const targetFont = /(\.(woff2?|ttf|eot|otf)$|font.*\.svg$)/;
	const targetCSS = /\.p?css$/;
	let i = 0;

	for (const rule of rules) { // eslint-disable-line no-restricted-syntax
		if (rule.test.toString() === targetSVG.toString()) {
			rule.exclude = CKERegex.svg;
			webpackConfig.module.rules.splice(i, 1);
		} else if (rule.test.toString() === targetFont.toString()) {
			rule.exclude = CKERegex.svg;
		} else if (rule.test.toString() === targetCSS.toString()) {
			rule.exclude = CKERegex.css;
		}
		i += 1;
	}
});

mix.webpackConfig({
	module: {
		rules: [
			{
				test: /resources\/js\/ckeditor\/.+\.svg$/,
				use: ['raw-loader'],
			},
			{
				test: CKERegex.svg,
				use: ['raw-loader'],
			},
			{
				test: CKERegex.css,
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
		],
	},
});

mix.version();

mix.browserSync({ proxy: process.env.MIX_APP_URL });
