<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable = ['Depart','Arriver','Date','Debut','Distance','Etat','Client'];

    public function Clients(){
      return $this->belongsTo(Client::Class, 'Client');
    }

    public function Voitures(){
      return $this->belongsTo(Voiture::Class, 'Voiture');
    }

    public function Notes(){
      return $this->hasOne(Note::class);
    }

    public function Tarifs(){
      return $this->belongsTo(Tarification::Class, 'id');
    }
}
