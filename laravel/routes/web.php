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

// Route::get('/', function () {
//     return view('welcome');
// })->name('home');

Route::get('/', 'AeriController@index')->name('home');
Route::get('/albums', 'AeriController@album')->name('album');
Route::get('/artist', 'AeriController@artist')->name('artist');
Route::get('/play/{id}', 'AeriController@listen')->name('listen');
Route::get('/about', 'AeriController@about')->name('about');

Auth::routes();

// nav home
Route::get('/admin', 'HomeController@index')->name('admin');

// nav songs
Route::get('/admin/songs', 'HomeController@songs')->name('songs');
Route::put('/admin/songs/{id}/save/', 'HomeController@songedit')->name('songedit');
Route::get('/admin/songs/mv', 'HomeController@mv')->name('mv');

// nav album
Route::get('/admin/albums', 'HomeController@albums')->name('albums');
Route::get('/admin/albums/tracks/{id}', 'HomeController@albumtracks')->name('tracks'); //detail tracks
Route::delete('/admin/albums/tracks/delete/{id}', 'HomeController@trackdelete')->name('trackdelete');
Route::get('/admin/albums/{id}/edit/', 'HomeController@albumedit')->name('albumedit'); // edit tracks
Route::put('/admin/albums/{id}/edit/save/', 'HomeController@editalbum')->name('editalbum'); // save edit album
Route::post('/admin/albums/{id}/edit/tracks/add/save/', 'HomeController@inserttrack')->name('inserttrack'); //save add track
Route::put('/admin/albums/edit/tracks/{id}/save/', 'HomeController@trackeditsave')->name('trackeditsave'); //save update track
Route::delete('/admin/albums/delete/{id}', 'HomeController@albumdelete')->name('albumdelete'); // delete album and all tracks related

// nav add new
Route::get('/admin/add/album', 'HomeController@addalbum')->name('addalbum');
Route::post('/admin/add/album/save', 'HomeController@insertalbum')->name('insertalbum');
Route::get('/admin/add/album/{id}/song', 'HomeController@addsong')->name('addsong');
Route::post('/admin/add/album/{id}/song/save', 'HomeController@insertsongs')->name('insertsongs');

