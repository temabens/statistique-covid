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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});

Route::resource('/wilaya','wilayacontroller');
Route::resource('/tag','tagController');
Route::resource('/source','sourceController');
Route::resource('/malade','maladecontroller');
Route::resource('/profession','professionController');
Route::resource('/post','postController');
Route::resource('/stat','statController');
Route::get('/carte', 'StatsController@affData');

Route::post('statistique/algeria',['uses' => 'statController@store','as' => 'state.store']);