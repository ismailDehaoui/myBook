<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\NewsLetter;

class NewsletterController extends Controller
{
     public function store(Request $request)
{
    
    
    if (! Newsletter::isSubscribed($request->email) ) {
        Newsletter::subscribe($request->email);
       // return redirect('home')->with('succès', 'merci pour votre inscription');
       // Alert::success('inscrit avec succès!');
      // return redirect('/');
         //return response()->json(['code'=>0, 'msg'=>'Quelque chose ne va pas.']);
    }
     Alert::warning('vous etes deja inscrit!');
        return redirect('/');
    //return redirect('home')->with('echec', 'désolé vous etes deja inscrit! ');*/
}
}
?>