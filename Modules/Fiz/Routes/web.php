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

Route::group(['prefix'=>'/fiz','middleware'=>['fiz']],function()
{
    Route::get('/', 'FizController@index');
    //Route::get('/login', [\App\Http\Controllers\HomeController::class,'login'])->name('login');
});


Route::group(['prefix'=>LaravelLocalization::setLocale().'/fiz','middleware'=>['auth', 'fiz', 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function()
{
    Route::get('/home', 'FizController@home')->name('fiz.home');
    Route::get('/new_order', 'FizOrderController@create')->name('fiz.new_order');
    Route::get('/all_orders', 'FizOrderController@index')->name('fiz.all_orders');
    Route::get('/settings', 'FizController@settings')->name('fiz.settings');
    Route::post('/settings_store', 'FizController@settings_store')->name('fiz.settings.store');
    // Create and store new order
    Route::get('/new_order/step_1', 'FizOrderController@create_step_1')->name('fiz.new_order.step_1');
    Route::post('/new_order/step_1/store', 'FizOrderController@store_step_1')->name('fiz.new_order.store_step_1');
    Route::get('/new_order/step_2', 'FizOrderController@create_step_2')->name('fiz.new_order.step_2');
    Route::post('/new_order/step_2/store/{gen}', 'FizOrderController@store_step_2')->name('fiz.new_order.store_step_2');
    Route::get('/new_order/step_3', 'FizOrderController@create_step_3')->name('fiz.new_order.step_3');
    Route::post('/new_order/step_3/store/{gen}', 'FizOrderController@store_step_3')->name('fiz.new_order.store_step_3');
    Route::get('/order/step_4', 'FizOrderController@create_step_4')->name('fiz.order.step_4');
    Route::post('/new_order/step_4/store/{gen}', 'FizOrderController@store_step_4')->name('fiz.new_order.store_step_4');

    // Get in blade template ready order
    Route::post('/order/{gen}', 'FizOrderController@getReadyOrder')->name('fiz.ready_order');

    // Get in pdf template ready order
    //Route::post('/testing_order/pdf', 'TestingOrderController@getReadyOrderPdf')->name('gov.ready_order.pdf');
    /*Route::get('/new_order/step_5', 'TestingOrderController@create_step_5')->name('testing.new_order.step_5');
    Route::post('/new_order/step_5/store/{test_gen}', 'TestingOrderController@store_step_5')->name('testing.new_order.store_step_5');*/

     // Edit and update order
    Route::get('/edit_order/step_1', 'FizOrderController@edit_step_1')->name('fiz.edit_order.step_1');
    Route::post('/edit_order/step_1/update/{gen}', 'FizOrderController@update_step_1')->name('fiz.edit_order.update_step_1');
    Route::get('/edit_order/step_2', 'FizOrderController@edit_step_2')->name('fiz.edit_order.step_2');
    Route::post('/edit_order/step_2/update/{gen}', 'FizOrderController@update_step_2')->name('fiz.edit_order.update_step_2');
    Route::get('/edit_order/step_3', 'FizOrderController@edit_step_3')->name('fiz.edit_order.step_3');
    Route::post('/edit_order/step_3/update/{gen}', 'FizOrderController@update_step_3')->name('fiz.edit_order.update_step_3');
    /*Route::get('/edit_order/step_4', 'TestingOrderController@edit_step_4')->name('testing.edit_order.step_4');
    Route::post('/edit_order/step_4/update/{test_gen}', 'TestingOrderController@update_step_4')->name('testing.edit_order.update_step_4');
    Route::get('/edit_order/step_5', 'TestingOrderController@edit_step_5')->name('testing.edit_order.step_5');*/

     // Delete order
    Route::post('/delete_order/{gen}', 'FizOrderController@deleteOrder')->name('fiz.delete_order');

    // Download ready order
    Route::get('/downloadOrder/{gen}', 'FizController@downloadOrder')->name('fiz.download_ready_order');

    // Download order uploaded photo
    Route::get('/downloadOrderPhoto/{gen}', 'FizController@downloadOrderPhoto')->name('fiz.download_order_photo');
});
