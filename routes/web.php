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
Route::get('/home', 'HomeController@index')->name('home');


// role : USER

Route::group(['prefix' => 'app/v1','middleware' => 'auth'],function(){
	Route::group(['prefix' => 'user','middleware' => 'role:user'],function(){

			//Abonnee
			Route::get('abonnee','AbonneeController@index')->name('user-abonnee-index');
			Route::get('abonnees/add','AbonneeController@create')->name('user-abonnee-add');
			Route::get('abonnees/edit/{id}','AbonneeController@edit');
			Route::get('abonnees','AbonneeController@get_abonnee');
			Route::post('abonnee','AbonneeController@store')->name('user-abonnee-store');
			Route::get('abonnee/{id}','AbonneeController@get_article');

			//ass
			Route::get('ass','AssociationController@index')->name('user-ass-index');
			Route::post('ass','AssociationController@store')->name('user-ass-store');

			//users 
			Route::get('users','UsersController@index')->name('user-users-index');
			Route::get('users/add','UsersController@create')->name('user-users-add');
			Route::get('users/edit/{id}','UsersController@edit');
			Route::post('users','UsersController@store')->name('user-users-store');
			Route::get('users/data','UsersController@get_users');

			//services 
			Route::get('services','ServicesController@index')->name('user-services-index');
			Route::get('services/add','ServicesController@create')->name('user-services-add');
			Route::get('services/edit/{id}','ServicesController@edit');
			Route::post('services','ServicesController@store')->name('user-services-store');
			Route::get('services/data','ServicesController@get_services');

			//tranches 
			Route::get('tranches','TranchesController@index')->name('user-tranches-index');
			Route::get('tranches/add','TranchesController@create')->name('user-tranches-add');
			Route::get('tranches/edit/{id}','TranchesController@edit');
			Route::post('tranches','TranchesController@store')->name('user-tranches-store');
			Route::get('tranches/data','TranchesController@get_tranches');

			//users 
			Route::get('role','UsersController@role_index')->name('user-role-index');
			Route::get('role/add','UsersController@role_create')->name('user-role-add');
			Route::get('role/edit/{id}','UsersController@role_edit');
			Route::post('role','UsersController@role_store')->name('user-role-store');
			Route::get('role/data','UsersController@role_get_users');
	});
});