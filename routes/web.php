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

Route::group(['domain'=>env('CRAN_SUBDOMAIN').'.{school}.org'], function ($school) {
    
    Route::get('/', function($school) {

		return view('home', ['school'=>$school]);

    });
        
    Route::resource('submissions', 'SubmissionController');
    Route::resource('twitter', 'TwitterAccountsController');
	Route::get('staff-biographies/deleted', 'BiographiesController@showDeleted');
	Route::post('staff-biographies/restore', 'BiographiesController@restore')->name("staff-biographies.restore");
    Route::resource('staff-biographies', 'BiographiesController');
    Route::get('staff-biographies/search/{username}', 'BiographiesController@search');
	Route::get('staff-biographies/find/{username}', 'BiographiesController@search');
	
	Route::get('hero-manager', 'HeroController@dashboard');
	Route::post('hero-manager', 'HeroController@getAssetBankPhoto');
	Route::get('hero-manager/situ/{assetId}/{type?}', 'HeroController@HeroSitu')->name("insitu");
	Route::post('hero-manager/situ', 'HeroController@HeroSituPost')->name('insitupost');
	Route::get('asset-bank-download', 'AssetBankController@index');
	Route::post('asset-bank-download', 'AssetBankController@download');

});

Route::get('/home', 'HomeController@index');

