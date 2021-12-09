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


/*Route::get('/', function () {
    return view('welcome');
});*/



//routes catégories

Route::get('catégories', 'CategorieController@index');
Route::get('catégories/ajouter', 'CategorieController@create');
Route::post('catégories', 'CategorieController@store');
Route::get('catégories/{id}/modifier', 'CategorieController@edit');
Route::put('catégories/{id}', 'CategorieController@update');
Route::delete('catégories/{id}', 'CategorieController@destroy');


//routes livres

Route::get('livres', 'LivreController@index');
Route::get('livres/ajouter', 'LivreController@create');
Route::post('livres', 'LivreController@store');
Route::get('livres/{id}/modifier', 'LivreController@edit');
Route::put('livres/{id}', 'LivreController@update');
Route::delete('livres/{id}', 'LivreController@destroy');

//MotCle

Route::post('motscles', 'MotscleController@store')->name('motscles.ajouter');

//Auteur

Route::post('auteurs', 'AuteurController@store')->name('auteurs.ajouter');

//Abonnées

Route::get('/abonnés','AbonneController@index');

Route::get('abonnés/ajouter','AbonneController@create');

Route::get('abonnée/{id}/profile', 'AbonneController@profile');

Route::post('abonnés','AbonneController@store');

Route::put('modifier/{id}','AbonneController@update');    

Route::get('mod/{id}/edit','AbonneController@edit');

//Route::get('abonnés/{id}/qrcode', 'QrCodeController@index');

//QrCode

Route::get('/generate-qrcode', 'QrCodeController@index');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
