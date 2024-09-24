@extends('layouts/contentNavbarLayout')

@section('title', ' Creer Chauffeur')

@section('content')
<h4 class="py-3 mb-4"><span class="text-muted fw-light">Voiture /</span> Ajouter une Voiture</h4>

<div class="row">
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Remplir les Champs</h5> <small class="text-muted float-end">Tout les Champs sont Oblifatoires.</small>
            </div>
            <div class="card-body">
                <form action="{{route('Ajouter-Chauffeur')}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Nom</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="Nom" placeholder="Entrer le Nom" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-auteur">Prenom</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="Prenom" placeholder="Entrer le Prenom">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-permis">Numero de Permis</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name="Numero" placeholder="Entrer le Nom du Partie">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-date">Date D'emission</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control text-uppercase" name="Emission">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-date">Categorie</label>
                        <div class="col-sm-10">
                            <select name="Categorie" class="form-control">
                                <option selected disabled>Choisir une Categorie</option>
                                @foreach ($Categorie as $C)
                                <option value="{{$C['id']}}">{{$C['Attribut'].' '.$C['Description']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-date">Experience</label>
                        <div class="col-sm-10">
                            <select name="Experience" class="form-control">
                                <option selected disabled>Choisir l'experience</option>
                                @foreach ($Experience as $E)
                                <option value="{{$E['id']}}">{{$E['Libeller']}}</option>
                                @endforeach
                            </select>
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
