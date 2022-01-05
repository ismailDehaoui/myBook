<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use RealRashid\SweetAlert\Facades\Alert;

use App\Models\Livre; 

use App\Models\Emprunt; 

use App\Models\Auteurslivre;

use App\Models\Motscleslivre;

use App\Models\Categorie;

use App\Models\Auteur;

use App\Models\Motscle;

use function GuzzleHttp\Promise\each;
use function PHPUnit\Framework\isEmpty;

class LivreController extends Controller
{
    //
    //Lister les livres
    public function index(){
        $livres = Livre::paginate(10);
        //$categories = Categorie::all();
        return view('livre.index', ['livres'=>$livres]);
    }


    public function getLivreAjax(){
        $isbn = $_GET['isbn'];
        $id_abonne = $_GET['id_abonne'];
        //$livre = Livre::find($id);
        $livre = Livre::where('ISBN', $isbn)->first();
        if($livre){
            $emprunt = Emprunt::where('livres_id', $livre->id)->where('abonnes_id', $id_abonne)->first();
            $action = "";
            if($emprunt){
                $action = "à rendre";
            }
            else{
                $action = "à emprunter";
            }
            $categorie = Categorie::find($livre->categories_id);
        $html = "
        <tr>
        <td>
        <div class='d-flex flex-column justify-content-center'>
                <h6 class='mb-0 text-sm'>$livre->id</h6>
              </div>
        </td>
        
        <td>
            <div class='d-flex flex-column justify-content-center'>
                <h6 class='mb-0 text-sm text-center'>$livre->titre</h6>
              </div>
        </td>
        <td>
            <div class='text-center'>
                <a href='http://mybook.test/storage/images/livres/$livre->photo' target='_blank'>
                <img src='http://mybook.test/storage/images/livres/$livre->photo' class='avatar avatar-sm me-3 border-radius-lg' alt='user1'>
                </a>
            </div>
        </td>
        <td>
      <p class='text-center text-xs text-secondary mb-0'>$livre->nombre_exemplaires_disponibles</p>
      </td>
        <td>
            <div class='d-flex flex-column justify-content-center'>
            <p class='text-center text-xs text-secondary mb-0'>$categorie->nom</p>
              </div>
        </td>
        <td>$action</td>
        
        </tr>
    ";
        return $html;
        }
      }

    //Affiche le formulaire d'ajout de livres
    public function create(){
        $categories = Categorie::orderBy('nom')->get();
        $auteurs = Auteur::orderBy('nom')->get();
        $motscles = Motscle::orderBy('motcle')->get();
        return view('livre.add', ['categories'=>$categories, 'auteurs'=>$auteurs, 'motscles'=>$motscles]);
    }

    //Enregistrer un livre
    public function store(Request $request){

        if (Livre::where('ISBN', $request->input('ISBN'))->exists()) {
            echo "err";
       }
       else{
        $motsClesLivreController = new MotscleslivreController();
        $auteursLivreController = new AuteurslivreController();
        $livre = new Livre();
        $livre->titre = $request->input('titre');
        $livre->isbn = $request->input('isbn');
        $livre->editeur = $request->input('éditeur');
        $livre->langue = $request->input('langue');
        $livre->categories_id = $request->input('catégorie');
        $livre->nombre_exemplaires_disponibles = $request->input('nombre-exemplaires-disponibles');
        $livre->annee = $request->input('année');
        $filenameWithExt = $request->file('image')->getClientOriginalName();
          // Get just filename
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        // Get just ext
        $extension = $request->file('image')->getClientOriginalExtension();
        // Filename to store
        $fileNameToStore= $filename.'_'.time().'.'.$extension;
        // Upload Image
        $path = $request->file('image')->storeAs('public/images/livres', $fileNameToStore);
        $livre->photo = $fileNameToStore;
        //$livre->photo = $request->input('image');
        $livre->resume = $request->input('résumé');
        $livre->save();
        if($request->filled('motcle')){
            $motsClesLivreController->store($request->input('motcle'), $livre->id);
        }
        if($request->filled('auteur')){
            $auteursLivreController->store($request->input('auteur'), $livre->id);
        }

        

        Alert::success('Succeès', 'Livre ajouté avec succès');
        
        return redirect('/livres');
        
    }
    }

    //Recuperer un livre puis le saisir dans le formulaire
    public function edit($id){
        $livre = Livre::find($id);
        $categories = Categorie::orderBy('nom')->get();
        $auteurs = Auteur::orderBy('nom')->get();
        $motscles = Motscle::orderBy('motcle')->get();
        return view('livre.edit', ['livre' => $livre, 'categories'=>$categories, 'auteurs'=>$auteurs, 'motscles'=>$motscles]);
    }

    //Modifier un livre
    public function update(Request $request, $id){
        
        $motsClesLivreController = new MotscleslivreController();
        $auteursLivreController = new AuteurslivreController();

        $livre = Livre::find($id);
        
        $livre->titre = $request->input('titre');
        $livre->isbn = $request->input('isbn');
        $livre->editeur = $request->input('éditeur');
        $livre->langue = $request->input('langue');
        $livre->categories_id = $request->input('catégorie');
        $livre->nombre_exemplaires_disponibles = $request->input('nombre-exemplaires-disponibles');
        $livre->annee = $request->input('année');

        if($request->input('image') != $livre->photo){
            $filenameWithExt = $request->file('image')->getClientOriginalName();

          // Get just filename

            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

        // Get just ext

            $extension = $request->file('image')->getClientOriginalExtension();

        // Filename to store

            $fileNameToStore= $filename.'_'.time().'.'.$extension;

        // Upload Image

            $path = $request->file('image')->storeAs('public/images/livres', $fileNameToStore);

            $livre->photo = $fileNameToStore;
        }

        
        $livre->resume = $request->input('résumé');
        $livre->save();

        if($request->filled('motcle')){
            $motsClesLivreController->update($request->input('motcle'), $livre->id);
        }
        if($request->filled('auteur')){
            $auteursLivreController->update($request->input('auteur'), $livre);
        }
        return redirect('/livres');
    }

    
    //Ne les supprimez pas
     function afficherLivres($id){
        $l = Livre::where('categories_id',$id)->paginate(5);
        $c = Categorie::find($id);
        if(count($l) == 0){
             Alert::info('Categorie '.$c->nom_categorie.' n\'a pas de livres!!');
             return redirect('/categories');
        }
        else
          return view('categorie.CatLivres',['cat'=>$c],['livre'=>$l]);
    }
       public function listLivressupp(){
      
      $l = Livre::onlyTrashed()->paginate(6);
        return view('Historique.livresupp', ['livres'=>$l]);
    } 
}
