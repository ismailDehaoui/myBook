<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Auteur;
use App\Models\Auteurslivre;
use App\Models\Livre;
use App\Models\Categorie;
use App\Models\Motscleslivre;
use Illuminate\Http\Request;

class frontendController extends Controller
{
    public function index(){
        
        $livresN = Livre::orderBy('created_at','desc')->take(6)->get();
        $livresV = Livre::orderBy('titre')->take(6)->get();
        $categories = Categorie::orderBy('created_at','desc')->take(3)->get();
        return view('Frontend.index',['livresN'=>$livresN,'livresV'=>$livresV,'categories'=>$categories]);
    }
    
    public function search(Request $request){
        $auteurs = Auteur::orderBy('nom')->get();
        
        $titre   = $request->input('titre');
        $langue  = $request->input('langue');
        $auteur =  $request->input('auteur');
        $motCle =  $request->input('mot-clé');
        $motCles = array();
        $motCles = explode(',',$motCle,PHP_INT_MAX);

        
        if(empty($titre)       && empty($langue)  && empty($auteur)  && empty($motCle)){
            return redirect('/books');
        }elseif(!empty($titre) && empty($langue)  && empty($auteur)  && empty($motCle)){
            $livres = Livre::where('titre','like','%'.$titre.'%')
                            ->distinct()
                            ->paginate(10);
        }elseif(empty($titre)  && !empty($langue) && empty($auteur)  && empty($motCle)){
            $livres = Livre::where('langue','like','%'.$langue.'%')
                            ->distinct()
                            ->paginate(10);
        }elseif(empty($titre)  && empty($langue)  && !empty($auteur) && empty($motCle)){
            $livres = Livre::
                            join('auteurslivres','auteurslivres.livres_id','=','livres.id')
                            ->join('auteurs','auteurs.id','=','auteurslivres.auteurs_id')
                            ->where('nom','like','%'.$auteur.'%')
                            ->orderBy('titre')
                            ->distinct()                
                            ->paginate(10);
                            
        }elseif(empty($titre)  && empty($langue)  && empty($auteur)  && !empty($motCle)){
            foreach($motCles as $mot){
                $livres = Livre::join('motscleslivres','motscleslivres.livres_id','=','livres.id')
                            ->join('motscles','motscles.id','=','motscleslivres.motscles_id')
                            ->where('motcle','like','%'.$mot.'%')
                            ->orderBy('titre')
                            ->distinct()
                            ->paginate(10);
                        }
                        
        }elseif(!empty($titre) && !empty($langue) && empty($auteur)  && empty($motCle)){
            $livres = Livre::where('titre','like','%'.$titre.'%')
                            ->where('langue','like','%'.$langue.'%')
                            ->distinct()
                            ->paginate(10);
                           
        }elseif(!empty($titre) && empty($langue)  && !empty($auteur) && empty($motCle)){
            $livres = Livre::where('titre','like','%'.$titre.'%')
                            ->join('auteurslivres','auteurslivres.livres_id','=','livres.id')
                            ->join('auteurs','auteurs.id','=','auteurslivres.auteurs_id')
                            ->where('nom','like','%'.$auteur.'%')
                            ->distinct()
                            ->paginate(10);
        }elseif(empty($titre)  && !empty($langue) && empty($auteur)  && !empty($motCle)){
            foreach($motCles as $mot){
              $livres = Livre::where('langue','like','%'.$langue.'%')
                            ->join('motscleslivres','motscleslivres.livres_id','=','livres.id')
                            ->join('motscles','motscles.id','=','motscleslivres.motscles_id')
                            ->where('motcle','like','%'.$mot.'%')
                            ->distinct()
                            ->paginate(10);
            }            
                
        }elseif(empty($titre)  && empty($langue)  && !empty($auteur) && !empty($motCle)){
           
            foreach($motCles as $mot){
                    $livres = Livre::join('motscleslivres','motscleslivres.livres_id','=','livres.id')
                            ->join('motscles','motscles.id','=','motscleslivres.motscles_id')
                            ->where('motcle','like','%'.$mot.'%')
                            ->join('auteurslivres','auteurslivres.livres_id','=','livres.id')
                            ->join('auteurs','auteurs.id','=','auteurslivres.auteurs_id')
                            ->where('nom','like','%'.$auteur.'%')
                            ->orderBy('titre')
                            ->distinct()
                            ->paginate(10);
            }    
            
        }elseif(!empty($titre) && empty($langue)  && empty($auteur)  && !empty($motCle)){
            foreach($motCles as $mot){
                    $livres = Livre::where('titre','like','%'.$titre.'%')
                            ->join('motscleslivres','motscleslivres.livres_id','=','livres.id')
                            ->join('motscles','motscles.id','=','motscleslivres.motscles_id')
                            ->where('motcle','like','%'.$mot.'%')
                            ->distinct()
                            ->paginate(10);
            }  
                      
        }elseif(empty($titre)  && !empty($langue) && !empty($auteur) && empty($motCle)){
            $livres = Livre::where('langue','like','%'.$langue.'%')
                            ->join('auteurslivres','auteurslivres.livres_id','=','livres.id')
                            ->join('auteurs','auteurs.id','=','auteurslivres.auteurs_id')
                            ->where('nom','like','%'.$auteur.'%')
                            ->distinct()
                            ->paginate(10);
        }elseif(!empty($titre) && !empty($langue) && !empty($auteur) && empty($motCle)){
            $livres = Livre::where('titre','like','%'.$titre.'%')
                            ->where('langue','like','%'.$langue.'%')
                            ->join('auteurslivres','auteurslivres.livres_id','=','livres.id')
                            ->join('auteurs','auteurs.id','=','auteurslivres.auteurs_id')
                            ->where('nom','like','%'.$auteur.'%')
                            ->distinct()
                            ->paginate(10);
                            
        }elseif(!empty($titre) && empty($langue)  && !empty($auteur) && !empty($motCle)){
           
            foreach($motCles as $mot){
                 $livres = Livre::where('titre','like','%'.$titre.'%')
                            ->join('auteurslivres','auteurslivres.livres_id','=','livres.id')
                            ->join('auteurs','auteurs.id','=','auteurslivres.auteurs_id')
                            ->where('nom','like','%'.$auteur.'%')
                            ->join('motscleslivres','motscleslivres.livres_id','=','livres.id')
                            ->join('motscles','motscles.id','=','motscleslivres.motscles_id')
                            ->where('motcle','like','%'.$mot.'%')
                            ->distinct()
                            ->paginate(10);
            }  
               
        }elseif(!empty($titre) && !empty($langue) && empty($auteur)  && !empty($motCle)){
            
            foreach($motCles as $mot){
                $livres = Livre::where('titre','like','%'.$titre.'%')
                            ->where('langue','like','%'.$langue.'%')
                            ->join('motscleslivres','motscleslivres.livres_id','=','livres.id')
                            ->join('motscles','motscles.id','=','motscleslivres.motscles_id')
                            ->where('motcle','like','%'.$mot.'%')
                            ->distinct()
                            ->paginate(10);
                }        
        }elseif(empty($titre)  && !empty($langue) && !empty($auteur) && !empty($motCle)){
            foreach($motCles as $mot){
                 $livres = Livre::where('langue','like','%'.$langue.'%')
                            ->join('motscleslivres','motscleslivres.livres_id','=','livres.id')
                            ->join('motscles','motscles.id','=','motscleslivres.motscles_id')
                            ->where('motcle','like','%'.$mot.'%')
                            ->join('auteurslivres','auteurslivres.livres_id','=','livres.id')
                            ->join('auteurs','auteurs.id','=','auteurslivres.auteurs_id')
                            ->where('nom','like','%'.$auteur.'%')
                            ->distinct()
                            ->paginate(10);
                        }
                                
        }else{
            
            foreach($motCles as $mot){
                    $livres = Livre::where('titre','like','%'.$titre.'%')
                            ->where('langue','like','%'.$langue.'%')
                            ->join('motscleslivres','motscleslivres.livres_id','=','livres.id')
                            ->join('motscles','motscles.id','=','motscleslivres.motscles_id')
                            ->where('motcle','like','%'.$mot.'%')
                            ->join('auteurslivres','auteurslivres.livres_id','=','livres.id')
                            ->join('auteurs','auteurs.id','=','auteurslivres.auteurs_id')
                            ->where('nom','like','%'.$auteur.'%')
                            ->distinct()
                            ->paginate(10);
                    }
                           
        }
        $categoreis = Categorie::orderBy('nom')->get();
        return view ('Frontend.search',['categoreis'=>$categoreis,'livres'=>$livres,'auteurs'=> $auteurs]);
    }   
     
