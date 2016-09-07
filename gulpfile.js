const elixir = require('laravel-elixir');
require('laravel-elixir-vue');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.sass(['app.scss']);
});
elixir(function(mix) {
	mix.scripts(['app.js']);
});
elixir(function(mix) {
	mix.copy('resources/assets/images', 'public/build/images');
});

elixir(function(mix) {
//	mix.version(['css/app.css', 'js/all.js']);
});
