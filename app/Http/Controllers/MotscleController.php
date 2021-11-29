<?php

namespace App\Http\Controllers;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use App\Models\Motscle;

class MotscleController extends Controller
{
    public function store(Request $request){
        //Alert::success('Succeès', 'Mot Clé ajouté avec succès'.$request->all());
        $motcle = new Motscle();
        $motcle->motcle = $request->motcle;
        $motcle->save();    
        return $motcle;    
    }
}
