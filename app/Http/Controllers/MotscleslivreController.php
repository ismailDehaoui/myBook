<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Motscleslivre;

class MotscleslivreController extends Controller
{

    public static function checkMotCle($id){
        if(Motscleslivre::where('motscles_id', '=' ,$id)->exists()) {
            return true;
        }
        else{
            return false;
        }
    }


    public function store($motscles, $id_livre){
        foreach($motscles as $motcle){
            $motscleslivre = new Motscleslivre();
            $motscleslivre->livres_id = $id_livre;
            $motscleslivre->motscles_id = $motcle;
            $motscleslivre->save();
        }
    }

    public function update($motscles, $livre){

        $motscleslivre = Motscleslivre::where('livres_id', $livre->id)->get();

        foreach($motscleslivre as $motclelivre){
            $motclelivre->delete();
        }

        foreach($motscles as $motcle){
            $motscleslivre = new Motscleslivre();
            $motscleslivre->livres_id = $livre->id;
            $motscleslivre->motscles_id = $motcle;
            $motscleslivre->save();
        }
    }
}
