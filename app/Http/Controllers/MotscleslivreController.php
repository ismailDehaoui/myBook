<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Motscleslivre;

class MotscleslivreController extends Controller
{
    public function store($motscles, $id_livre){
        foreach($motscles as $motcle){
            $motscleslivre = new Motscleslivre();
            $motscleslivre->livres_id = $id_livre;
            $motscleslivre->motscles_id = $motcle;
            $motscleslivre->save();
        }
    }

    public function update($motscles, $livre){

        $motscleslivre = $livre->hasMany(Motscleslivre :: class);

        foreach($motscleslivre as $motclelivre){
            Motscleslivre::where('id', $motclelivre->id)->delete();
        }

        foreach($motscles as $motcle){
            $motscleslivre = new Motscleslivre();
            $motscleslivre->livres_id = $livre->id;
            $motscleslivre->motscles_id = $motcle;
            $motscleslivre->save();
        }
    }
}
