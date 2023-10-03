<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;


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
Route::get('/home', [HomeController::class, 'index'])->name('home');


Route::get('/','UserController@listar');
Route::get('/form','UserController@userform');
Route::post('/save','UserController@save')->name('save');
Route::delete('/delete/{id}','UserController@delete')->name('delete');
Route::get('/editform/{id}','UserController@editform')->name('editform');
Route::patch('/edit/{id}','UserController@edit')->name('edit');
