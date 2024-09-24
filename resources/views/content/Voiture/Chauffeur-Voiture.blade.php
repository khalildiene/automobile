@extends('layouts/contentNavbarLayout')

@section('title', 'Change Statut Voiture')

@section('content')
<h4 class="py-3 mb-4"><span class="text-muted fw-light">Voiture /</span> Change Statut</h4>

<div class="row">
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Remplir les Champs</h5> <small class="text-muted float-end">Tout les Champs sont Oblifatoires.</small>
            </div>
            <div class="card-body">
                <form action="{{route('Chauffeur-Voiture')}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <input type="text" class="form-control text-uppercase" name="Id" value="{{$Voiture->id}}" hidden />
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-marque">Marque</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control text-uppercase" name="Marque" value="{{$Voiture->Marque}}" disabled />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-model">Model</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control text-uppercase" name="Model" value="{{$Voiture->Model}}" disabled />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-couleur">Couleur</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control text-uppercase" name="Couleur" value="{{$Voiture->Couleur}}" disabled>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-Matricule">Matricule</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control text-uppercase" name="Matricule" value="{{$Voiture->Matricule}}" disabled>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-type">Chauffeur</label>
                        <div class="col-sm-10">
                            <select name="Chauffeur" class="form-control">
                                <option selected disabled>CHOISIR LE CHAUFFEUR</option>
                                @foreach ($Chauffeur as $C)
                                <option class="text-uppercase" value="{{$C->id}}">{{$C->Prenom.' '.$C->Nom.' / '.$C->Categories->Description}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                            <button type="reset" class="btn btn-danger float-end">Anuller</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
