<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('/admin',[])
Route::group(['prefix'=>'admin'], function(){
//    Route::get('/', [App\Http\Controllers\Backend\DashboardController::class])->name('index');
//    Route::get('connect', 'QuoteController@create')->name('create');
    Route::get('/', [Backend\DashboardController::class,"index"])->name('index');
    Route::resource('roles',Backend\RolesController::class);
});
