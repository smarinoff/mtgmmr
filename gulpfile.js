const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application as well as publishing vendor resources.
 |
 */

elixir((mix) => {
	mix
		.copy('node_modules/semantic-ui-css/themes', 'public/css/themes')
		.copy('node_modules/semantic-ui-css/semantic.min.css', 'resources/assets/css')
		.copy('node_modules/semantic-ui-css/semantic.min.js', 'resources/assets/js')
	    .styles([
	        'semantic.min.css'
	    ])
		.sass('app.scss')
		.webpack([
			'app.js',
			'semantic.min.js',
		]);
});
