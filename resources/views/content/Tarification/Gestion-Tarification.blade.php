@extends('layouts/contentNavbarLayout')

@section('title', 'Gestion des Tarifications')

@section('content')
<h4 class="py-3 mb-4"><span class="text-muted fw-light">Tarification /</span> Gestion des Tarifications</h4>
</h4>

<div class="card">
    <h5 class="card-header">Tableau des Tarifications</h5>
    <div class="table-responsive text-nowrap">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Numero</th>
                    <th>Client</th>
                    <th>Paiement</th>
                    <th>Montant</th>
                    <th>Date</th>
                    <th>Facture</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($Liste as $T)
                <tr>
                    <td>
                        {{$T->Reservations->id}}
                    </td>
                    <td>
                        {{$T->Reservations->Clients->Prenom.' '.$T->Reservations->Clients->Nom}}
                    </td>
                    <td>
                        {{$T->Moyen}}
                    </td>
                    <td>
                        {{$T->Montant.' '.'FCFA'}}
                    </td>
                    <td>
                        {{$T->Date}}
                    </td>
                    <td>
                        <a href="{{url('Factures/'.$T->Facture.'/')}}" target="_blank" class="btn btn-white">
                            Facture
                        </a>
                    </td>
                    <td>
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{url('Modifier/'.$T->id.'/')}}"><i class="mdi mdi-pencil-outline me-1"></i> Modifier</a>
                                <a class="dropdown-item" href="{{url('Supprimer/'.$T->id.'/')}}"><i class="mdi mdi-trash-can-outline me-1"></i> Supprimer</a>
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
