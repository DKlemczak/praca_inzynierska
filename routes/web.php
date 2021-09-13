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

    Route::resource('dashboard/products', 'App\Http\Controllers\Dashboard\ProductsController', ['except'=>['show'], 'names' => [
        'index'   => 'dashboard.products.index'
    ]], ['except' => ['show']])->middleware(['auth', 'admin']);

    Route::resource('dashboard/products/{id}/photos', 'App\Http\Controllers\Dashboard\ProductPhotosController', ['except'=>['show'], 'names' => [
        'index'   => 'dashboard.products.photos.index',
        'create'  => 'dashboard.products.photos.create',
        'store'   => 'dashboard.products.photos.store',
        'destroy' => 'dashboard.products.photos.destroy'
    ]], ['except' => ['show']])->middleware(['auth', 'admin']);

});
