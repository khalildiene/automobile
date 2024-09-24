<?php

namespace App\Http\Controllers;

use App\Models\Tarification;
use Illuminate\Http\Request;

class TarificationController extends Controller
{
    public function Tarification(){
      $Liste = Tarification::query()->orderBy('id', 'ASC')->get();
      return view('content.Tarification.Gestion-Tarification',['Liste' => $Liste]);
    }
}
