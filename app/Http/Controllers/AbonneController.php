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

    public function getAbonneAjax(){
      $id = $_GET['id'];
      $abonne = Abonne::find($id);
      if($abonne){
      //$emprunts = $abonne->hasMany(Emprunt::class);
      $emprunts = Emprunt::where('abonnes_id', '=', $abonne->id)->get();
      $nombreEmprunts = $emprunts->count();
      //$html = '<tr><td>'.$abonne->nom.'</td></tr>';
      $html = "
      <tr>
      <td>
      <div class='d-flex flex-column justify-content-center'>
              <h6 class='mb-0 text-sm'>$abonne->id</h6>
            </div>
      </td>
      <td>
        <div class='d-flex px-2 py-1'>
          <div>
          <a href='http://mybook.test/storage/images/abonnés/$abonne->photo' target='_blank'>
            <img src='http://mybook.test/storage/images/abonnés/$abonne->photo' class='avatar avatar-sm me-3 border-radius-lg' alt='user1'>
          </a>
            </div>
        </div>
      </td>
      <td>
          <div class='d-flex flex-column justify-content-center'>
              <h6 class='mb-0 text-sm'>$abonne->nom $abonne->prenom</h6>
            </div>
      </td>
      <td>
      <p class='text-xs text-secondary mb-0'>$abonne->email</p>
      </td>
      <td>
      <p class='text-center text-xs text-secondary mb-0'>$nombreEmprunts</p>
      </td>
      </tr>
  ";
      
      return $html;
      }
      
    }

    public function create(){
        return view('abonne.add');
      }    

      public function store(Request $request){   
        if (Abonne::where('email', $request->input('email'))->exists()) {
               echo "Email exist déja";
          }else{

          $abonne                          = new Abonne();
          $abonne->nom                     = $request->input('nom');
          $abonne->prenom                  = $request->input('prenom');
          $abonne->email                   = $request->input('email');
          $abonne->adresse                 = $request->input('adresse');
          $abonne->date_naissance          = $request->input('date_naissance');       

          $abonne                         = new Abonne();
          $abonne->nom            = $request->input('nom');
          $abonne->prenom         = $request->input('prenom');
          $abonne->email          = $request->input('email');
          $abonne->adresse        = $request->input('adresse');

          $abonne->date_naissance = $request->input('date_de_naissance');       

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


      public function profile($id){
        $abonne  = Abonne::find($id);
        $emprunts = Emprunt::where('id',$id)->paginate(5);
        return view('abonne.profile',['abonne'=>$abonne,'emprunts'=>$emprunts]); 
    }
    /*
    public function edit($id){
    	$abonne = Abonne::find($id);
    	return view('abonne.edit', ['abonne'=>$abonne]);
    }

    public function update(Request $request,$id){
      
      
      $abonne                 = Abonne::find($id);
      $abonne->nom            = $request->input('nom');
      $abonne->prenom         = $request->input('prenom');
      $abonne->email          = $request->input('email');
      $abonne->adresse        = $request->input('adresse');
<<<<<<< HEAD
      $abonne->date_naissance = $request->input('date_de_naissance');
      $abonne->updated_at     = date(NOW());
      $abonne->save();
      return redirect('/');
    }
  }*/
=======
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
          
          
          $abonne->save();
          Alert::success('Modifié avec succès!'); 
          return redirect('/abonnés');  
  }
>>>>>>> c3a8a19fe5bfa1fcdc510ac5d9833565b898fffd


  public function listAbonsupp(){
      
      $l = Abonne::onlyTrashed()->paginate(5);
        return view('Historique.abonsupp', ['abon'=>$l]);
    } 

        function deleteAbonne($id){
   Alert::error('Etes vous sure?','L\'abonné sera supprimé!')->showConfirmButton('<a class=""  href="/abonne/confirmersupp/'.$id.'" >
                            <input type="hidden" name="afficher">Supprimer
                        </a>', '#a085d6a')->toHtml()->showCancelButton('Annuler', '#aaa')->reverseButtons();
   return redirect('abonnés');
  }

  public function destroy($id){
    $emprunt = Emprunt::where('abonnes_id', $id)->where('est_rendu', false);
    if($emprunt->count() != 0){
      Alert::error('Supression impossible! Cet abonné possède déja un ou plusieurs livres!');
      return redirect('/abonnés');  
    }
    $abonne = Abonne::find($id);
       $user = auth()->user();
       $abonne->acteur = $user->id;
       $abonne->save();
    $abonne->delete();
    Alert::success('Succeès', 'Abonné supprimé avec succès!');
    return redirect('/abonnés');
  }
<<<<<<< HEAD
=======
   function restoreabon($id){
    $r = Abonne::withTrashed()->where('id',$id);
    $r->restore();
     Alert::success('Abonné est bien restauré');
    return redirect('/abonsupp');
  }
>>>>>>> c3a8a19fe5bfa1fcdc510ac5d9833565b898fffd

}
