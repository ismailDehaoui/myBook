<?php

namespace App\Http\Controllers;

use App\Models\Auteur;
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



    public function destroy($id){
           

        /* if(Motscleslivre::where('motscles_id' ,$id)->exists()) {
             return response()->json(['code'=>0, 'msg'=>'Le mot clé est déja relié à 1 ou plusieurs livres, impossible de le supprimer!.']);
         }
         else{*/
             $auteur = Auteur::find($id);
             $auteur->delete();
             return response()->json(['code'=>1, 'msg'=>'Auteur supprimé avec succès.']);   
        // }             
 
     }
}
