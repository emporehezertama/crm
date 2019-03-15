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

date_default_timezone_set("Asia/Bangkok");

Route::get('/', function(){
	return redirect('login');
});

Auth::routes();

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth', 'access:1']], function(){
	Route::get('/', 'IndexController@index')->name('admin.index');
	Route::get('success-stories', 'IndexController@index')->name('admin.success-stories.index');
	Route::resource('user-access','UserAccessController', ['only'=> ['index','create','store','edit','destroy','update'], 'as' => 'admin']);
	Route::resource('users','UsersController', ['only'=> ['index','create','store','edit','destroy','update'], 'as' => 'admin']);
	Route::resource('client','ClientController', ['only'=> ['index','create','store','edit','destroy','update'], 'as' => 'admin']);
	Route::resource('project','ProjectController', ['only'=> ['index','create','store','edit','destroy','update'], 'as' => 'admin']);
	Route::resource('product','ProductController', ['only'=> ['index','create','store','edit','destroy','update'], 'as' => 'admin']);

	Route::get('profile', 'IndexController@profile')->name('admin.profile');
	Route::get('setting', 'SettingController@index')->name('admin.setting.index');
	Route::post('setting/update', 'SettingController@update')->name('admin.setting.update');
	Route::post('profile/update', 'IndexController@profileUpdate')->name('admin.profile.update');
	Route::post('profile/change-password', 'IndexController@changePassword')->name('admin.profile.change-password');
});

Route::group(['prefix' => 'sales', 'namespace' => 'Sales', 'middleware' => ['auth', 'access:4']], function(){
	Route::get('/', 'PipelineController@index')->name('sales.index');
	Route::resource('pipeline','PipelineController', ['only'=> ['index','create','store','edit','destroy','update'], 'as' => 'sales']);
	Route::resource('project','ProjectController', ['only'=> ['index','create','store','edit','destroy','update'], 'as' => 'sales']);
	Route::resource('client','ClientController', ['only'=> ['index','create','store','edit','destroy','update'], 'as' => 'sales']);
	Route::post('pipeline/add-note/{id}', 'PipelineController@addNote')->name('sales.pipeline.add-note');
	Route::get('pipeline/calls/{id}', 'PipelineController@calls')->name('sales.pipeline.calls');
	Route::get('pipeline/reminder/{id}', 'PipelineController@reminder')->name('sales.pipeline.reminder');
	Route::get('pipeline/demo/{id}', 'PipelineController@demo')->name('sales.pipeline.demo');
	Route::get('pipeline/edit/{id}', 'PipelineController@edit')->name('sales.pipeline.edit');
	Route::get('pipeline/terminate/{id}', 'PipelineController@terminate')->name('sales.pipeline.terminate');
	Route::post('pipeline/move-to-quotation/{id}', 'PipelineController@moveToQuotation')->name('sales.pipeline.move-to-quotation');
	Route::get('pipeline/move-to-negotiation/{id}', 'PipelineController@moveToNegotation')->name('sales.pipeline.move-to-negotiation');
	Route::get('pipeline/move-to-po/{id}', 'PipelineController@moveToPO')->name('sales.pipeline.move-to-po');
	Route::get('pipeline/move-to-change-request/{id}', 'PipelineController@moveToChangeRequest')->name('sales.pipeline.move-to-change-request');
});