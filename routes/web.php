<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

/*Route::get('/', function () {
    return view('welcome');
});*/
/*Route::get('/{locale?}', function ($locale = null) {
    if (isset($locale) && in_array($locale, config('app.available_locales'))) {
        app()->setLocale($locale);
    }
    return view('welcome');
});*/
Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function ()
{
    Route::get('/', [HomeController::class, 'redirect']);
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth'])->name('dashboard');
    Route::get('/linkstorage', function () {
        Artisan::call('storage:link');
    });
    Auth::routes();

});
Route::get('/gov', 'GovController@index');



/*Route::group(['prefix'=>'/gov','middleware'=>['guest']],function()
{
    Route::get('/', 'GovController@index');
});*/


require __DIR__.'/auth.php';
