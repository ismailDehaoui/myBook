<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Abonne;
use App\Models\Livre;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\AdminRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

     function index(){
    $today = Carbon::now()->todatestring();

      //abonnés
    $data = Abonne::select('id','created_at')->get()->groupBy(function($data)
      {return Carbon::parse($data->created_at)->format('M');});
   //line chart
    $months = [];
    $monthC = [];
    foreach($data as $month => $values){
      $months[] = $month;
      $monthC[]= count($values);
    }//nombre total
   $nombreabonne = Abonne::select('id')->get();
   $nombreabonne = count($nombreabonne);

    $ab = Abonne::select('id','created_at')->where('created_at','=',$today)->get();
    $ab = count($ab);
  
       //Livres linechart
    $livre = Livre::select('id','created_at')->get()->groupBy(function($data)
      {return Carbon::parse($data->created_at)->format('Y');});
    $livreAjoute = Livre::select('id','created_at')->where('created_at','=',$today)->get();
    $livreAjoute = count($livreAjoute);

    
    $y = [];
    $yC = [];
    foreach($livre as $year => $values){
      $y[] = $year;
      $yC[]= count($values);
    }//nombre total
   $nombrelivre = Livre::select('id')->get();
   $nombrelivre = count($nombrelivre);


    return view('dashboard.dashboard',['data'=>$data,'months'=>$months,'monthC'=>$monthC,'na'=>$nombreabonne,'ab'=>$ab],['livre'=>$livre,'year'=>$y,'yearC'=>$yC,'nl'=>$nombrelivre,'nla'=>$livreAjoute]);
  }





     public function listGest(){
    	$gest = User::paginate(5);
    	return view('authentification.affichergest',['gestionnaire'=>$gest]);
    }
    public function store(Request $request){
      $request->validate(['password'=>'min:8|required_with:passorwd_confirmation|same:password_confirmation']);
    	$password = $request->input('password');
        if (User::where('email', $request->input('email'))->exists() ) {
            Alert::error('Email déja existe!');
            return redirect('/ajoutergestionnaire');
        }
        else
            if (User::withTrashed()->where('email', $request->input('email'))->exists() ) {
            Alert::error('Ce gestionnaire a été supprimé,vous pouvez le restaurer');
            return redirect('/ajoutergestionnaire');
        }
		        else
		        {
		    	$a = new User();
		    	$a->name= $request->input('nom')." ".$request->input('prenom');
		    	$a->email = $request->input('email');
		    	$a->password = Hash::make($password);
          $c = $request->input('flexRadioDefault');
          if ($c == "radio1") {
            $a->est_super_admin = true;
          }

           $filenameWithExt = $request->file('img')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('img')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('img')->storeAs('public/Admin', $fileNameToStore);
            $a->photo = $fileNameToStore;
		    	$a->save();
		       Alert::success('Utilisateur est bien ajouté');
		    	return redirect('/ajoutergestionnaire');
		      }
    }
    public function editgest($id){
        $a = User::find($id);
      return view('authentification.modifiergest', ['gest'=>$a]);
    }
    public function update(Request $request,$id){
        if (User::where('id', '!=', $id)->where('email', $request->input('email'))->exists()) {
             Alert::error('Email déja existe');
             return redirect('/editgest'.$id);
        }
        else{
      $a = User::find($id);
      $a->name= $request->input('nom');
      $a->email = $request->input('email');
      if(!empty($request->file('image'))){ 
             $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('image')->storeAs('public/Admin', $fileNameToStore);
            $a->photo = $fileNameToStore;}
      $a->save();
       Alert::success('Les informations d\'utilisateur sont bien modifiées');
      return redirect('/affgest');
      }}
  function suppgest($id){
  alert()->error('Etes vous sure?','L\' utilisateur sera supprimé!')->showConfirmButton('<a class=""  href="/confirmersuppgest'.$id.'" >
                            <input type="hidden" name="afficher">Supprimer
                        </a>', '#a085d6a')->toHtml()->showCancelButton('Annuler', '#aaa')->reverseButtons();
   return redirect('/affgest');
  }
   function confirmgest($id){
       $l = User::find($id);
       $user = auth()->user();
       $l->acteur = $user->id;
       $l->save();
       $l->delete();
       return redirect('/affgest');
  }

    public function listGestsupp(){
      
      $g = User::onlyTrashed()->paginate(3);
        return view('Historique.gestsupp', ['gest'=>$g]);
    } 
     function restoregest($id){
    $r = User::withTrashed()->where('id',$id);
    $r->restore();
     Alert::success('Utilisateur est bien restauré');
    return redirect('/gestsupp');
  }
  public function logout(){
  
  }
}
