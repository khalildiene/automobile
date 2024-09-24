@extends('layouts/contentNavbarLayout')

@section('title', ' Modifier Programme')

@section('content')
<h4 class="py-3 mb-4"><span class="text-muted fw-light">Programme /</span> Modifier un Programme</h4>

<div class="row">
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Remplir les Champs</h5> <small class="text-muted float-end">Tout les Champs sont Oblifatoires.</small>
            </div>
            <div class="card-body">
                @foreach($Liste as $Valeur)
                <form action="{{url('ModifierProgramme/'.$Valeur['id'].'/')}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Nom</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nom" placeholder="Nom du Programme" value="{{$Valeur['nom']}}" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-document">Document</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" name="contenue" name="programme">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-auteur">Auteur</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="auteur" placeholder="Entrer le Nom de l'auteur" value="{{$Valeur['auteur']}}">
                        </div>
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Modifier</button>
                            <button type="reset" class="btn btn-danger float-end">Anuller</button>
                        </div>
                    </div>
                    @endforeach
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
