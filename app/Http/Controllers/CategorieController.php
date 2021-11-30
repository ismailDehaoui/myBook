<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
class CategorieController extends Controller
{
   public function listCategories($n=0){
        $cat = Categorie::paginate(3);
        return view('categorie.categories', ['categories'=>$cat],['n'=>$n]);
    } 
    public function listCategoriesupp(){
      
      $cat = Categorie::onlyTrashed()->paginate(3);
        return view('categorie.categoriesupp', ['categories'=>$cat]);
    } 
    /* public function nlistCategories($ncat){
      
      $cat = Categorie::paginate($ncat);
        return view('categorie.categories', ['categories'=>$cat]);
    } */
   public function store(Request $request){
        if (Categorie::where('nom', $request->input('nom'))->exists()) {
            Alert::error('Categorie déja existe!');
            return redirect('/ajoutercat');
        }
        else{
        $cat = new Categorie();
        $cat->nom = $request->input('nom');
        $cat->created_at =date(NOW());
        $cat->save();
       Alert::success('Categorie est bien ajoutée');
        return redirect('/ajoutercat');
      }}

      
      public function edit($id){
        $cat = Categorie::find($id);
        return view('categorie.modifiercat', ['cat'=>$cat]);
    }

       public function update(Request $request,$id){
        if (Categorie::where('nom', $request->input('nom'))->exists()) {
             Alert::error('Categorie déja existe');
             return redirect('/categories');
        }
        else{
        $cat = Categorie::find($id);
        $cat->nom = $request->input('nom');
        $cat->updated_at =date(NOW());
        $cat->save();
       Alert::success('Categorie est bien modifiée');
        return redirect('/categories');
      }}
  function supp($id){
   Alert::error('Etes vous sure?','La categorie sera supprimée!')->showConfirmButton('<a class=""  href="/confirmersupp/'.$id.'" >
                            <input type="hidden" name="afficher">Supprimer
                        </a>', '#a085d6a')->toHtml()->showCancelButton('Annuler', '#aaa')->reverseButtons();
   return redirect('/categories');
  }
  function restore($id=null){
    $r = Categorie::withTrashed()->where('id',$id);
    $r->restore();
     Alert::success('Categorie est bien restaurée');
    return redirect('/catsupp');
  }
  function confirm($id){
       $l = Categorie::find($id);
       $l->delete();
       return redirect('/categories');
  }
}
