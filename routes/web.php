<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VoitureController;
use App\Http\Controllers\ChauffeurController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\TarificationController;
use App\Http\Controllers\authentications\LoginBasic;
use App\Http\Controllers\authentications\RegisterBasic;

// Main

Route::get('/', [LoginBasic::class, 'index'])->name('auth-login-basic');
Route::get('/Acceuil', [LoginBasic::class, 'dashboard'])->middleware('auth');

// Authentication

Route::get('/Connexion', [LoginBasic::class, 'index'])->name('login');
Route::get('/Acceuil/Deconnexion', [LoginBasic::class, 'Deconnexion'])->name('auth-deconnexion');
Route::post('/Connexion/Verification', [LoginBasic::class, 'Verification'])->name('auth-login-verification');
Route::get('/Creation', [RegisterBasic::class, 'index'])->name('auth-register-basic');
Route::post('/Creation/AjouterUtilisateur', [RegisterBasic::class, 'AjoutUtilisateur'])->name('auth-register-add');

//Voiture

Route::get('/CreationVoiture', [VoitureController::class, 'CreerVoiture'])->name('Creer-Voiture')->middleware('auth');
Route::get('/AssignerVoiture', [VoitureController::class, 'AssignerVoiture'])->name('Assignation-Voiture')->middleware('auth');
Route::post('/Assigner', [VoitureController::class, 'Assignation'])->name('Assigner-Voiture')->middleware('auth');
Route::post('/AjouterVoiture', [VoitureController::class, 'AjouterVoiture'])->name('Ajouter-Voiture')->middleware('auth');
Route::get('/GestionVoiture', [VoitureController::class, 'GestionVoiture'])->name('Gestion-Voiture')->middleware('auth');
Route::get('/Statut/{Id}', [VoitureController::class, 'Statut'])->name('Change-Statut')->middleware('auth');
Route::post('/StatutChange', [VoitureController::class, 'StatutChange'])->name('Statut-Voiture')->middleware('auth');
Route::get('/Chauffeur/{Id}', [VoitureController::class, 'Chauffeur'])->name('Change-Chauffeur')->middleware('auth');
Route::post('/ChauffeurChange', [VoitureController::class, 'ChauffeurChange'])->name('Chauffeur-Voiture')->middleware('auth');

//Chauffeur

Route::get('/CreationChauffeur', [ChauffeurController::class, 'CreerChauffeur'])->name('Creer-Chauffeur')->middleware('auth');
Route::post('/AjouterChauffeur', [ChauffeurController::class, 'AjouterChauffeur'])->name('Ajouter-Chauffeur')->middleware('auth');
Route::get('/GestionChauffeur', [ChauffeurController::class, 'GestionChauffeur'])->name('Gestion-Chauffeur')->middleware('auth');
Route::post('/Note', [ReservationController::class, 'NoteChauffeur'])->name('Note-Chauffeur')->middleware('auth');

//Reservation

Route::get('/CreationReservation', [ReservationController::class, 'CreerReservation'])->name('Creer-Reservation')->middleware('auth');
Route::post('/AjouterReservation', [ReservationController::class, 'AjouterReservation'])->name('Ajouter-Reservation')->middleware('auth');
Route::get('/GestionReservation', [ReservationController::class, 'GestionReservation'])->name('Gestion-Reservation')->middleware('auth');
Route::get('/ConsulterReservation', [ReservationController::class, 'ConsulterReservation'])->name('Consulter-Reservation')->middleware('auth');
Route::get('/Validation/{Id}', [ReservationController::class, 'Validation'])->name('Valider-Reservation')->middleware('auth');
Route::get('/Terminer/{Id}', [ReservationController::class, 'Terminer'])->name('Terminer-Reservation')->middleware('auth');
Route::post('/Valider', [ReservationController::class, 'Valider'])->name('Valider')->middleware('auth');

//Route::get('/PDF', [ReservationController::class, 'PDF'])->name('Facture-Reservation');

//Tarification

Route::get('/GestionTarification', [TarificationController::class, 'Tarification'])->name('Gestion-Tarification')->middleware('auth');
