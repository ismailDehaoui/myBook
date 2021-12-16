<?php

namespace App\Http\Controllers;
use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Http\Request;
use App\Models\Abonne;

class AbonneController extends Controller
{
    public function index(){
    	$abonnes = Abonne::paginate(10);
        return view('abonne.index', ['abonnes'=>$abonnes]);
    } 

    public function create(){
        return view('abonne.add');
      }    

      public function store(Request $request){   
        if (Abonne::where('email', $request->input('email'))->exists()) {
               echo "Error";
          }else{
<<<<<<< HEAD
          $abonne                          = new Abonne();
          $abonne->nom                     = $request->input('nom');
          $abonne->prenom                  = $request->input('prenom');
          $abonne->email                   = $request->input('email');
          $abonne->adresse                 = $request->input('adresse');
          $abonne->date_naissance          = $request->input('date_naissance');       
=======
          $abonne                         = new Abonne();
          $abonne->nom            = $request->input('nom');
            $abonne->prenom         = $request->input('prenom');
          $abonne->email          = $request->input('email');
          $abonne->adresse        = $request->input('adresse');
          $abonne->date_naissance = $request->input('date_de_naissance');       
>>>>>>> 8e80a422cf336dbc5705d2c63612d3eee5b7fd2d
          $filenameWithExt                 = $request->file('image')->getClientOriginalName();
          // Get just filename
          $filename                        = pathinfo($filenameWithExt, PATHINFO_FILENAME);
          // Get just ext
          $extension                       = $request->file('image')->getClientOriginalExtension();
          // Filename to store
          $fileNameToStore                 = $filename.'_'.time().'.'.$extension;
          // Upload Image
          $path                            = $request->file('image')->storeAs('public/Admin', $fileNameToStore);
          $abonne->photo                  = $fileNameToStore;
          /*
            
          */
          $abonne->created_at             = date(NOW());
          $abonne->save();
          Alert::success('Abonne est bien ajouté'); 
          return redirect('/abonnés');
        }
      }
      public function edit($id){
        $abonnee = Abonne::find($id);
        return view('abonnees.modifier', ['abonnee'=>$abonnee]);
      }
  
        public function update(Request $request,$id){
          if (Abonne::where('email', $request->input('email'))->exists()) {
               echo "Error";
          }else{
          $abonnee                 = Abonne::find($id);
          $abonnee->nom            = $request->input('nom');
          $abonnee->prenom         = $request->input('prenom');
          $abonnee->email          = $request->input('email');
          $abonnee->adresse        = $request->input('adresse');
          $abonnee->date_naissance = $request->input('date_naissance');
          $abonnee->updated_at     = date(NOW());
          $abonnee->save();
          return redirect('/');
        }
      }
}
