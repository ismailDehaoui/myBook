<?php
namespace  App\Http\Controllers;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use App\Models\Motscle;
use App\Models\Motscleslivre;


class MotscleController extends Controller

{

    public function store(Request $request){

        //Alert::success('Succeès', 'Mot Clé ajouté avec succès'.$request->all());

        if (Motscle::where('motcle', $request->motcle_name)->exists()) {
            return response()->json(['code'=>0, 'msg'=>'Mot cle existe déja.']);
        }
        else{
            $motcle = new Motscle();
            $motcle->motcle = $request->motcle_name;
            $query = $motcle->save();
            if(!$query){
                return response()->json(['code'=>0, 'msg'=>'Quelque chose ne va pas.']);
            } 
            else{
                return response()->json(['code'=>1, 'msg'=>'Un nouveau mot cle a été ajouté.', 'keyWordAdded'=>$request->motcle_name, 'idKeyword'=>$motcle->id]);
            }
        }    


        if (Motscle::where('motcle', $request->motcle_name)->exists()) {

            return response()->json(['code'=>0, 'msg'=>'Mot cle existe déja.']);

        }

        else{

            $motcle = new Motscle();

            $motcle->motcle = $request->motcle_name;

            $query = $motcle->save();

            if(!$query){

                return response()->json(['code'=>0, 'msg'=>'Quelque chose ne va pas.']);

            }

            else{

                return response()->json(['code'=>1, 'msg'=>'Un nouveau mot cle a été ajouté.', 'keyWordAdded'=>$request->motcle_name, 'idKeyword'=>$motcle->id]);

            }

        }    

    }

    //supprimer un mot cle

    public function destroy($id){
        //$motclelivre = Motscleslivre::where('motscles_id' ,$id)->first();
        //if($motclelivre){
            //return response()->json(['code'=>0, 'msg'=>'Le mot clé est déja relié à 1 ou plusieurs livres, impossible de le supprimer!.']);
        //}
        //if(Motscleslivre::where('motscles_id' ,$id)->exists()) {
          //  return response()->json(['code'=>0, 'msg'=>'Le mot clé est déja relié à 1 ou plusieurs livres, impossible de le supprimer!.']);
        //}
        //else{
            $motcle = Motscle::find($id);
            $motcle->delete();
            return response()->json(['code'=>1, 'msg'=>'Mot cle supprimé avec succès.']);   
        //}             
    }

}




