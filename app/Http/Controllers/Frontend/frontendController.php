<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Auteur;
use App\Models\Auteurslivre;
use App\Models\Livre;
use App\Models\Categorie;
use Illuminate\Http\Request;

class frontendController extends Controller
{
    public function index(){
        $livres = Livre::orderBy('created_at','desc')->take(4)->get();
        return view('Frontend.index',['livres'=>$livres]);
    }
    public function search(Request $request){

        $livres    = Livre::where('titre','like','%'.$request->search.'%')
        ->orWhere('editeur','like','%'.$request->search.'%')
        ->orWhere('isbn','like','%'.$request->search.'%')
        ->orWhere('langue','like','%'.$request->search.'%')
        ->orWhere('annee','like','%'.$request->search.'%')->get();
        $categories = Categorie::where('nom','like','%'.$request->search.'%')->get();
        $categoreis = Categorie::orderBy('nom')->get();
        return view ('Frontend.search',['categoreis'=>$categoreis,'categories'=>$categories,'livres'=>$livres]);
    }    
    public function livres(){
        $livres    = Livre::orderBy('titre')->get();
        $categoreis = Categorie::orderBy('nom')->get();
        return view ('Frontend.livres',['categoreis'=>$categoreis,'livres'=>$livres]);   
    }
    public function urlLivre($nom,$titre){
        if(Categorie::where('nom','=',$nom)->exists()){
            if(Livre::where('titre',$titre)->exists()){
               $livre = Livre::where('titre',$titre)->first();
             //  $auteurLivre = Auteurslivre::join('livres_id',$livre->id)->first();
              // $auteur = Auteur::join('');
               $categorie = Categorie::where("nom",$nom)->first(); 
               $livres = Livre::where('categories_id',$categorie->id)->take(4)->get();
               return view('Frontend.livre',['livre'=>$livre, 'caregorie'=>$categorie,'livres'=>$livres]); 
            }else{
                return redirect('/');
            }
        }else{
            return redirect('/');
        }

    }
    
    public function categories(){
        $categories = Categorie::orderBy('nom')->get();
        return view('Frontend.categories', ['categories'=>$categories]);
    }
    public function livreCate($nom){
        $categoreis = Categorie::orderBy('nom')->get();
        if(Categorie::where('nom','=',$nom)->exists()){
            $categorie =  Categorie::where('nom','=',$nom)->first();
            $livres = Livre::where('categories_id','=',$categorie->id)->get();
            return view('Frontend.livreCate',['categoreis'=>$categoreis,'categorie'=>$categorie,'livres'=>$livres]);
        }else{
            return redirect('/');
        }
    }

    public function livreView($nom,$titre){
        if(Categorie::where('nom','=',$nom)->exists()){
            if(Livre::where('titre',$titre)->exists()){
               $livre = Livre::where('titre',$titre)->first();
               $auteurLivre = Auteurslivre::join('auteurs','auteurs.id','=','auteurslivres.auteurs_id')->where('auteurslivres.livres_id','=','livre.'.$livre->id)->get();
               $categorie = Categorie::where("nom",$nom)->first(); 
               $livres = Livre::where('categories_id',$categorie->id)->take(4)->get();
               return view('Frontend.livreView',['livre'=>$livre, 'caregorie'=>$categorie,'livres'=>$livres,'auteurs'=>$auteurLivre]); 
            }else{
                return redirect('/');
            }
        }else{
            return redirect('/');
        }

    }
}
