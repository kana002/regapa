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
Route::group(['prefix'=>'/tik','middleware'=>['tik']],function()
{
    Route::get('/', 'TikController@index');
    //Route::get('/login', [\App\Http\Controllers\HomeController::class,'login'])->name('login');
});


Route::group(['prefix'=>LaravelLocalization::setLocale().'/tik','middleware'=>['auth', 'tik', 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function()
{
    Route::get('/home', 'TikController@home')->name('tik.home');
    Route::get('/new_order', 'TikOrderController@create')->name('tik.new_order');
    Route::get('/all_orders', 'TikOrderController@index')->name('tik.all_orders');
    Route::get('/settings', 'TikController@settings')->name('tik.settings');

    // Create and store new order
    Route::get('/new_order/step_1', 'TikOrderController@create_step_1')->name('tik.new_order.step_1');
    Route::post('/new_order/step_1/store', 'TikOrderController@store_step_1')->name('tik.new_order.store_step_1');
    Route::get('/new_order/step_2', 'TikOrderController@create_step_2')->name('tik.new_order.step_2');
    Route::post('/new_order/step_2/store/{gen}', 'TikOrderController@store_step_2')->name('tik.new_order.store_step_2');
    Route::get('/new_order/step_3', 'TikOrderController@create_step_3')->name('tik.new_order.step_3');
    Route::post('/new_order/step_3/store/{gen}', 'TikOrderController@store_step_3')->name('tik.new_order.store_step_3');
    Route::get('/order/step_4', 'TikOrderController@create_step_4')->name('tik.order.step_4');
    Route::post('/new_order/step_4/store/{gen}', 'TikOrderController@store_step_4')->name('tik.new_order.store_step_4');

    // Get in blade template ready order
    Route::post('/order/{gen}', 'TikOrderController@getReadyOrder')->name('tik.ready_order');

    // Get in pdf template ready order
    //Route::post('/testing_order/pdf', 'TestingOrderController@getReadyOrderPdf')->name('gov.ready_order.pdf');
    /*Route::get('/new_order/step_5', 'TestingOrderController@create_step_5')->name('testing.new_order.step_5');
    Route::post('/new_order/step_5/store/{test_gen}', 'TestingOrderController@store_step_5')->name('testing.new_order.store_step_5');*/

     // Edit and update order
    Route::get('/edit_order/step_1', 'TikOrderController@edit_step_1')->name('tik.edit_order.step_1');
    Route::post('/edit_order/step_1/update/{gen}', 'TikOrderController@update_step_1')->name('tik.edit_order.update_step_1');
    Route::get('/edit_order/step_2', 'TikOrderController@edit_step_2')->name('tik.edit_order.step_2');
    Route::post('/edit_order/step_2/update/{gen}', 'TikOrderController@update_step_2')->name('tik.edit_order.update_step_2');
    Route::get('/edit_order/step_3', 'TikOrderController@edit_step_3')->name('tik.edit_order.step_3');
    Route::post('/edit_order/step_3/update/{gen}', 'TikOrderController@update_step_3')->name('tik.edit_order.update_step_3');
    /*Route::get('/edit_order/step_4', 'TestingOrderController@edit_step_4')->name('testing.edit_order.step_4');
    Route::post('/edit_order/step_4/update/{test_gen}', 'TestingOrderController@update_step_4')->name('testing.edit_order.update_step_4');
    Route::get('/edit_order/step_5', 'TestingOrderController@edit_step_5')->name('testing.edit_order.step_5');*/

     // Delete order
    Route::post('/delete_order/{gen}', 'TikOrderController@deleteOrder')->name('tik.delete_order');

    // Download ready order
    Route::get('/downloadOrder/{gen}', 'TikController@downloadOrder')->name('tik.download_ready_order');

    // Download order uploaded photo
    Route::get('/downloadOrderPhoto/{gen}', 'TikController@downloadOrderPhoto')->name('tik.download_order_photo');
});