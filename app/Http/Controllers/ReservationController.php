<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\User;
use App\Models\Client;
use App\Models\Voiture;
use App\Models\Chauffeur;
use App\Models\Reservation;
use App\Models\Tarification;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ReservationController extends Controller
{
  public function CreerReservation()
  {
    $Client = Client::all();
    return view('content.Reservation.Creer-Reservation', ['Client'=>$Client]);
  }

  public function GestionReservation(){
    $Liste = Reservation::query()->orderBy('id', 'ASC')->get();
    return view('content.Reservation.Gestion-Reservation',['Liste'=>$Liste]);
  }

  public function ConsulterReservation(){
    $C = Client::where('Email', Auth::user()->email)->first();
    
    if ($C === null) {
        // Vous pouvez choisir de retourner une vue différente, un message d'erreur, ou rediriger l'utilisateur
        return redirect()->back()->withErrors(['message' => 'Client introuvable.']);
    }

    $R = Reservation::where('Client', $C->id)->first();
    $Liste = Reservation::where('Client', $C->id)->get();

    // Vérifier que $R n'est pas null avant d'accéder à ses propriétés
    if ($R === null) {
        $Note = [];
    } else {
        $Note = Note::where('Client', $R->id)->get();
    }

    return view('content.Reservation.Consulter-Reservation', ['Liste' => $Liste, 'Note' => $Note]);
}

  public function Validation($Id){
    $Liste = Reservation::all()->Where('id',$Id)->first();
    $Voiture = Voiture::query()->Where('Chauffeur', '>' , 0)->Where(' Statut', 1)->orderBy('id', 'ASC')->get();
    return view('content.Reservation.Valider-Reservation',['Liste'=>$Liste, 'Voiture'=>$Voiture]);
  }

  public function Terminer($Id){
    $Reservation = Reservation::where('id', $Id)->first();
    
    if ($Reservation === null) {
        return redirect()->back()->withErrors(['message' => 'Réservation introuvable.']);
    }

    $Voiture = Voiture::where('id', $Reservation->Voitures->id)->first();

    if ($Voiture === null) {
        return redirect()->back()->withErrors(['message' => 'Voiture introuvable.']);
    }

    $Reservation->Etat = 3;
    $Reservation->save();

    $Voiture->Kilometrage += ($Reservation->Distance * 2);
    $Voiture->Statut = 1;
    $Voiture->save();

    return redirect('GestionReservation');
}


  public function Valider(Request $request){
    $request->validate([
      'Voiture' => 'required',
      'Moyen' => 'required',
      'Montant' => 'required'
    ]);
    $T = new Tarification;
    $Date = date('d/m/y');
    $Name = 'Reservation'.date('d-m-y-h-i-s').'.pdf';
    $T->Montant = $request->Montant;
    $T->Reservation = $request->Id;
    $T->Moyen = $request->Moyen;
    $T->Date = $Date;
    $T->Facture = $Name;
    $T->save();
    $V = Voiture::Where('id', $request->Voiture)->first();
    $V->Statut = 2;
    $V->save();
    $R = Reservation::Where('id', $request->Id)->first();
    $R->Etat = 1;
    $R->Voiture = $request->Voiture;
    $R->save();
    $Data = Reservation::all()->Where('id', $request->Id)->first();
    PDF::loadView('content.Reservation.Facture',['Data'=>$Data])->save('Factures/'.$Name)->stream('download.pdf');
    return redirect('GestionReservation');
  }

  public function AjouterReservation(Request $request){
    $request->validate([
      'Depart' => 'required',
      'Arriver' => 'required',
      'Date' => 'required',
      'Heure' => 'required',
      'Distance' => 'required',
    ]);
    if($request->Nouveau == true){
      $request->validate([
        'Nom' => 'required',
        'Prenom' => 'required',
        'Mail' => 'required',
        'Telephone' => 'required',
        'Adresse' => 'required'
      ]);
      $Cs = Client::where('Email',$request->Mail)->first();
      if($Cs == null){
        $Client = new Client;
        $Client->Nom = $request->Nom;
        $Client->Prenom = $request->Prenom;
        $Client->Email = $request->Mail;
        $Client->Telephone = $request->Telephone;
        $Client->Adresse = $request->Adresse;
        $Client->save();
        $U = new User();
        $U->nom = $request->Nom;
        $U->prenom = $request->Prenom;
        $U->email = $request->Mail;
        $U->password = 'Default10';
        $U->profil = 'Client';
        $U->save();
        $C = Client::where('Email',$request->Mail)->first();
      }
    }elseif($request->Existent == true){
      $request->validate([
        'Client' => 'required',
      ]);
      $C = Client::where('Email',$request->Client)->first();
    }
    $Reservation = new Reservation;
    $Reservation->Depart = $request->Depart;
    $Reservation->Arriver = $request->Arriver;
    $Reservation->Date = $request->Date;
    $Reservation->Heure = $request->Heure;
    $Reservation->Distance = $request->Distance;
    $Reservation->Etat = 0;
    $Reservation->Voiture = 0;
    $Reservation->Client = $C->id;
    $Reservation->save();
    return redirect('GestionReservation');
  }
  public function PDF()
  {
   return Pdf::loadView('content.Reservation.Facture')->download('MouhamedFacture.pdf');
  }

  public function NoteChauffeur(Request $request){
    $request->validate(['Note' => 'required']);
    $Reservation = Reservation::all()->Where('id', $request->Id)->first();
    $C = $Reservation->Voitures->Information->id;
    $Chauffeur = Chauffeur::all()->Where('id', $C)->first();
    $Note = new Note;
    $Note->Note = $request->Note;
    $Note->Client = Auth::user()->id;
    $Note->reservation_id = $request->Id;
    $Note->Chauffeur = $Chauffeur->id;
    $Note->save();
    return redirect('ConsulterReservation');
  }
}
