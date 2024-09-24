@extends('layouts/contentNavbarLayout')

@section('title', 'Gestion des Voitures')

@section('content')
<h4 class="py-3 mb-4"><span class="text-muted fw-light">Voiture /</span> Gestion des Voitures</h4>

<div class="card">
    <h5 class="card-header">Tableau des Voitures</h5>
    <div class="table-responsive text-nowrap">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Profile</th>
                    <th>Marque</th>
                    <th>Model</th>
                    <th>Matricule</th>
                    <th>Chauffeur</th>
                    <th>Statut</th>
                    <th>Compteur</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($Liste as $T)
                <tr>
                    <td>
                        <img src="{{ asset('Voitures/'.$T['Image']) }}" alt class="w-px-40 h-auto rounded-circle">
                    </td>
                    <td>{{ $T->Marque }}</td>
                    <td>{{ $T->Model }}</td>
                    <td>{{ $T->Matricule }}</td>
                    <td>
                        @if($T->Chauffeur == 0)
                            Aucun
                        @elseif($T->Information)
                            {{ $T->Information->Prenom . ' ' . $T->Information->Nom }}
                        @else
                            Inconnu
                        @endif
                    </td>
                    <td>{{ $T->Statuts->Description }}</td>
                    <td>
                        <center>{{ $T->Kilometrage }} Km</center>
                    </td>
                    <td>
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                <i class="mdi mdi-dots-vertical"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ url('Statut/'.$T->id.'/') }}">
                                    <i class="mdi mdi-pencil-outline me-1"></i> Change Statut
                                </a>
                                @if($T->Chauffeur == 0)
                                    <a class="dropdown-item" href="{{ url('Chauffeur/'.$T->id.'/') }}">
                                        <i class="mdi mdi-pencil-outline me-1"></i> Assigner Driver
                                    </a>
                                @else
                                    <a class="dropdown-item" href="{{ url('Chauffeur/'.$T->id.'/') }}">
                                        <i class="mdi mdi-pencil-outline me-1"></i> Change Driver
                                    </a>
                                @endif
                                <a class="dropdown-item" href="{{ url('Supprimer/'.$T->id.'/') }}">
                                    <i class="mdi mdi-trash-can-outline me-1"></i> Supprimer
                                </a>
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
