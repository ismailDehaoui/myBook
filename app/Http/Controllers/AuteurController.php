<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use App\Models\Auteur;
=======
>>>>>>> 19a07d2e862c8323cd6cc8d1b4c4b57daa37a495
use Illuminate\Http\Request;

class AuteurController extends Controller
{
    public function store(Request $request){
        //Alert::success('Succeès', 'Mot Clé ajouté avec succès'.$request->all());
        if (Auteur::where('nom', $request->auteur_name)->exists()) {
            return response()->json(['code'=>0, 'msg'=>'Auteur existe déja.']);
        }
        else{
            $auteur = new Auteur();
            $auteur->nom = $request->auteur_name;
            $query = $auteur->save();
            if(!$query){
                return response()->json(['code'=>0, 'msg'=>'Quelque chose ne va pas.']);
            } 
            else{
                return response()->json(['code'=>1, 'msg'=>'Un nouveau auteur a été ajouté.', 'auteurAdded'=>$request->auteur_name, 'idAuteur'=>$auteur->id]);
            }
        }    
    }
    //
}
