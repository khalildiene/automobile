<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chauffeur extends Model
{
    use HasFactory;
    protected $fillable = ['Nom','Prenom','Numero_Permis','Date_Emission','Date_Expiration','Categorie','Experience','Image','Assignation'];

    public function Categories(){
      return $this->belongsTo(Categorie::class,'Categorie');
    }

    public function Experiences(){
      return $this->belongsTo(Experience::class,'Experience');
    }

}
