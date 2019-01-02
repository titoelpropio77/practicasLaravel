const mix = require('laravel-mix');//importa laravel- mix


/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

// mix.scripts([
// 	 'node_modules/bootstrap/dist/js/bootstrap.js',
// 	 'node_modules/jquery/dist/jquery.js',
// 	 'resources/assets/js/prueba.js',
//  ],'public/js','./');
mix.js('resources/js/jquery.js', 'public/js/jquery.js')
.js('resources/js/app.js', 'public/js/ejemplo.js');
// mix.sass(['resources/sass/app.scss','resources/sass/blog.scss'], 'public/css');
 // mix.sass('resources/sass/app.scss', 'public/css');
mix.browserSync({
	proxy: 'laravel.dev'
});

//less('resources/assets/less/style.less', 'public/css');
  // mix.styles([
  // 	'a.css',
  // 	'b.css',
  // 	'c.css',
  // 	],'public/css/d.css','public/css');
