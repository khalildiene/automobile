@extends('layouts/contentNavbarLayout')

@section('title', 'Liste des Candidats')

@section('content')
<h4 class="py-3 mb-4"><span class="text-muted fw-light">Chauffeur /</span> Liste des ChauChauffeurs</h4>
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
                    @if($C['Categorie']== 1)
                    <td>
                        A-Motocycliste
                    </td>
                    @elseif($C['Categorie'] == 2)
                    <td>
                        B-Particulier
                    </td>
                    @elseif($C['Categorie'] == 3)
                    <td>
                        C-Poids-Lourds
                    </td>
                    @elseif($C['Categorie'] == 4)
                    <td>
                        D-Bus
                    </td>
                    @endif
                    @if($C['Experience'] == 1)
                    <td>
                        Debutant
                    </td>
                    @elseif($C['Experience'] == 2)
                    <td>
                        Intermediaire
                    </td>
                    @elseif($C['Experience'] == 2)
                    <td>
                        Professionnel
                    </td>
                    @endif
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
