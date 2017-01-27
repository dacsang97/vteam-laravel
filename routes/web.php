<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', ['as' => 'admin.dashboard', 'uses' => 'HomeController@index']);

// Hidden link app
Route::group(['namespace' => 'HiddenLink', 'prefix' => 'link'], function(){
    Route::get('/', ['as' => 'link.index', 'uses' => 'SocialAuthController@index']);
    Route::get('/callback', ['as' => 'link.callback', 'uses' => 'SocialAuthController@callback']);
    Route::get('/redirect', ['as' => 'link.redirect', 'uses' => 'SocialAuthController@redirect']);

    Route::group(['middleware' => 'auth.locked'], function() {
        Route::get('/not-access', ['as' => 'link.not-access', 'uses' => 'LinkController@notAccess']);

        Route::group(['middleware' => 'admin'], function() {
            Route::get('/create', ['as' => 'link.create', 'uses' => 'LinkController@create']);
            Route::post('/create', ['as' => 'link.store', 'uses' => 'LinkController@store']);
            Route::get('/edit', ['as' => 'link.edit', 'uses' => 'LinkController@edit']);
        });
        Route::get('/view', 'SocialAuthController@index');
        Route::get('/view/{hash_id}', ['as' => 'link.view', 'uses' => 'LinkController@view']);
    });
});

Route::any('{any?}', function($any = null){
    return redirect()->to('/');
})->where('any', '.*');
