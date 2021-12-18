<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Abonne;
use App\Models\Livre;

class QrCodeController extends Controller
{
    public function index()
    {
      return view('qrcode.qrcode');
    }

    public function qrCodeAbonne($id)
    {
        $abonne  = Abonne::find($id);
        return view('abonne.qrcode',['abonne'=>$abonne]); 
    }

    public function qrCodeLivre($id)
    {
        $livre  = Livre::find($id);
        return view('livre.qrcode',['livre'=>$livre]); 
    }
}