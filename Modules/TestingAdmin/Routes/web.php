<?php
use Illuminate\Support\Facades\Route;
use Modules\TestingAdmin\Http\Controllers\TestingAdminOrderController;
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

Route::prefix('testingadmin')->group(function() {
    Route::get('/', 'TestingAdminController@index');
});

Route::group(['prefix'=>LaravelLocalization::setLocale().'/testing_admin','middleware'=>['auth', 'testing_admin', 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function()
{
    Route::get('/home', 'TestingAdminController@home')->name('testingadmin.home');
    Route::get('/settings/{id}', 'TestingAdminController@settings')->name('testingadmin.settings');
    Route::post('/update_settings/{id}', 'TestingAdminController@update_settings')->name('update.testingadmin.settings');

    Route::get('/all_groups', 'TestingAdminGroupController@index')->name('testingadmin.all_groups');
    Route::get('/create_group', 'TestingAdminGroupController@create')->name('testingadmin.group.create');
    Route::post('/store_group', 'TestingAdminGroupController@store')->name('testingadmin.group.store');
    Route::get('/edit_group/{id}', 'TestingAdminGroupController@edit')->name('testingadmin.group.edit');
    Route::post('/update_group/{id}', 'TestingAdminGroupController@update')->name('testingadmin.group.update');
    Route::post('/delete_group/{id}', 'TestingAdminGroupController@delete')->name('testingadmin.group.delete');

    Route::get('/all_orders', 'TestingAdminOrderController@index')->name('testingadmin.all_orders');
    Route::get('/create_orders', 'TestingAdminOrderController@create')->name('testingadmin.create_orders');
    Route::patch('/update_orders/{id}', 'TestingAdminOrderController@update')->name('testingadmin.update_orders');
    Route::patch('/delete_order/{id}', 'TestingAdminOrderController@delete')->name('testingadmin.delete_order');
    Route::patch('/update_accept/{id}', 'TestingAdminOrderController@accept')->name('testingadmin.accept_orders');

    // Get in blade template ready order
    Route::get('/ready_order_{id}', 'TestingAdminOrderController@edit')->name('testingadmin.ready_order_template');


    Route::get('/all_users', 'TestingAdminUserController@index')->name('testingadmin.all_users');
    Route::get('/create_users', 'TestingAdminUserController@create')->name('testingadmin.create_users');
    Route::post('/store_users', 'TestingAdminUserController@store')->name('testingadmin.store_users');
    Route::get('/edit_users/{id}', 'TestingAdminUserController@edit')->name('testingadmin.edit_users');
    Route::patch('/update_users/{id}', 'TestingAdminUserController@update')->name('testingadmin.update_users');
    Route::delete('/destroy_users/{id}', 'TestingAdminUserController@destroy')->name('testingadmin.destroy_users');


    Route::get('/all_tests', 'TestingAdminTestController@index')->name('testingadmin.all_tests');
    Route::get('/create_test', 'TestingAdminTestController@create')->name('testingadmin.test.create');
    Route::post('/store_test', 'TestingAdminTestController@store')->name('testingadmin.test.store');
    Route::get('/edit_test/{id}', 'TestingAdminTestController@edit')->name('testingadmin.test.edit');
    Route::patch('/update_test/{id}', 'TestingAdminTestController@update')->name('testingadmin.test.update');
    Route::post('/destroy_test/{id}', 'TestingAdminTestController@destroy')->name('testingadmin.test.destroy');

    Route::get('/downloadOrderUdost/{id}', 'TestingAdminController@downloadOrderUdost')->name('testingadmin.download_order_udost');
    Route::get('/downloadOrderEducation/{id}', 'TestingAdminController@downloadOrderEducation')->name('testingadmin.download_order_education');
    Route::get('/downloadOrderExpSpravka/{id}', 'TestingAdminController@downloadOrderExpSpravka')->name('testingadmin.download_order_exp_spravka');
    Route::get('/downloadOrderCert/{id}', 'TestingAdminController@downloadOrderCert')->name('testingadmin.download_order_cert');
    Route::get('/downloadOrderPaymentReceipt/{id}', 'TestingAdminController@downloadOrderPaymentReceipt')->name('testingadmin.download_order_payment');
    Route::get('/downloadReadyOrder/{id}', 'TestingAdminController@downloadReadyOrder')->name('testingadmin.download_ready_order');

    Route::get('/settings', 'TestingAdminController@settings')->name('testingadmin.settings');

});
