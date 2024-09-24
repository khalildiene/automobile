@extends('layouts/contentNavbarLayout')

@section('title', 'Gestion des Chauffeurs')

@section('content')
<h4 class="py-3 mb-4"><span class="text-muted fw-light">Chauffeur /</span> Gestion des Chauffeurs</h4>
</h4>

<div class="card">
    <h5 class="card-header">Tableau des Chauffeurs</h5>
    <div class="table-responsive text-nowrap">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Profile</th>
                    <th>Prenom</th>
                    <th>Nom</th>
                    <th>Categorie</th>
                    <th>Experience</th>
                    <th>Validiter Permis</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($Liste as $C)
                <tr>
                    <td>
                        <img src="{{ asset('Chauffeur/'.$C['Image'].'/') }}" alt class="w-px-40 h-auto rounded-circle">
                    </td>
                    <td>
                        {{$C['Prenom']}}
                    </td>
                    <td>
                        {{$C['Nom']}}
                    </td>
                    <td>
                        {{$C->Categories->Description}}
                    </td>
                    <td>
                        {{$C->Experiences->Libeller}}
                    </td>
                    <td>
                        {{$C->Date_Emission.' / '.$C->Date_Expiration}}
                    </td>
                    <td>
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{url('Modifier/'.$C['id'].'/')}}"><i class="mdi mdi-pencil-outline me-1"></i> Modifier</a>
                                <a class="dropdown-item" href="{{url('Supprimer/'.$C['id'].'/')}}"><i class="mdi mdi-trash-can-outline me-1"></i> Supprimer</a>
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
