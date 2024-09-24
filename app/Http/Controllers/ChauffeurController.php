<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Chauffeur;
use App\Models\Experience;
use Illuminate\Http\Request;

class ChauffeurController extends Controller
{
  public function CreerChauffeur()
  {
    $Categorie = Categorie::query()->orderBy('id', 'ASC')->get();
    $Experience = Experience::query()->orderBy('id', 'ASC')->get();
    return view('content.Chauffeur.Creer-Chauffeur',['Categorie' => $Categorie, 'Experience' => $Experience]);
  }

  public function GestionChauffeur()
  {
    $Liste = Chauffeur::query()->orderBy('id', 'ASC')->get();
    return view('content.Chauffeur.Gestion-Chauffeur', ['Liste' => $Liste]);
  }

  public function AjouterChauffeur(Request $request)
  {
    $request->validate([
      'Nom' => 'required',
      'Prenom' => 'required',
      'Numero' => 'required',
      'Emission' => 'required',
      'Categorie' => 'required',
      'Experience' => 'required',
    ]);
    $Chauffeur = new Chauffeur();
    $Chauffeur->Nom = $request->Nom;
    $Chauffeur->Prenom = $request->Prenom;
    $Chauffeur->Numero_Permis = $request->Numero;
    $Chauffeur->Date_Emission = $request->Emission;
    $Expiration = date('Y-m-d' , strtotime($request->Emission.'+10 year'));
    $Chauffeur->Date_Expiration = $Expiration;
    $Chauffeur->Categorie = $request->Categorie;
    $Chauffeur->Experience = $request->Experience;
    $File = $request->file('Image');
    $FileName = $File->getClientOriginalName();
    $Destinaton = 'Chauffeur';
    $File->move($Destinaton, $FileName);
    $Chauffeur->Image = $FileName;
    $Chauffeur->Assignation = 0;
    $Chauffeur->save();
    return redirect('GestionChauffeur');
  }
}
