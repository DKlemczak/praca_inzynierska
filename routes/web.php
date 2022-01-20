<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/', "App\Http\Controllers\SiteController@index")->name('index');

Route::get('/deklaracja-dostepnosci', "App\Http\Controllers\SiteController@ad")->name('ad');
Route::get('/tos', "App\Http\Controllers\SiteController@tos")->name('tos');
Route::get('/o-nas', "App\Http\Controllers\SiteController@about")->name('about');
Route::get('/kontakt', "App\Http\Controllers\ContactController@index")->name('contact');

Route::get('/aktualnosci', "App\Http\Controllers\NewsController@index")->name('news.index');
Route::get('/aktualnosci/{id}-{title}', "App\Http\Controllers\NewsController@details")->name('news.details');
Route::get('/wideo-test', "App\Http\Controllers\SiteController@wideotest")->name('video-test');

Route::group(['middleware' => 'admin'], function ()
{
    Route::get("/dashboard", "App\Http\Controllers\Dashboard\DashboardController@index")->name('dashboard');

    Route::resource('dashboard/news', 'App\Http\Controllers\Dashboard\NewsController', ['except'=>['show'], 'names' => [
        'index'   => 'dashboard.news.index',
        'create'  => 'dashboard.news.create',
        'store'   => 'dashboard.news.store',
        'edit'    => 'dashboard.news.edit',
        'update'  => 'dashboard.news.update',
        'destroy' => 'dashboard.news.destroy'
    ]], ['except' => ['show']])->middleware(['auth', 'admin']);

    Route::post('file/upload/news', 'App\Http\Controllers\Dashboard\UploadImageController@storeImageNews')->name('file.upload.post');

    Route::resource('dashboard/staticsites', 'App\Http\Controllers\Dashboard\StaticSitesController', ['except'=>['show'], 'names' => [
        'index'   => 'dashboard.staticsites.index',
        'create'  => 'dashboard.staticsites.create',
        'store'   => 'dashboard.staticsites.store',
        'edit'    => 'dashboard.staticsites.edit',
        'update'  => 'dashboard.staticsites.update',
        'destroy' => 'dashboard.staticsites.destroy'
    ]], ['except' => ['show']])->middleware(['auth', 'admin']);

    Route::resource('dashboard/contact', 'App\Http\Controllers\Dashboard\ContactController', ['except'=>['show'], 'names' => [
        'index'   => 'dashboard.contact.index',
        'update'  => 'dashboard.contact.update'
    ]], ['except' => ['show']])->middleware(['auth', 'admin']);
});

