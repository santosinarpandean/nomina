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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/','IndexController@dashboard');

Auth::routes();

Route::get('/home', 'IndexController@dashboard')->name('home');
Route::get('/transfer','IndexController@transfer');
Route::POST('/do-transfer','IndexController@doTransfer');

//mutasi
Route::get('/mutasi','IndexController@mutasi');

Route::get('logout',function(){
    auth()->logout();
    return redirect()->to('/');
});