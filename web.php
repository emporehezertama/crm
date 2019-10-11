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

Route::group(['middleware' => ['auth']], function(){
	Route::resource('project','ProjectController', ['only'=> ['index','create','store','edit','destroy','update']]);
	Route::resource('client','ClientController', ['only'=> ['index','create','store','edit','destroy','update']]);

	Route::resource('task','TaskController', ['only'=> ['index','create','store','edit','destroy','update']]);
	Route::resource('pipeline','PipelineController', ['only'=> ['index','create','store','edit','destroy','update']]);
	Route::post('pipeline/add-note/{id}', 'PipelineController@addNote')->name('pipeline.add-note');
	Route::post('pipeline/store-invoice-perpetual', 'PipelineController@storeInvoicePerpetual')->name('pipeline.store-invoice-perpetual');
	Route::post('pipeline/store-invoice-pay', 'PipelineController@storeInvoicePay')->name('pipeline.store-invoice-pay');
	Route::get('pipeline/calls/{id}', 'PipelineController@calls')->name('pipeline.calls');
	Route::get('pipeline/reminder/{id}', 'PipelineController@reminder')->name('pipeline.reminder');
	Route::get('pipeline/demo/{id}', 'PipelineController@demo')->name('pipeline.demo');
	Route::get('pipeline/edit/{id}', 'PipelineController@edit')->name('pipeline.edit');
	Route::get('pipeline/terminate/{id}', 'PipelineController@terminate')->name('pipeline.terminate');
	Route::post('pipeline/move-to-quotation/{id}', 'PipelineController@moveToQuotation')->name('pipeline.move-to-quotation');
	Route::post('pipeline/move-to-negotiation/{id}', 'PipelineController@moveToNegotation')->name('pipeline.move-to-negotiation');
	Route::post('pipeline/move-to-po/{id}', 'PipelineController@moveToPO')->name('pipeline.move-to-po');
	Route::get('pipeline/move-to-po-done/{id}', 'PipelineController@moveToPoDone')->name('pipeline.move-to-po-done');
	Route::get('pipeline/print-invoice/{id}', 'PipelineController@printInvoice')->name('pipeline.print-invoice');
	Route::get('pipeline/delete/{id}', 'PipelineController@delete')->name('pipeline.delete');
	Route::post('pipeline/update-note', 'PipelineController@updateNote')->name('pipeline.update-note');
	Route::post('pipeline/update-card', 'PipelineController@updateCard')->name('pipeline.update-card');
	Route::post('ajax/get-pipeline-history', 'AjaxController@getPipelineHistory')->name('ajax.get-pipeline-history');
	Route::post('ajax/get-company', 'AjaxController@getCompany')->name('ajax.get-company');
	Route::post('ajax/get-invoice-perpetual-license', 'AjaxController@getInvoicePerpetualLicense')->name('ajax.get-invoice-perpetual-license');
	Route::resource('price', 'PriceController', ['only'=> ['index','create','store','edit','destroy','update']]);
	Route::get('price/edit-new-pricelist', 'PriceController@editNewPriceList')->name('price.edit-new-pricelist');
	Route::post('price/update-new-pricelist', 'PriceController@updateNewPriceList')->name('price.update-new-pricelist');

});

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
	Route::post('client/importClient', 'ClientController@importClient')->name('client.importClient');
});

Route::group(['prefix' => 'sales', 'middleware' => ['auth', 'access:4']], function(){
	Route::get('/', 'PipelineController@index')->name('sales.index');
	
});