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

Route::prefix('testing')->group(function() {
    Route::get('/', 'TestingController@index');
});

Route::group(['prefix'=>LaravelLocalization::setLocale().'/testing','middleware'=>['auth', 'testing', 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function()
{
    Route::get('/home', 'TestingController@home')->name('testing.home');
    Route::get('/settings', 'TestingController@settings')->name('testing.settings');
    Route::post('/settings_store', 'TestingController@settings_store')->name('testing.settings.store');

    // All orders
    Route::get('/all_orders', 'TestingOrderController@index')->name('testing.all_orders');

    // Create and store new order
    Route::get('/new_order/step_1', 'TestingOrderController@create_step_1')->name('testing.new_order.step_1');
    Route::post('/new_order/step_1/store', 'TestingOrderController@store_step_1')->name('testing.new_order.store_step_1');
    Route::get('/new_order/step_2', 'TestingOrderController@create_step_2')->name('testing.new_order.step_2');
    Route::post('/new_order/step_2/store/{test_gen}', 'TestingOrderController@store_step_2')->name('testing.new_order.store_step_2');
    Route::get('/new_order/step_3', 'TestingOrderController@create_step_3')->name('testing.new_order.step_3');
    Route::post('/new_order/step_3/store/{test_gen}', 'TestingOrderController@store_step_3')->name('testing.new_order.store_step_3');
    Route::get('/new_order/step_4', 'TestingOrderController@create_step_4')->name('testing.new_order.step_4');
    Route::post('/new_order/step_4/store/{test_gen}', 'TestingOrderController@store_step_4')->name('testing.new_order.store_step_4');
    Route::get('/new_order/step_5', 'TestingOrderController@create_step_5')->name('testing.new_order.step_5');
    Route::post('/new_order/step_5/store/{test_gen}', 'TestingOrderController@store_step_5')->name('testing.new_order.store_step_5');

    // Edit and update order
    Route::get('/edit_order/step_1/{test_gen}', 'TestingOrderController@edit_step_1')->name('testing.edit_order.step_1');
    Route::post('/edit_order/step_1/update/{test_gen}', 'TestingOrderController@update_step_1')->name('testing.edit_order.update_step_1');
    Route::get('/edit_order/step_2', 'TestingOrderController@edit_step_2')->name('testing.edit_order.step_2');
    //Route::post('/edit_order/step_2/update/{test_gen}', 'TestingOrderController@update_step_2')->name('testing.edit_order.update_step_2');
    Route::get('/edit_order/step_3', 'TestingOrderController@edit_step_3')->name('testing.edit_order.step_3');
    Route::post('/edit_order/step_3/update/{test_gen}', 'TestingOrderController@update_step_3')->name('testing.edit_order.update_step_3');
    Route::get('/edit_order/step_4', 'TestingOrderController@edit_step_4')->name('testing.edit_order.step_4');
    Route::post('/edit_order/step_4/update/{test_gen}', 'TestingOrderController@update_step_4')->name('testing.edit_order.update_step_4');
    Route::get('/edit_order/step_5', 'TestingOrderController@edit_step_5')->name('testing.edit_order.step_5');

    // Delete order
    Route::post('/delete_order/{test_gen}', 'TestingOrderController@deleteOrder')->name('testing.delete_order');

    // Download files
    Route::get('/downloadUdost/{id}', 'TestingController@downloadUdost')->name('testing.downloadUdost');
    Route::get('/downloadEdu/{id}', 'TestingController@downloadEdu')->name('testing.downloadEdu');
    Route::get('/downloadExpReference/{id}', 'TestingController@downloadExpReference')->name('testing.downloadExpReference');
    Route::get('/downloadExpReferenceSigned/{id}', 'TestingController@downloadExpReferenceSigned')->name('testing.downloadExpReferenceSigned');
    Route::get('/downloadPaymentReceipt/{id}', 'TestingController@downloadPaymentReceipt')->name('testing.downloadPaymentReceipt');
    Route::get('/downloadCertificate/{id}', 'TestingController@downloadCertificate')->name('testing.downloadCertificate');

    // Get in blade template ready order
    Route::get('/testing_order/{id}', 'TestingOrderController@getReadyOrder')->name('testing.ready_order');

    // Get in pdf template ready order
    Route::post('/testing_order/pdf', 'TestingOrderController@getReadyOrderPdf')->name('testing.ready_order.pdf');

    // Sign ready order
    Route::post('/testing_order/sign', 'TestingOrderController@signReadyOrder')->name('testing.ready_order.sign');

    // Other
    Route::post('/get_test_date', 'TestingOrderController@get_test_date')->name('testing.get_test_date');
});
