<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


/*Route::group(array('filter' => 'clear-cache'), function(){
	Route::post('/', [
		'as' => 'clear-cache',
		'uses' => 'BaseController@clearCache',
	]);
});*/


Route::get('/', [
	'as' =>'home',
	'uses' => 'WelcomeController@showWelcome'
]);

Route::get('/ingresar-datos', [
	'as' => 'inputData_0',
	'uses' => 'InputDataController@showInputData'
]);
Route::post('/ingresar-datos', [
	'as' => 'inputData_0',
	'uses' => 'InputDataController@postInputData'
]);
Route::get('/c2-php-101', [
	'as' => 'c2_0',
	'uses' => 'C2ExerciseController@show'
]);
Route::post('/c2-php-101', [
	'as' => 'c2_0',
	'uses' => 'C2ExerciseController@store'
]);

Route::get('/area-de-aprendizaje/{page}', [
	'as' => 'first_learn',
	'uses' => 'FirstLearnController@show'
]);
Route::post('/area-de-aprendizaje/{page}', [
	'as' => 'first_learn',
	'uses' => 'FirstLearnController@store'
]);

Route::get('/aprendiendo-2da-fase/{page}', [
	'as' => 'learn_2',
	'uses' => 'SecondLearnController@show'
]);

Route::post('/ajax/generic-code', [
	'as' => 'generic_code.ajax_execute',
	'uses' => 'GenericCodeController@AjaxExecute'
]);

Route::get('/a-2-2-1-ejercicio-de-la-primera-fase', [
	'as' => 'a221',
	'uses' => 'A221Controller@show'
]);
Route::post('/a-2-2-1-ejercicio-de-la-primera-fase', [
	'as' => 'a221',
	'uses' => 'A221Controller@store'
]);

Route::get('/test/{page}', [
	'as' => 'tests',
	'uses' => 'TestsController@Show',
]);

Route::post('/test/{page}', [
	'as' => 'tests',
	'uses' => 'TestsController@store',
]);

Route::get('/resultados', [
	'as' => 'results',
	'uses' => 'ResultsController@show'
]);

Route::get('/logout', [
	'as' => 'logout',
	'uses' => 'InputDataController@logout'
]);
Route::get('/sesion-abierta', [
	'as' => 'already_logged_in',
	'uses' => 'InputDataController@showAlreadyLoggedIn'
]);
Route::get('/tema-de-jquery-ui', function(){
	return Redirect::to('http://jqueryui.com/themeroller/#!zThemeParams=5d000001003906000000000000003d8888d844329a8dfe02723de3e5703cc0623479daf4a6c1f840d9a020e7cb40db39f67f60e5f164f422fee829ee46a0fcfca7fde4c1a176a1bc61910ff7b0aabe4cac07784b80d8b9234c1eac734f68c69ea147ada4273094fc58917e85cd7b9f8da7056b18de524849bbb15e0daeb5874faf1ed82e80c092de349bdc34f6093a28aba00b48b7aefa0e82083652663f7ab90be062ed90b6d0a67c07335f655a58fe237beae53cc7a9ae3c9ddbd5956ccd3e73cce160861d8fc523ac9772a1eb7941b4a74b79d23b2cc9d1c3176417703dcbc03d88f148dac1ee742e9cd922c2708e149de2074616c8889e50f7280b3400e28a5708b0eb9667d72877520f63cf3db4381539bf3cc5a9935c478df0666333de26b1dc65c5c4aa8013e05c6efd8890e47915f510456efa228bbaedd9f528965efe35f1fe341cb403a5025dccbe5c5d773edf22158850463149f01e3f428bf8db2e1c814f0b881029e6ee9eda698c02b78d0c9d9348abe4dcd7974f8adbadd029bba134e62145034c077c78cc9500764941141ad402c8b2857e6ffd4da4a8af88d5af599e7e4e0c8c9d878f415c70ceb558af3b547af5efeb41f5058c19e91ee559ba97950738aa5c8ad52ccc362e3e6d36f5c077e000ca900651d0a882820e3a3da730ff1365d2939cf236983521c6313318c1389fd427801ed89624761ea1aaa83326b62f96e12453385e185b412c1cff9c8a188c');
});

Route::post('/ajax/check-email', [
	'as' => 'ajaxCheckEmail',
	'uses' => 'InputDataController@ajaxCheckEmail',
]);
