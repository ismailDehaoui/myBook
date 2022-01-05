<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Abonne;
use App\Models\Categorie;
use App\Models\Livre;
use App\Models\Emprunt;
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
   



     $CatLivres = DB::table('categories')
            ->join('livres', 'livres.categories_id', '=', 'categories.id')
            ->select('livres.*', 'categories.*',DB::raw('count(livres.id) as CatLivres'),DB::raw('count(categories.id) as Cats'))
            ->where('livres.deleted_at', '=', NULL)
            ->where('categories.deleted_at', '=', NULL)
            ->groupBy('livres.categories_id')
            ->get();
    $plabels = [];
    $pdata = [];
    foreach($CatLivres as $cl ){
      $plabels[] = $cl->nom;
      $pdata[]=  $cl->CatLivres;
    }
    //nbr total
    $nombrecategories = Categorie::select('id')->get();
    $nombrecategories = count($nombrecategories);
    //nbr par jour
    $ct = Categorie::select('id','created_at')->where('created_at','=',$today)->get();
    $ct = count($ct);


     //barchart

    //emprunts
    $em = Emprunt::select('id','created_at')->where('est_rendu','=',0)->get()->groupBy(function($data)
      {return Carbon::parse($data->created_at)->format('M');});
    $monthsem = [];
    $monthCem = [];
    foreach($em as $month => $values){
      $monthsem[] = $month;
      $monthCem[]= count($values);
    }//nombre total
   $nombreemp = Emprunt::select('id')->where('est_rendu','=',0)->get();
   $nombreemp = count($nombreemp);

   //retours
    $ret = Emprunt::select('id','created_at')->where('est_rendu','=',1)->get()->groupBy(function($data)
      {return Carbon::parse($data->created_at)->format('M');});
    $monthsret = [];
    $monthCret = [];
    foreach($ret as $month => $values){
      $monthsret[] = $month;
      $monthCret[]= count($values);
    }//nombre total
   $nombreret = Emprunt::select('id')->where('est_rendu','=',1)->get();
   $nombreret = count($nombreret)+$nombreemp;
   //nouv emp
   $nouvEmp = Emprunt::select('id','created_at')->where('created_at','=',$today)->get();
    $nouvEmp = count($nouvEmp);

    return view('dashboard.dashboard',
      ['data'=>$data,'months'=>$months,
      'monthC'=>$monthC,'na'=>$nombreabonne,
      'ab'=>$ab,'plabels'=>$plabels,
      'pdata'=>$pdata,'ctj'=>$ct,
      'nbrCat'=>$nombrecategories],
      ['livre'=>$livre,'year'=>$y,'yearC'=>$yC,
       'nl'=>$nombrelivre,'nla'=>$livreAjoute,
       'emp'=>$em,'ret'=>$ret,
       'monthsem'=>$monthsem,
       'monthCem'=>$monthCem,'monthsr'=>$monthsret,
       'monthCr'=>$monthCret,
       'nombreEmp'=>$nombreret,
       'mm'=>$nouvEmp]);


  }
   public function profile($id){
   $users = User::find($id);
   return view('authentification.profile',['users'=>$users]);
 }


public function editprofile($id){
        $a = User::find($id);
      return view('authentification.modifierprofile', ['gest'=>$a]);
    }
  
public function editpassword($id){
    $a = User::find($id);
    return view('authentification.modifierpassword',['pass'=>$a]);

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

          $c = $request->input('flexRadioDefault');
          if ($c == "radio1") {
            $a->est_super_admin = true;
          }
          else
            $a->est_super_admin = false; 
      $a->save();
       Alert::success('Les informations d\'utilisateur sont bien modifiées');
      return redirect('/affgest');
      }}




      public function getProfilePassword(Request $request) {

    return view('authentification.modifierpassword', ['pass' => Auth::user()]);
}

public function postProfilePassword(Request $request) {
    $user = Auth::user();
        $user->name= $request->input('name');
        $user->email = $request->input('email');
        if(!empty($request->file('image'))){
              $filenameWithExt = $request->file('image')->getClientOriginalName();
              $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
              // Get just ext
              $extension = $request->file('image')->getClientOriginalExtension();
              // Filename to store
              $fileNameToStore= $filename.'_'.time().'.'.$extension;
              // Upload Image
              $path = $request->file('image')->storeAs('public/Admin', $fileNameToStore);
              $user->photo = $fileNameToStore;}
              if(!empty($request->input('ancien_password')) || !empty($request->input('password'))||!empty($request->input('password_confirmation')))
              {
                $request->validate([
                    'ancien_password' => 'required',
                    'password' => 'min:8|required_with:password_confirmation|same:password_confirmation',
                    'password_confirmation' => 'required'
                  ]);
              if(Hash::check(request('ancien_password'), $user->password)){
        
                $user->password = Hash::make($request->input('password'));
              }
              else{
              Alert::error('Mot de passe actuel est incorrcet');
              return view('authentification.modifierpassword',['pass'=>$user]);}
              }
              $user->save();
              Alert::success('Vos informations sont bien modifiées');
                return redirect('user/'.$user->id.'/profile');
}



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
}
