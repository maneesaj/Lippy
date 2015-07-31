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

Route::get('/', 'WelcomeController@index');

Route::get('search', array(
    'as'   => 'search', // This is the route's name
    'uses' => 'SearchController@index'
));

Route::post(
	    'search', 
	    array(
	        'as' => 'posts.search', 
	        'uses' => 'SearchController@postSearch'
	    )
	);

Route::post(
	    'matchsearch', 
	    array(
	        'as' => 'match.search', 
	        'uses' => 'SearchController@searchmatch'
	    )
	);
Route::post(
	    'add_product',
	    array(
	        'as' => 'match.add', 
	        'uses' => 'AddproductController@addproduct'
	    )
	);

Route::get(
	    'login',
	    array(
	        'as' => 'login', 
	        'uses' => 'LoginController@index'
	    )
	);

Route::get('add_product', array(
    'as'   => 'add', // This is the route's name
    'uses' => 'AddproductController@index'
));

Route::get('search/{id}', function($id){
return view('showproduct')->withId($id);
});

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
