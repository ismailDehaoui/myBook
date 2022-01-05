<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Abonnee;
use  App\Models\Emprunt;
use RealRashid\SweetAlert\Facades\Alert;
class AbonneeController extends Controller{
    
    public function create(){
      return view('abonnees.create');
    }    
    
    public function profile($id){
        $abonnee  = Abonnee::find($id);
        $emprunts = Emprunt::where('id',$id)->paginate(5);
        return view('abonnees.profile',['abonnee'=>$abonnee,'emprunts'=>$emprunts]); 
    }
<<<<<<< HEAD
       // $emprunts = Emprunt::where('abonnees_id',$id)->paginate(5);
        //return view('abonnees.profile',['abonnee'=>$abonnee,'emprunts'=>$emprunts]); 
        //return view('abonnees.profile',['abonnee'=>$abonnee]);
      //}
=======
>>>>>>> 583c23ea7eaa59431b13bf6761a1665121feb0ae

    public function listAbonnees(){
    	$abonnee = Abonnee::paginate(3);
      return view('abonnees.abonnee', ['abonnees'=>$abonnee]);
    } 
    
    public function store(Request $request){   
      if (Abonnee::where('email', $request->input('email'))->exists()) {
<<<<<<< HEAD
             echo "Error";
        Alert::error('Email déja existe!');
=======
        Alert::error('Email déja existe!');
<<<<<<< HEAD
=======

>>>>>>> 583c23ea7eaa59431b13bf6761a1665121feb0ae
>>>>>>> 8a733361cc395c4e9eb08eef41553742baf93434
        }else{
        $abonnee                         = new Abonnee();
        $abonnee->nom           = $request->input('nom');
    	  $abonnee->prenom         = $request->input('prenom');
        $abonnee->email          = $request->input('email');
        $abonnee->adresse        = $request->input('adresse');
<<<<<<< HEAD
=======
<<<<<<< HEAD
        $abonnee->date = $request->input('date_naissance');       
=======

>>>>>>> 583c23ea7eaa59431b13bf6761a1665121feb0ae
>>>>>>> 8a733361cc395c4e9eb08eef41553742baf93434
        $abonnee->date_naissance = $request->input('date_naissance');       
        $filenameWithExt                 = $request->file('image')->getClientOriginalName();
        // Get just filename
        $filename                        = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        // Get just ext
        $extension                       = $request->file('image')->getClientOriginalExtension();
        // Filename to store
        $fileNameToStore                 = $filename.'_'.time().'.'.$extension;
        // Upload Image
        $path                            = $request->file('image')->storeAs('public/Admin', $fileNameToStore);
<<<<<<< HEAD
        $abonnee->photo                 = $fileNameToStore;
       // $abonnee->date_expiration        = date(NOW());
        $abonnee->photo                  = $fileNameToStore;
        
=======

        $abonnee->photo                 = $fileNameToStore;
       // $abonnee->date_expiration        = date(NOW());
>>>>>>> 583c23ea7eaa59431b13bf6761a1665121feb0ae
        $abonnee->created_at             = date(NOW());
        $abonnee->save();
        Alert::success('Abonnée est bien ajoutée');
    	  return redirect('/abonnees');
      }
    }

      public function edit($id){
    	$abonnee = Abonnee::find($id);
    	return view('abonnes.modifier', ['abonnee'=>$abonnee]);
    }

      public function update(Request $request,$id){
        if (Abonnee::where('email', $request->input('email'))->exists()) {
             echo "Error";
        }else{
        $abonnee                 = Abonnee::find($id);
        $abonnee->nom            = $request->input('nom');
        $abonnee->prenom         = $request->input('prenom');
        $abonnee->email          = $request->input('email');
        $abonnee->adresse        = $request->input('adresse');
        $abonnee->date_naissance = $request->input('date_naissance');
        $abonnee->updated_at     = date(NOW());
        $abonnee->save();
        Alert::success('Les modifications est bien ');
    	  return redirect('/abonnees');

      }
    }
}
