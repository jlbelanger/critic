/* eslint-disable global-require */
/* eslint-disable import/no-extraneous-dependencies */
const mix = require('laravel-mix');
const dotenv = require('dotenv');
const dotenvExpand = require('dotenv-expand');

const myEnv = dotenv.config();
dotenvExpand.expand(myEnv);

mix.js('resources/js/app.js', 'assets/js')
	.minify('public/assets/js/app.js');

mix.js('resources/js/admin.js', 'assets/js')
	.minify('public/assets/js/admin.js');

mix.sass('resources/scss/style.scss', 'assets/css')
	.minify('public/assets/css/style.css');

mix.version();

mix.browserSync({ proxy: process.env.MIX_APP_URL });
