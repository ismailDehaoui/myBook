<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Categorie;
use App\Models\Livre;

use function GuzzleHttp\Promise\each;

class CategorieController extends Controller
{
    //Lister les categories
    public function index(){
        $categories = Categorie::all();
        return view('categorie.index', ['categories'=>$categories]);
    }

    //Affiche le formulaire d'ajout de livres
    public function create(){
        return view('categorie.create');
    }

    //Enregistrer un livre
    public function store(Request $request){
        $categorie = new Categorie();
        $categorie->nom = $request->input('nom-categorie');
        $categorie->save();
    }

    //Recuperer un livre uis le saisir dans le formulaire
    public function edit(){

    }

    //Modifier un livre
    public function update(){

    }

    //Supprimer un livre
    public function destroy($id){
        $categorie = Categorie::find($id);
        //$livres = Livre::where('categories_id', $id)->all();
        $categorie->delete();
        
        return redirect('catégories');
    }

}