    public function livres(){
        $auteurs = Auteur::orderBy('nom')->get();
        $livres    = Livre::orderBy('titre')->paginate(10);
        $categoreis = Categorie::orderBy('nom')->get();
        return view ('Frontend.livres',['categoreis'=>$categoreis,'livres'=>$livres , 'auteurs'=>$auteurs]);   
    }
    public function urlLivre($titre){
        
            if(Livre::where('titre',$titre)->exists()){
               $livre = Livre::where('titre',$titre)->first();
             //  $auteurLivre = Auteurslivre::join('livres_id',$livre->id)->first();
              // $auteur = Auteur::join('');
               $categorie = Categorie::orderBy('nom')->first(); 
               $livres = Livre::where('categories_id',$categorie->id)->take(4)->get();
               return view('Frontend.livre',['livre'=>$livre, 'categorie'=>$categorie,'livres'=>$livres]); 
            }else{
                return redirect('/');
            }
        

    }
    
    public function categories(){
        $categories = Categorie::orderBy('nom')->get();
        return view('Frontend.categories', ['categories'=>$categories]);
    }
    public function livreCate($nom){
        $auteurs = Auteur::orderBy('nom')->get();
        $livres    = Livre::orderBy('titre')->get(); 
        $categoreis = Categorie::orderBy('nom')->get();
        if(Categorie::where('nom','=',$nom)->exists()){
            $categorie =  Categorie::where('nom','=',$nom)->first();
            $livres = Livre::where('categories_id','=',$categorie->id)->paginate(4);
            return view('Frontend.livreCate',['categoreis'=>$categoreis,'categorie'=>$categorie,'livres'=>$livres,'auteurs'=>$auteurs]);
        }else{
            return redirect('/');
        }
    }

