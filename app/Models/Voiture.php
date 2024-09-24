<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voiture extends Model
{
    use HasFactory;
    protected $fillable = ['Marque', 'Model', 'Couleur', 'Matricule', 'Image', 'Chauffeur', 'Kilometrage', 'Statut', 'Type', 'Image'];

    public function Information(){
      return $this->belongsTo(Chauffeur::Class, 'Chauffeur');
    }

    public function Statuts(){
      return $this->belongsTo(Statut::Class, 'Statut');
    }
}
