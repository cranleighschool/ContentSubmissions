<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*Route::get('/', function () {
	$users = \App\User::all();
	var_dump($users);
//    return redirect()->route('{school}.submissions.index', ['prep']);
});
*/

Route::auth();

Route::group(['domain'=>env('CRAN_SUBDOMAIN').'.{school}.org'], function($school) {
	
	Route::get('/', function($school) {
		return redirect()->route('submissions.index',[$school]);
	});
		
	Route::resource('submissions', 'SubmissionController');
});

Route::get('/home', 'HomeController@index');