    public function livreView($titre){    
            
            if(Livre::where('titre',$titre)->exists()){
                
                $categoreis = Categorie::orderBy('nom')->get();
                
               $livre       = Livre::where('titre',$titre)->first();
               
               $auteurLivre = Auteurslivre::join('auteurs','auteurs.id','=','auteurslivres.auteurs_id')
                                            ->where('auteurslivres.livres_id','=',$livre->id)
                                            ->get();
               
                $auteur     = Auteurslivre::join('auteurs','auteurs.id','=','auteurslivres.auteurs_id')
                                            ->where('auteurslivres.livres_id','=',$livre->id)
                                            ->first();
               
                                            
                $motCles    = Motscleslivre::join('motscles','motscles.id','=','motscleslivres.motscles_id')
                                        ->where('motscleslivres.livres_id','=',$livre->id)
                                        ->get();
                                           
               $categorie   = Categorie::orderBy('nom')
                                        ->join('livres','livres.categories_id','=','categories.id')
                                        ->where('categories.id','=',$livre->categories_id)->first(); 
               
               $livres      = Livre::orderBy('titre')
                              ->join('auteurslivres','livres.id','=','auteurslivres.livres_id')
                              ->where('auteurslivres.auteurs_id','=',$auteur->id)   
                              ->take(3)
                              ->get();
               
                return view('Frontend.livreView',['livre'=>$livre,'categoreis'=>$categoreis, 'caregorie'=>$categorie,'livres'=>$livres,'auteurs'=>$auteurLivre, 'motsCles'=>$motCles]); 
            }else{
                return redirect('/');
            }
        

    }
}
