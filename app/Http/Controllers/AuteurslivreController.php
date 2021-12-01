<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Auteurslivre;

class AuteurslivreController extends Controller
{
    public function store($auteurs, $id_livre){
        foreach($auteurs as $auteur){
            $auteurslivre = new Auteurslivre();
            $auteurslivre->livres_id = $id_livre;
            $auteurslivre->auteurs_id = $auteur;
            $auteurslivre->save();
        }
    }
    

    public function update($auteurs, $livre){

        $auteurslivre = $livre->hasMany(Auteurslivre :: class);

        foreach($auteurslivre as $auteurlivre){
            Auteurslivre::where('id', $auteurlivre->id)->delete();
        }

        foreach($auteurs as $auteur){
            $auteurslivre = new Auteurslivre();
            $auteurslivre->livres_id = $livre->id;
            $auteurslivre->auteurs_id = $auteur;
            $auteurslivre->save();
        }
    }

}
