<?php

namespace App\Http\Controllers;

use App\Models\Abonne;
use Illuminate\Http\Request;
use  App\Models\Emprunt;
use App\Models\Livre;
use PhpParser\Node\Stmt\TryCatch;
use RealRashid\SweetAlert\Facades\Alert;

class EmpruntController extends Controller{

    /*public function create(){
        $Abonnes = Abonne::orderBy('nom')->get();
        $Livres    = Livre::orderBy('titre')->get();
        return view('emprunts.create',['Abonnes'=> $Abonnes, 'livres'=>$Livres]);
    }*/

    public function add(){
        return view('emprunts.ajouter');
    }

    public function index($etat){
        if($etat == "tout"){
    	$emprunts = Emprunt::paginate(10);    
        return view('emprunts.index', ['emprunts'=>$emprunts]);
        }
        else if($etat == "rendu"){
            $emprunts = Emprunt::where('est_rendu',true)->paginate(10);
            return view('emprunts.index', ['emprunts'=>$emprunts]);
        }
        else if($etat == "non-rendu"){
            $emprunts = Emprunt::where('est_rendu',false)->paginate(10);
            return view('emprunts.index', ['emprunts'=>$emprunts]);
        }
        else if($etat == "date-limite-depasse"){
            $emprunts = Emprunt::where('date_fin','<',date(now()))->where('est_rendu',false)->paginate(10);
            return view('emprunts.index', ['emprunts'=>$emprunts]);
        }
    } 
    
    public function store($id_abonne, $isbns){
        foreach(explode('&',$isbns) as $isbn){
            $livre = Livre::where('ISBN', $isbn)->first();
            if(Emprunt::where('livres_id', $livre->id)->where('abonnes_id', $id_abonne)->where('est_rendu', false)->exists()){
                $emprunt = Emprunt::where('livres_id', $livre->id)->where('abonnes_id', $id_abonne)->where('est_rendu', false)->first();
                $emprunt->est_rendu = true;
                $emprunt->save();
            }
            else{
            $emprunt              = new Emprunt();
            $emprunt->date_debut  =  date(now());
            $emprunt->date_fin    =  date(now()->addDays(30));
            $emprunt->abonnes_id = $id_abonne;
            $emprunt->livres_id   = $livre->id;
            $emprunt->save();
            }
        }
        Alert::success('Succeès', "Enregistré avec succès!");
        return redirect('/emprunts/tout');
    }      
}
    