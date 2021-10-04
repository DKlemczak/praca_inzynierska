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

    Route::resource('dashboard/contact', 'App\Http\Controllers\Dashboard\ContactController', ['except'=>['show'], 'names' => [
        'index'   => 'dashboard.contact.index',
        'update'  => 'dashboard.contact.update'
    ]], ['except' => ['show']])->middleware(['auth', 'admin']);
});

