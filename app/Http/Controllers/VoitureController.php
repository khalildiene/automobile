<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Models\Statut;
use App\Models\Voiture;
use App\Models\Chauffeur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class VoitureController extends Controller
{
  public function CreerVoiture()
  {
    $Statut = Statut::query()->orderBy('id', 'ASC')->get();
    $Type = Type::query()->orderBy('id', 'ASC')->get();
    return view('content.Voiture.Creer-Voiture',["Statut" => $Statut, "Type" => $Type]);
  }

  public function AjouterVoiture(Request $request)
  {
    $request->validate([
      'Marque' => 'required',
      'Model' => 'required',
      'Couleur' => 'required',
      'Matricule' => 'required',
      'Type' => 'required',
      'Kilometrage' => 'required',
      'Statut' => 'required',
    ]);
    $Voiture = new Voiture;
    $Voiture->Marque = $request->get('Marque');
    $Voiture->Model = $request->get('Model');
    $Voiture->Couleur = $request->get('Couleur');
    $Voiture->Matricule = $request->get('Matricule');
    $Voiture->Type = $request->get('Type');
    $Voiture->Kilometrage = $request->get('Kilometrage');
    $Voiture->Statut = $request->get('Statut');
    $File = $request->file('Image');
    $FileName = $File->getClientOriginalName();
    $Destinaton = 'Voitures';
    $File->move($Destinaton, $FileName);
    $Voiture->Image = $FileName;
    $Voiture->Chauffeur = 0;
    $Voiture->save();
    return redirect('GestionVoiture');
  }

  public function AssignerVoiture()
  {
    $Voiture = Voiture::all()->Where('Chauffeur' , 0);
    $Chauffeur = Chauffeur::all()->Where('Assignation' , 0);
    return view('content.Voiture.Assigner-Voiture',['Voiture' => $Voiture, 'Chauffeur' => $Chauffeur]);
  }

  public function Assignation(Request $request)
  {
    $request->validate([
      'Voiture' => 'required',
      'Chauffeur' => 'required',
    ]);
    $Voiture = Voiture::where('id', $request->Voiture)->first();
    $Chauffeur = Chauffeur::where('id', $request->Chauffeur)->first();
    $Chauffeur->Assignation = 1;
    $Voiture->Chauffeur = $request->Chauffeur;
    $Chauffeur->save();
    $Voiture->save();
    return redirect('GestionVoiture');
  }

  public function GestionVoiture()
  {
    $Liste = Voiture::query()->orderBy('id', 'ASC')->get();
    return view('content.Voiture.Gestion-Voiture', ['Liste' => $Liste]);
  }

  public function Statut($Id){
    $Voiture = Voiture::all()->Where('id',$Id)->first();
    $Statut = Statut::all();
    return view('content.Voiture.Statut-Voiture', ['Voiture' => $Voiture, 'Statut' => $Statut]);
  }

  public function Chauffeur($Id){
    $Voiture = Voiture::all()->Where('id',$Id)->first();
    $Type = $Voiture->Type;
    $Categorie = 2;
    switch ($Type) {
      case 1:
          $Categorie = 2;
        break;
      case 2:
          $Categorie = 1;
        break;
      case 3:
          $Categorie = 4;
        break;
      case 4:
          $Categorie = 3;
        break;
      case 5:
          $Categorie = 3;
        break;
    }
    $Chauffeur = Chauffeur::all()->Where('Assignation', 0)->Where('Categorie', $Categorie);
    return view('content.Voiture.Chauffeur-Voiture', ['Voiture' => $Voiture, 'Chauffeur' => $Chauffeur]);
  }

  public function StatutChange(Request $request){
    $request->validate(['Statut' => 'required',]);
    $Voiture = Voiture::all()->Where('id',$request->Id)->first();
    $Voiture->Statut = $request->Statut;
    $Voiture->save();
    return redirect('GestionVoiture');
  }

  public function ChauffeurChange(Request $request){
    $request->validate([
      'Chauffeur' => 'required',
    ]);
    $Voiture = Voiture::where('id', $request->Id)->first();
    $Chauffeur = Chauffeur::where('id', $request->Chauffeur)->first();
    $Chauffeur->Assignation = 1;
    $Voiture->Chauffeur = $request->Chauffeur;
    $Chauffeur->save();
    $Voiture->save();
    return redirect('GestionVoiture');
  }
}
