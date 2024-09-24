@extends('layouts/contentNavbarLayout')

@section('title', ' Validation Resercation')

@section('content')
<h4 class="py-3 mb-4"><span class="text-muted fw-light">Reservation /</span> Validation</h4>

<div class="row">
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Remplir les Champs</h5> <small class="text-muted float-end">Tout les Champs sont Oblifatoires.</small>
            </div>
            <div class="card-body">
                <form action="{{route('Valider')}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <input type="text" class="form-control" name="Id" value="{{$Liste->id}}" hidden />
                    <div class="row mb-3">
                        <label class="col-sm-10 col-form-label h1" for="basic-default-reservation">RESERVATION</label>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-depart">Lieu de Depart</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="Depart" value="{{$Liste->Depart}}" disabled />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-arriver">Lieu d'arriver</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="Arriver" value="{{$Liste->Arriver}}" disabled>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-permis">Date</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control text-uppercase" name="Date" value="{{$Liste->Date}}" disabled>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-date">Heure de Depart</label>
                        <div class="col-sm-10">
                            <input type="time" class="form-control text-uppercase" name="Heure" value="{{$Liste->Heure}}" disabled>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <h1 class="col-sm-10 col-form-label  text-bold" for="basic-default-client">CLIENT</h1>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-prenom">Prenom</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="Prenom" value="{{$Liste->Clients->Prenom}}" disabled>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-nom">Nom</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="Nom" value="{{$Liste->Clients->Nom}}" disabled>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-telephone">Telephone</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="Telephone" value="{{$Liste->Clients->Telephone}}" disabled>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <h1 class="col-sm-10 col-form-label  text-bold" for="basic-default-client">PAIEMENT</h1>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-datepaiement">Voiture</label>
                        <div class="col-sm-10">
                            <select name="Voiture" class="form-control">
                                <option selected disabled>Attribuer une Voiture</option>
                                @foreach($Voiture as $V)
                                <option value="{{$V->id}}">{{$V->Marque.' - '.$V->Model.' - '.$V->Matricule}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-datepaiement">Paiement</label>
                        <div class="col-sm-10">
                            <select name="Moyen" class="form-control">
                                <option selected disabled>Moyen de Paiement</option>
                                <option value="Argent Liquide">Argent Liquide</option>
                                <option value="Mobile Monnaie">Mobile Monnaie</option>
                                <option value="Carte Bancaire">Carte Bancaire</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-datepaiement">Montant</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name="Montant" placeholder="Donner le Montant">
                        </div>
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Valider</button>
                            <button type="reset" class="btn btn-danger float-end">Annuler</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
