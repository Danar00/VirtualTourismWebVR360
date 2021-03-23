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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'UserController@index');
Route::get('/user-panorama/{namaPanorama}', 'UserController@goto');

Route::get('/login', 'AdminController@login');
Route::post('/loginPost', 'AdminController@loginPost');
Route::get('/logout', 'AdminController@logout');

Route::get('/register', 'AdminController@register');
Route::post('/registerPost', 'AdminController@registerPost');

Route::get('/admin', 'AdminController@admin');

Route::get('/tambah-kampung', 'AdminController@getTambahKampung');
Route::post('/admin', 'AdminController@setTambahKampung');
Route::delete('/admin/{id}', 'AdminController@destroy');

Route::get('/edit-kampung/{id}', 'AdminController@editKampung');
Route::put('/editkampungput/{id}', 'AdminController@updateKampung');

Route::get('/panorama/{key_kampung}', 'AdminController@getPanorama');

Route::get('panorama/{key_kampung}/tambah-panorama', 'AdminController@getTambahPanorama');
Route::post('/panorama/{key_kampung}', 'AdminController@setTambahPanorama');
Route::delete('/panoramadestroy/{key_panorama}', 'AdminController@destroyPanorama');

Route::get('/panorama-edit/{key_panorama}', 'AdminController@getEditPanorama');
Route::put('/panorama-editPut/{id}', 'AdminController@updatePanorama');

Route::get('/informasi/{panorama_id}', 'AdminController@getInformasi');

Route::get('/informasi/{panorama_id}/tambah-deskripsi', 'AdminController@getTambahDeskripsi');
Route::post('/informasi/{panorama_id}', 'AdminController@setTambahDeskripsi');

Route::get('/deskripsi-edit/{informasi_id}', 'AdminController@getEditDeskripsi');
Route::put('/deskripsi-editPut/{id}', 'AdminController@updateDeskripsi');

Route::delete('/deskripsidestroy/{id}', 'AdminController@destroyDeskripsi');

Route::get('/informasi/{key_panorama}/pindah-spot', 'AdminController@getPindahSpot');
Route::post('/informasiPost/{panorama_id}/', 'AdminController@setPindahSpot');

Route::get('/pindahSpot-edit/{id}', 'AdminController@getEditPindahSpot');
Route::put('/pindahSpot-editPut/{id}', 'AdminController@updatePindahSpot');

Route::delete('/pindahspotdestroy/{id}', 'AdminController@destroyPindahSpot');

Route::get('/aframe-asset', function () {
    return view('aframe');
});
