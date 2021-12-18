<?php

namespace App\Http\Controllers;
use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Http\Request;
use App\Models\Abonne;
use App\Models\Emprunt;

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
          $abonne                         = new Abonne();
          $abonne->nom            = $request->input('nom');
          $abonne->prenom         = $request->input('prenom');
          $abonne->email          = $request->input('email');
          $abonne->adresse        = $request->input('adresse');
          $abonne->date_de_naissance = $request->input('date_de_naissance');       
          $filenameWithExt                 = $request->file('image')->getClientOriginalName();
          // Get just filename
          $filename                        = pathinfo($filenameWithExt, PATHINFO_FILENAME);
          // Get just ext
          $extension                       = $request->file('image')->getClientOriginalExtension();
          // Filename to store
          $fileNameToStore                 = $filename.'_'.time().'.'.$extension;
          // Upload Image
          $path                            = $request->file('image')->storeAs('public/images/abonnés', $fileNameToStore);
          $abonne->photo                  = $fileNameToStore;
          /*
            
          */
          $abonne->created_at             = date(NOW());
          $abonne->save();
          Alert::success('Abonne est bien ajouté'); 
          return redirect('/abonnés');
        }
      }

      public function profile($id){
        $abonne  = Abonne::find($id);
        $emprunts = Emprunt::where('id',$id)->paginate(5);
        return view('abonne.profile',['abonne'=>$abonne,'emprunts'=>$emprunts]); 
    }

    public function edit($id){
    	$abonne = Abonne::find($id);
    	return view('abonne.edit', ['abonne'=>$abonne]);
    }

    public function update(Request $request,$id){
      if (Abonne::where('email', $request->input('email'))->exists()) {
           echo "Error";
      }else{
      $abonne                 = Abonne::find($id);
      $abonne->nom            = $request->input('nom');
      $abonne->prenom         = $request->input('prenom');
      $abonne->email          = $request->input('email');
      $abonne->adresse        = $request->input('adresse');
      $abonne->date_naissance = $request->input('date_de_naissance');
      $abonne->updated_at     = date(NOW());
      $abonne->save();
      return redirect('/');
    }
  }


}
