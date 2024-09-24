@extends('layouts/contentNavbarLayout')

@section('title', 'Resultats')

@section('content')
<h4 class="py-3 mb-4"><span class="text-muted fw-light">RRecherche /</span> Gestion des Reservation</h4>
</h4>

<div class="card">
    <h5 class="card-header">Resultats des Recherche</h5>
    <div class="table-responsive text-nowrap">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Categorie</th>
                    <th>Mots</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">

            </tbody>
        </table>
    </div>
</div>

@endsection
