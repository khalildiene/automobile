@extends('layouts/contentNavbarLayout')

@section('title', 'Gestion des Reservations')

@section('content')
<h4 class="py-3 mb-4"><span class="text-muted fw-light">Reservation /</span> Gestion des Reservation</h4>
</h4>

<div class="card">
    <h5 class="card-header">Tableau des Reservations</h5>
    <div class="table-responsive text-nowrap">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Voiture</th>
                    <th>Depart</th>
                    <th>Arriver</th>
                    <th>Date</th>
                    <th>Heure</th>
                    <th>Etat</th>
                    <th>Client</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach($Liste as $R)
                <tr>
                    @if($R->Voiture ==0)
                    <td>
                        Aucune
                    </td>
                    @else
                    <td>
                        <img src="{{ asset('Voitures/'.$R->Voitures->Image.'/') }}" alt class="w-px-40 h-auto rounded-circle">
                        <span>
                            {{$R->Voitures->Marque}}
                        </span>
                    </td>
                    @endif
                    <td>
                        {{$R->Depart}}
                    </td>
                    <td>
                        {{$R->Arriver}}
                    </td>
                    <td>
                        {{$R->Date}}
                    </td>
                    <td>
                        {{$R->Heure}}
                    </td>
                    @if($R->Etat == 0)
                    <td class="text-primary">
                        Attente
                    </td>
                    @elseif($R->Etat == 1)
                    <td class="text-success">
                        Valider
                    </td>
                    @elseif($R->Etat == 2)
                    <td class="text-danger">
                        Expier
                    </td>
                    @elseif($R->Etat == 3)
                    <td class="text-secondary">
                        Terminer
                    </td>
                    @endif
                    </td>
                    <td>
                        {{$R->Clients->Prenom.' '.$R->Clients->Nom}}
                    </td>
                    <td>
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></button>
                            <div class="dropdown-menu">
                                @if($R->Etat != 1 && $R->Etat != 3)
                                <a class="dropdown-item" href="{{url('Validation/'.$R->id.'/')}}"><i class="mdi mdi-check-outline me-1"></i> Validation</a>
                                <a class="dropdown-item" href="{{url('Modifier/'.$R->id.'/')}}"><i class="mdi mdi-pencil-outline me-1"></i> Modifier</a>
                                <a class="dropdown-item" href="{{url('Supprimer/'.$R->id.'/')}}"><i class="mdi mdi-trash-can-outline me-1"></i> Supprimer</a>
                                @endif
                                @if($R->Etat == 1)
                                <a class="dropdown-item" href="{{url('Terminer/'.$R->id.'/')}}"><i class="mdi mdi-check-outline me-1"></i> Terminer</a>
                                @endif
                                <a class="dropdown-item">Editer</a>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
