<?php

use Illuminate\Support\Facades\Route;


Route::prefix('admin')->group(function() {
    Route::get('/', 'AdminController@index');
});

Route::group(['prefix'=>LaravelLocalization::setLocale().'/admin','middleware'=>['auth', 'admin', 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function()
{


    Route::get('/home', 'AdminController@home')->name('admin.home');
    Route::get('/settings/{id}', 'AdminController@settings')->name('admin.settings');
    Route::post('/update_settings/{id}', 'AdminController@update_settings')->name('update.admin.settings');

    Route::get('/all_groups', 'AdminGroupController@index')->name('admin.all_groups');
    Route::get('/create_group', 'AdminGroupController@create')->name('admin.group.create');
    Route::post('/store_group', 'AdminGroupController@store')->name('admin.group.store');
    Route::get('/edit_group/{id}', 'AdminGroupController@edit')->name('admin.group.edit');
    Route::post('/update_group/{id}', 'AdminGroupController@update')->name('admin.group.update');
    Route::post('/delete_group/{id}', 'AdminGroupController@delete')->name('admin.group.delete');


    Route::get('/all_themes', 'AdminThemeController@index')->name('admin.theme.index');

    Route::get('/create_theme', 'AdminThemeController@create')->name('admin.theme.create');
    Route::post('/store_theme', 'AdminThemeController@store')->name('admin.theme.store');
    Route::get('/edit_theme/{id}', 'AdminThemeController@edit')->name('admin.theme.edit');
    Route::post('/update_theme/{id}', 'AdminThemeController@update')->name('admin.theme.update');
    Route::delete('/destroy_theme/{id}', 'AdminThemeController@destroy')->name('admin.theme.destroy');


    Route::get('/all_orders', 'AdminOrderController@index')->name('admin.all_orders');
    Route::get('/create_orders', 'AdminOrderController@create')->name('admin.create_orders');
    Route::patch('/update_orders/{id}', 'AdminOrderController@update')->name('admin.update_orders');
    Route::patch('/update_accept/{id}', 'AdminOrderController@accept')->name('admin.accept_orders');



    // Get in blade template ready order
    Route::get('/ready_order_{id}', 'AdminOrderController@edit')->name('admin.ready_order_template');



    Route::get('/all_users', 'AdminUserController@index')->name('admin.all_users');
    Route::get('/create_users', 'AdminUserController@create')->name('admin.create_users');
    Route::post('/store_users', 'AdminUserController@store')->name('admin.store_users');
    Route::get('/edit_users/{id}', 'AdminUserController@edit')->name('admin.edit_users');
    Route::patch('/update_users/{id}', 'AdminUserController@update')->name('admin.update_users');
    Route::delete('/destroy_users/{id}', 'AdminUserController@destroy')->name('admin.destroy_users');



    Route::get('/settings', 'AdminController@settings')->name('admin.settings');

});