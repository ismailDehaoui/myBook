<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\LivreController;
use App\Http\Controllers\AbonneeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuteurController;


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

// Dashboard
Route::get('/dash',[UserController::class,'index']);

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
Route::get('livres/{id}/qrcode', 'QrCodeController@qrCodeLivre');
Route::get('livres/getlivre/{isbn}', 'LivreController@getLivreAjax');



//Auteur



Route::post('auteurs','AuteurController@store')->name('auteurs.ajouter');

//MotCle

Route::post('motscles', 'MotscleController@store')->name('motscles.ajouter');
Route::post('motscles/{id}/supprimer', 'MotscleController@destroy')->name('motscles.supprimer');




//Emprunts
Route::get('emprunts/ajouter', 'EmpruntController@add');
Route::get('emprunts/{etat}','EmpruntController@index');
Route::get('emprunts/créer', 'EmpruntController@create');
Route::get('emprunts/getabonne/{id}', 'AbonneController@getAbonneAjax');
Route::get('emprunts/enregistrer/{id_abonne}/{isbns}', 'EmpruntController@store');

//authentification

Route::get('/deconnexion','UserController@logout');

Route::get('/affgest','UserController@listGest');
Route::get('/ajoutergestionnaire',function(){
	return view('authentification.ajoutergest');
});
Route::post('/ajoutgest',[UserController::class,'store']);
Route::get('/editgest{id}',[UserController::class,'editgest']);
Route::put('modifiergest/{id}',[UserController::class,'update']);
Route::put('modifierpass/{id}',[UserController::class,'postProfilePassword']);

Route::get('user/{id}/profile',[UserController::class,'profile']);
Route::get('/modifierprofile{id}',[UserController::class,'editprofile']);
Route::get('/modifierpassword{id}',[UserController::class,'editpassword']);
Route::get('/suppressiongest{id}',[UserController::class,'suppgest']);
Route::get('/confirmersuppgest{id}',[UserController::class,'confirmgest']);

//Auteur

Route::post('auteurs', 'AuteurController@store')->name('auteurs.ajouter');
Route::delete('auteurs/{id}', 'AuteurController@destroy')->name('auteurs.supprimer');

//Abonnés

Route::get('abonnés','AbonneController@index');

Route::get('abonnés/ajouter','AbonneController@create');

Route::get('abonnée/{id}/profile', 'AbonneController@profile');

Route::post('abonnés','AbonneController@store');

Route::put('abonnés/{id}/update','AbonneController@update');    

Route::get('abonnés/{id}/edit','AbonneController@edit');

Route::get('abonnés/{id}/qrcode', 'QrCodeController@qrCodeAbonne');

//QrCode

Route::get('/generate-qrcode', 'QrCodeController@index');

//Histo
Route::put('/res{id}',[CategorieController::class,'restore']);
Route::get('/histo',function(){
	return view('Historique.histo');
});
Route::get('/catsupp',[CategorieController::class,'listCategoriesupp']);
Route::get('/gestsupp',[UserController::class,'listGestsupp']);
Route::put('/gestres{id}',[UserController::class,'restoregest']);

Route::get('/abonsupp',[AbonneeController::class,'listAbonsupp']);
Route::put('/abonres{id}',[AbonneeController::class,'restoreabon']);
Route::get('/lsupp',[LivreController::class,'listLivressupp']);







//auth
Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
 