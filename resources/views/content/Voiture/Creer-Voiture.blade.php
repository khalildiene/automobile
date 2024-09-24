@extends('layouts/contentNavbarLayout')

@section('title', ' Creer Voiture')

@section('content')
<h4 class="py-3 mb-4"><span class="text-muted fw-light">Voiture /</span> Ajouter une Voiture</h4>

<div class="row">
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Remplir les Champs</h5> <small class="text-muted float-end">Tout les Champs sont Oblifatoires.</small>
            </div>
            <div class="card-body">
                <form action="{{route('Ajouter-Voiture')}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-marque">Marque</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="Marque" placeholder="Entrer la Marque" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-model">Model</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="Model" placeholder="Entrer le Model" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-couleur">Couleur</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="Couleur" placeholder="Choisir Une Couleur">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-Matricule">Matricule</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="Matricule" placeholder="Imatriculation">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-type">Type</label>
                        <div class="col-sm-10">
                            <select name="Type" class="form-control">
                                <option selected disabled>Type de Voiture</option>
                                @foreach ($Type as $T)
                                <option value="{{$T['id']}}">{{$T['Type']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-type">Statut</label>
                        <div class="col-sm-10">
                            <select name="Statut" class="form-control">
                                <option selected disabled>Statut de la Voiture</option>
                                @foreach ($Statut as $S)
                                <option value="{{$S['id']}}">{{$S['Description']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-kilometrage">Kilometrage</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name="Kilometrage" placeholder="Entrer le Nombre de Kilometre">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-document">Image</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" name="Image">
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
