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

Route::get('/', 'Auth\LoginController@index' )->name('approver.login');

Route::prefix('admin')->group(function(){

	// admin login
	Route::get('/', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
	
	// admin login submit
	Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');

	// admin login submit
	Route::post('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

	// admin manage user
	Route::resource('/manage/users', 'Admin\ManageUsersController');

	// create new admin
	Route::resource('/manage/admin', 'Admin\AdminController');

	//ADMIN Account Settings route
	Route::get('/account/settings', 'Admin\AdminController@accountInfo')->name('acc.settings');

	//ADMIN Account Settings submit
	Route::match(['put', 'patch'], '/account/settings/update', 'Admin\AdminController@updateInfo')->name('acc.settings.submit'); 


	// create new category
	Route::resource('/category', 'Admin\Categorycontroller');

	//Asset Management route
	Route::resource('/assets-management', 'Admin\AssetsController');

	//Create new Assets route
	Route::get('/assets/create', 'Admin\AssetsController@showCreate')->name('create.assets');

	//Deployed Units Index
	Route::get('/assets/deployed', 'Admin\AssetsController@DeployedIndex')->name('assets.deployed');

	//Deployed Monitor
	Route::get('/assets/deployed/Monitor', 'Admin\AssetsController@DeployedMonitor')->name('assets.deployed.monitor');

	//Deployed Units
	Route::get('/assets/deployed/Units', 'Admin\AssetsController@DeployedUnit')->name('assets.deployed.units');

	//Stock Assets Index
	Route::get('/assets/stocks', 'Admin\AssetsController@StocksIndex')->name('assets.stocks');

	//Assets Tracking
	Route::get('/assets/tracking', 'Admin\AssetsController@AssetTrackingIndex')->name('assets.track');
	
});

// user auth route
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

// admin auth route
Route::get('/dashboard', 'Admin\AdminController@index')->name('dashboard');