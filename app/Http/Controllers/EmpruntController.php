<?php

namespace App\Http\Controllers;

use App\Models\Abonnee;
use Illuminate\Http\Request;
use  App\Models\Emprunt;
use App\Models\Livre;

class EmpruntController extends Controller{

    public function create(){
        $abonnees  = Abonnee::orderBy('nom')->get();
        $Livres    = Livre::orderBy('titre')->get();
        return view('emprunts.create',['abonnees'=> $abonnees, 'livres'=>$Livres]);
    }

    public function index(){
    	$emprunts = Emprunt::paginate(10);    
        return view('emprunts.emprunt', ['emprunts'=>$emprunts]);
    } 
    
    public function store(Request $request){
        $livres   = $request->input('livre');
        $abonnee  = $request->input('abonnee');     
        $i = 0 ;
        $nombreLivreEmprunte =array();
        $nb = array();
        foreach($livres as $livre){ 
            $nombreLivreEmprunte[$i]   = Emprunt::where('livres_id','=',$livre)->count();
            $book       = Livre::find($livre); 
            $nb[$i] = $book->nombre_exemplaires_disponibles;
            $i++;
            dd($nb);       
    }      
        $i = 0;   
        foreach($livres as $livre){
            if( $nombreLivreEmprunte[$i] < $nb[$i] ){
                $emprunt              = new Emprunt();
                $emprunt->date_debut  =  date(now());
                $emprunt->date_fin    =  date(now());
                $emprunt->abonnes_id  = $abonnee;
                $emprunt->livres_id   = $livre;
                $emprunt->save();
                $i++;
            }else
                echo'err';       
        }   
        //return redirect('emprunts.emprunt');   
    }
}
    