<?php

namespace App\Http\Controllers\authentications;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegisterBasic extends Controller
{
  public function index()
  {
    return view('content.authentications.auth-register-basic');
  }

  public function AjoutUtilisateur(Request $request)
  {
    $request->validate([
      'nom' => 'required',
      'prenom' => 'required',
      'email' => 'required',
    ]);
    $User = new User();
    $User->nom = $request->nom;
    $User->prenom = $request->prenom;
    $User->email = $request->email;
    $User->password = $request->password;
    $User->profil = 'Client';
    $User->save();
    return redirect('Connexion');
  }
}
