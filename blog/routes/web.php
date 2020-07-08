<?php

use App\Http\Controllers\HomeController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('post', 'HomeController@store')->name('post');
Route::post('post/update', 'HomeController@update')->name('update');
Route::get('post/edit/{post_id}', 'HomeController@edit')->name('edit');
Route::get('post/delete/{post_id}', 'HomeController@destroy')->name('destroy');
