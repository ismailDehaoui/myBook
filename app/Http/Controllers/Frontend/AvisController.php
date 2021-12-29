<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AvisController extends Controller
{
    public function add(Request $request){
        $avis_note = $request->input('');
    }
}
