<?php

use Illuminate\Support\Facades\Route;

<<<<<<< HEAD
=======

>>>>>>> 816580ea891486fc62044bf0827b3524245b0970
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\LivreController;
use App\Http\Controllers\AbonneeController;
<<<<<<< HEAD
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuteurController;
=======
>>>>>>> 816580ea891486fc62044bf0827b3524245b0970

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

<<<<<<< HEAD
=======

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

>>>>>>> 816580ea891486fc62044bf0827b3524245b0970
//categories

Route::get('/cat', function () {
    return view('categorie.categories');
});
Route::get('/ajoutercat', function () {
    return view('categorie.ajoutercat');
});

Route::get('/acceuil', function () {
    return view('layouts.master');
});
Route::get('/dashboard', function () {
    return view('layouts.dashboard');
});
Route::get('/afficherLivres/{id}',[LivreController::class,'afficherLivres']);

Route::get('/categories',[CategorieController::class,'listCategories']);
//Route::get('/{n}','CategorieController@nlistCategories');
Route::post('ajouter',[CategorieController::class,'store']);
Route::put('modifier/{id}',[CategorieController::class,'update']);
Route::get('mod/{id}/edit',[CategorieController::class,'edit']);
Route::get('/supprimer{id}',[CategorieController::class,'supp']);
Route::get('/confirmersupp/{id}',[CategorieController::class,'confirm']);



//routes livres

Route::get('livres', 'LivreController@index');
Route::get('livres/ajouter', 'LivreController@create');
Route::post('livres', 'LivreController@store');
Route::get('livres/{id}/modifier', 'LivreController@edit');
Route::put('livres/{id}', 'LivreController@update');
Route::delete('livres/{id}', 'LivreController@destroy');

<<<<<<< HEAD


//Auteur



Route::post('auteurs','AuteurController@store')->name('auteurs.ajouter');



=======
>>>>>>> 816580ea891486fc62044bf0827b3524245b0970
//MotCle

Route::post('motscles', 'MotscleController@store')->name('motscles.ajouter');


//Abonnées
Route::get('/abonnees','AbonneeController@listAbonnees');
Route::get('abonnée/créer','AbonneeController@create');
Route::get('abonnée/{id}/profile', 'AbonneeController@profile');
Route::post('abonnée/ajouterAbonnée','AbonneeController@store');
Route::put('modifier/{id}','AbonneeController@update');    
Route::get('mod/{id}/edit','AbonneeController@edit');

//Emprunts
Route::get('emprunts','EmpruntController@index');
Route::get('emprunts/créer', 'EmpruntController@create');
Route::post('emprunts/ajouter', 'EmpruntController@store');

//authentification

Route::get('/deconnexion','UserController@logout');

Route::get('/affgest','UserController@listGest');
Route::get('/ajoutergestionnaire',function(){
	return view('authentification.ajoutergest');
});
Route::post('/ajoutgest',[UserController::class,'store']);
Route::get('/editgest{id}',[UserController::class,'editgest']);
Route::put('modifiergest/{id}',[UserController::class,'update']);

Route::get('/suppressiongest{id}',[UserController::class,'suppgest']);
Route::get('/confirmersuppgest{id}',[UserController::class,'confirmgest']);





//auth
Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
