<?php

namespace App\Http\Controllers;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use App\Models\Motscle;


class MotscleController extends Controller
{
    public function store(Request $request){
        //Alert::success('Succeès', 'Mot Clé ajouté avec succès'.$request->all());

        if (Motscle::where('motcle', $request->motcle_name)->exists()) {
            return response()->json(['code'=>0, 'msg'=>'Mot cle existe déja.']);
        }
        else{
            $motcle = new Motscle();
            $motcle->motcle = $request->motcle_name;
            $query = $motcle->save();
            if(!$query){
                return response()->json(['code'=>0, 'msg'=>'Quelque chose ne va pas.']);
            } 
            else{
                return response()->json(['code'=>1, 'msg'=>'Un nouveau mot cle a été ajouté.', 'keyWordAdded'=>$request->motcle_name, 'idKeyword'=>$motcle->id]);
            }
        }    
    }
}
