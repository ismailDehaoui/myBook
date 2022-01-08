<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Mail\Contact;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Mail;


  class ContactController extends Controller
 {
    public function create()
    {
      return view ("Frontend.contact");
    }
  public function send(Request $request){
    $details=[

             'name'=> $request->name,
              'email'=> $request->email,
               'subject'=> $request->subject,
                'message'=> $request->message,

           ];

Mail::to('monlivre12@gmail.com')->send(new Contact($details));
  return back()->with('status','Votre message a été envoyé avec succès!');
  //Mail::send(new Contact($details));
    //echo "bonjour";
 //Alert::success('Votre message a bien été envoyé!');
      // return redirect('contact');
  }
 }
?>