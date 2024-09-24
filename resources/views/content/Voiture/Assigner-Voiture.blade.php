@extends('layouts/contentNavbarLayout')

@section('title', 'Assigner Voiture')

@section('content')
<h4 class="py-3 mb-4"><span class="text-muted fw-light">Voiture /</span> Assigner une Voiture</h4>

<div class="row">
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Remplir les Champs</h5> <small class="text-muted float-end">Tout les Champs sont Oblifatoires.</small>
            </div>
            <div class="card-body">
                <form action="{{route('Assigner-Voiture')}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-type">Voiture</label>
                        <div class="col-sm-10">
                            <select name="Voiture" class="form-control">
                                <option class="mb-3" selected disabled>CHOISIR LA VOITURE</option>
                                @foreach ($Voiture as $V)
                                <option class="text-uppercase" value="{{$V['id']}}">{{$V['Marque'].' '.$V['Model']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-type">Chauffeur</label>
                        <div class="col-sm-10">
                            <select name="Chauffeur" class="form-control">
                                <option selected disabled>CHOISIR LE CHAUFFEUR</option>
                                @foreach ($Chauffeur as $C)
                                <option class="text-uppercase" value="{{$C['id']}}">{{$C['Prenom'].' '.$C['Nom'].' / '.$C->Categories->Description}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    @if($errors->any())
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-type">Impossible</label>
                        <div class="col-sm-10">
                            <h4 class="form-control border-danger text-center">{{$errors->first()}}</h4>
                        </div>
                    </div>
                    @endif
                    <div class="row justify-content-end">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Assigner</button>
                            <button type="reset" class="btn btn-danger float-end">Anuller</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
