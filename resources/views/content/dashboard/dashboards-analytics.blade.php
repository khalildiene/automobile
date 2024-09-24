@extends('layouts/contentNavbarLayout')

@section('title', 'Accueil')

@section('vendor-style')
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}">
@endsection

@section('vendor-script')
<script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
@endsection

@section('page-script')
<script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>
@endsection

@section('content')

<div class="p-6 m-20 bg-white rounded shadow mb-4">
    <div class="card h-100">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="card-title m-0 me-2">Chauffeur</h5>
        </div>
        <div class="card-body">
            <ul class="p-0 m-0">
                @foreach($Chauffeur as $C)
                <li class="d-flex mb-4 pb-1">
                    <div class="avatar flex-shrink-0 me-3">
                        <img src="{{ asset('Chauffeur/' . ($C->Image ?? 'default.png')) }}" class="w-px-50 h-auto rounded-circle">
                    </div>
                    <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                        <div class="me-2">
                            <small class="text-muted d-block mb-1">{{ $C->Prenom . ' ' . $C->Nom }}</small>
                            <h6 class="mb-0">{{ ($C->Categories->Description ?? 'Aucune catégorie') . ' / ' . ($C->Experiences->Libeller ?? 'Aucune expérience') }}</h6>
                        </div>
                        <div class="user-progress d-flex align-items-center gap-1">
                            @php
                            $note = $Note->firstWhere('Chauffeur', $C->id);
                            @endphp
                            @if($note)
                            <h6 class="mb-0">{{ $note->Note }}</h6> <span class="text-muted">Points</span>
                            @else
                            <h6 class="mb-0">00</h6> <span class="text-muted">Points</span>
                            @endif
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>

<div class="p-6 m-20 bg-white rounded shadow mb-4">
    <div class="card h-100">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="card-title m-0 me-2">Réservation</h5>
        </div>
        <div class="card-body">
            <ul class="p-0 m-0">
                @foreach($Reservation as $R)
                <li class="d-flex mb-4 pb-1">
                    <div class="avatar flex-shrink-0 me-3">
                        <img src="{{ asset('Voitures/' . ($R->Voitures->Image ?? 'default-car.png')) }}" class="w-px-50 h-auto rounded-circle">
                    </div>
                    <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                        <div class="me-2">
                            <small class="text-muted d-block mb-1">{{ $R->Depart . ' / ' . $R->Arriver }}</small>
                            @switch($R->Etat)
                                @case(0)
                                <h6 class="mb-0 text-primary">Attente</h6>
                                @break
                                
                                @case(1)
                                <h6 class="mb-0 text-success">Valider</h6>
                                @break
                                
                                @case(2)
                                <h6 class="mb-0 text-danger">Expirer</h6>
                                @break
                                
                                @case(3)
                                <h6 class="mb-0 text-secondary">Terminer</h6>
                                @break
                                
                                @default
                                <h6 class="mb-0 text-muted">Inconnu</h6>
                            @endswitch
                        </div>
                        <div class="user-progress d-flex align-items-center gap-1">
                            <h6 class="mb-0">{{ $R->Date }}</h6> <span class="text-muted">/</span>
                            <h6 class="mb-0">{{ $R->Heure }}</h6>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>

<div class="p-6 m-20 bg-white rounded shadow mb-4">
    <div class="card h-100">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="card-title m-0 me-2">Voitures</h5>
        </div>
        <div class="card-body">
            <ul class="p-0 m-0">
                @foreach($Voiture as $V)
                <li class="d-flex mb-4 pb-1">
                    <div class="avatar flex-shrink-0 me-3">
                        <img src="{{ asset('Voitures/' . ($V->Image ?? 'default-car.png')) }}" class="w-px-50 h-auto rounded-circle">
                    </div>
                    <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                        <div class="me-2">
                            <small class="text-muted d-block mb-1">{{ $V->Marque }}</small>
                            <h6 class="mb-0">{{ $V->Model . ' / ' . $V->Matricule }}</h6>
                            <small class="text-muted d-block mb-1">Statut {{ $V->Statuts->Description ?? 'Inconnu' }}</small>
                        </div>
                        <div class="user-progress d-flex align-items-center gap-1">
                            <h6 class="mb-0">Compteur</h6> <span class="text-muted">:</span>
                            <h6 class="mb-0">{{ $V->Kilometrage }}</h6> <span class="text-muted">Km</span>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>

<div class="p-6 m-20 bg-white rounded shadow mb-4">
    {{ $chart->container() }}
</div>

<script src="{{ $chart->cdn() }}"></script>
{{ $chart->script() }}

@endsection
