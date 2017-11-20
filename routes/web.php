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

//Route::get('/home', function ()
// SELECT cibles.numero, COUNT(*) FROM cibles INNER JOIN photos on photos.cible_id = cibles.id GROUP BY numero HAVING COUNT(*) <= 5
//SELECT COUNT(*) FROM experiences_cibles JOIN cibles ON cibles.id = experiences_cibles.cibles_id JOIN experiences ON experiences.id = experiences_cibles.experiences_id WHERE experiences.nom_operateur = "orange" AND cibles.compte_whatsapp = "oui"
// {
//    return view('home');
//})->name('home');

Route::get('profile', 'UserController@profile')->name('profile');
Route::post('profile', 'UserController@update_avatar');
//Route::get('remote', 'WebScraperController@getIndex');
Route::resource('experience', 'ExperienceController');

Route::get('listCible', 'CibleController@index');
Route::get('showCible', 'CibleController@show');
Route::post('updateCible', 'CibleController@update');
Route::get('listPhotos', 'CibleController@getPhotosCible');
Route::post('photosCible', 'PhotosCibleController@store');
Route::get('crawler', 'WebScrapingController@index');
Route::get('download', 'ExperienceController@getDownload');

Route::get('stats', 'StatsController@data')->name('stats');
Route::get('graphiques', function ()
{
    return view('stats.graph');
})->name('graphs');

Route::get('textuelles', function ()
{
    return view('stats.text');
})->name('texts');

//Route::get('/home', 'HomeController@index')->name('home');
