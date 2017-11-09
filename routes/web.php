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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

//Route::get('/home', function () {
//    return view('home');
//})->name('home');

Route::get('profile', 'UserController@profile')->name('profile');
Route::post('profile', 'UserController@update_avatar');
Route::get('remote', 'WebScraperController@getIndex');
Route::resource('experience', 'ExperienceController');

//Route::get('/home', 'HomeController@index')->name('home');
