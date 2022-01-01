<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;
use App\Models\Livre;
use App\Models\User;

use RealRashid\SweetAlert\Facades\Alert;

class SearchController extends Controller
{
   function CatSearch(Request $req){
   	$rec = $req->input('Search');
   	$find1 = Categorie::where('nom','like','%'.$rec.'%')->orderBy('id')->paginate(5);if(!empty($find1))
    	return view('categorie.categories', ['categories'=>$find1]);
   }
  function UtiSearch(Request $req){
    $rec = $req->input('Search');
    $find1 = User::where('name','like','%'.$rec.'%')->orderBy('id')->paginate(5);
    if(!empty($find1)){
      return view('authentification.affichergest', ['gestionnaire'=>$find1]);
    }
    else{
        Alert::error('Rien en commun!');
   }}
   function BookSearch(Request $req){
    $rec = $req->input('Search');
    $find1 = Livre::where('titre','like','%'.$rec.'%')->orWhere('ISBN','like','%'.$rec.'%')->orWhere('editeur','like','%'.$rec.'%')->orWhere('annee','like','%'.$rec.'%')->orWhere('langue','like','%'.$rec.'%')->orderBy('id')->paginate(5);
    if(!empty($find1)){
      return view('livre.index', ['livres'=>$find1]);
    }
    else{
        Alert::error('Rien en commun!');
   }}
}
