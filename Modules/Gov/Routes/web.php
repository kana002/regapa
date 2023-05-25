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

Route::group(['prefix'=>'/gov','middleware'=>['gov']],function()
{
    Route::get('/', 'GovController@index');
    //Route::get('/login', [\App\Http\Controllers\HomeController::class,'login'])->name('login');
});

Route::group(['prefix'=>LaravelLocalization::setLocale().'/gov','middleware'=>['auth', 'gov', 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function()
{
    Route::get('/home', 'GovController@home')->name('gov.home');
    Route::get('/new_order', 'GovOrderController@create')->name('gov.new_order');
    Route::get('/all_orders', 'GovOrderController@index')->name('gov.all_orders');
    Route::get('/settings', 'GovController@settings')->name('gov.settings');
    Route::post('/settings_store', 'GovController@settings_store')->name('gov.settings.store');

    // Create and store new order
    Route::get('/new_order/step_1', 'GovOrderController@create_step_1')->name('gov.new_order.step_1');
    Route::post('/new_order/step_1/store', 'GovOrderController@store_step_1')->name('gov.new_order.store_step_1');
    Route::get('/new_order/step_2', 'GovOrderController@create_step_2')->name('gov.new_order.step_2');
    Route::post('/new_order/step_2/store/{gen}', 'GovOrderController@store_step_2')->name('gov.new_order.store_step_2');
    Route::get('/new_order/step_3', 'GovOrderController@create_step_3')->name('gov.new_order.step_3');
    Route::post('/new_order/step_3/store/{gen}', 'GovOrderController@store_step_3')->name('gov.new_order.store_step_3');
    Route::get('/order/step_4', 'GovOrderController@create_step_4')->name('gov.order.step_4');
    Route::post('/new_order/step_4/store/{gen}', 'GovOrderController@store_step_4')->name('gov.new_order.store_step_4');

    // Get in blade template ready order
    Route::post('/order/{gen}', 'GovOrderController@getReadyOrder')->name('gov.ready_order');

    // Get in pdf template ready order
    //Route::post('/testing_order/pdf', 'TestingOrderController@getReadyOrderPdf')->name('gov.ready_order.pdf');
    /*Route::get('/new_order/step_5', 'TestingOrderController@create_step_5')->name('testing.new_order.step_5');
    Route::post('/new_order/step_5/store/{test_gen}', 'TestingOrderController@store_step_5')->name('testing.new_order.store_step_5');*/

     // Edit and update order
    Route::get('/edit_order/step_1', 'GovOrderController@edit_step_1')->name('gov.edit_order.step_1');
    Route::post('/edit_order/step_1/update/{gen}', 'GovOrderController@update_step_1')->name('gov.edit_order.update_step_1');
    Route::get('/edit_order/step_2', 'GovOrderController@edit_step_2')->name('gov.edit_order.step_2');
    Route::post('/edit_order/step_2/update/{gen}', 'GovOrderController@update_step_2')->name('gov.edit_order.update_step_2');
    Route::get('/edit_order/step_3', 'GovOrderController@edit_step_3')->name('gov.edit_order.step_3');
    Route::post('/edit_order/step_3/update/{gen}', 'GovOrderController@update_step_3')->name('gov.edit_order.update_step_3');
    /*Route::get('/edit_order/step_4', 'TestingOrderController@edit_step_4')->name('testing.edit_order.step_4');
    Route::post('/edit_order/step_4/update/{test_gen}', 'TestingOrderController@update_step_4')->name('testing.edit_order.update_step_4');
    Route::get('/edit_order/step_5', 'TestingOrderController@edit_step_5')->name('testing.edit_order.step_5');*/

     // Delete order
    Route::post('/delete_order/{gen}', 'GovOrderController@deleteOrder')->name('gov.delete_order');

    // Download ready order
    Route::get('/downloadOrder/{gen}', 'GovController@downloadOrder')->name('gov.download_ready_order');

    // Download order uploaded photo
    Route::get('/downloadOrderPhoto/{gen}', 'GovController@downloadOrderPhoto')->name('gov.download_order_photo');
});
