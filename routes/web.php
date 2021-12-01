<?php

use Illuminate\Support\Facades\Route;
<<<<<<< HEAD

=======
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\LivreController;
use App\Http\Controllers\AbonneeController;
>>>>>>> 5af81ea2dc22088dc610f6ce83ffe293839f7f35

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



<<<<<<< HEAD
//routes catégories

Route::get('catégories', 'CategorieController@index');
Route::get('catégories/ajouter', 'CategorieController@create');
Route::post('catégories', 'CategorieController@store');
Route::get('catégories/{id}/modifier', 'CategorieController@edit');
Route::put('catégories/{id}', 'CategorieController@update');
Route::delete('catégories/{id}', 'CategorieController@destroy');
=======
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
>>>>>>> 5af81ea2dc22088dc610f6ce83ffe293839f7f35


//routes livres

Route::get('livres', 'LivreController@index');
Route::get('livres/ajouter', 'LivreController@create');
Route::post('livres', 'LivreController@store');
Route::get('livres/{id}/modifier', 'LivreController@edit');
Route::put('livres/{id}', 'LivreController@update');
Route::delete('livres/{id}', 'LivreController@destroy');

<<<<<<< HEAD

=======
>>>>>>> 5af81ea2dc22088dc610f6ce83ffe293839f7f35
//MotCle

Route::post('motscles', 'MotscleController@store');

<<<<<<< HEAD
//Abonnées
Route::get('/abonnées','AbonneeController@listAbonnees');
Route::get('abonnée/créer','AbonneeController@create');
Route::get('abonnée/{id}/profile', 'AbonneeController@profile');
Route::post('abonnée/ajouterAbonnée','AbonneeController@store');
Route::put('modifier/{id}','AbonneeController@update');    
Route::get('mod/{id}/edit','AbonneeController@edit');

//Emprunts
Route::get('emprunts','EmpruntController@index');
Route::get('emprunts/créer', 'EmpruntController@create');
Route::post('emprunts/ajouter', 'EmpruntController@store');
=======

>>>>>>> 5af81ea2dc22088dc610f6ce83ffe293839f7f35



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
