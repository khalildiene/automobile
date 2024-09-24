<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RechercheController extends Controller
{
    public function Recherche(){
      return view('content.Recherche.Rechercher');
    }
}
