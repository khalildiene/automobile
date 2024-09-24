<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarification extends Model
{
    use HasFactory;
    protected $fillable =  ['Moyen','Date','Montant','Facture','Reservation'];

    public function Reservations(){
      return $this->belongsTo(Reservation::Class,'Reservation');
    }
}
