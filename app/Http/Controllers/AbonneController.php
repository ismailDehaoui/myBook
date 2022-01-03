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
              <h6 class='mb-0 text-sm'>$abonne->nom</h6>
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
               echo "Error";
          }else{
          $abonne                         = new Abonne();
          $abonne->nom            = $request->input('nom');
          $abonne->prenom         = $request->input('prenom');
          $abonne->email          = $request->input('email');
          $abonne->adresse        = $request->input('adresse');
          $abonne->date_naissance = $request->input('date_de_naissance');       
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
