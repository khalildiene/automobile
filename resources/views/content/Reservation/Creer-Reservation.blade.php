@extends('layouts/contentNavbarLayout')

@section('title', ' Creer Resercation')

@section('content')
<h4 class="py-3 mb-4"><span class="text-muted fw-light">Reservation /</span> Creer une Reservation</h4>

<div class="row">
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Remplir les Champs</h5> <small class="text-muted float-end">Tout les Champs sont Oblifatoires.</small>
            </div>
            <div class="card-body">
                <form action="{{route('Ajouter-Reservation')}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="row mb-3">
                        <label class="col-sm-10 col-form-label h1" for="basic-default-reservation">RESERVATION</label>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-depart">Lieu de Depart</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="Depart" placeholder="Donner Votre Lieu de Depart" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-arriver">Lieu d'arriver</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="Arriver" placeholder="Donner Votre Lieu d'arriver">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-distance">Distance</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name="Distance" placeholder="Donner la Distance">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-permis">Date</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control text-uppercase" name="Date">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-date">Heure de Depart</label>
                        <div class="col-sm-10">
                            <input type="time" class="form-control text-uppercase" name="Heure">
                        </div>
                    </div>
                    <div id="Faux" class="mb-3 d-flex justify-content-around">
                        <div class="">
                            NOUVEAU CLIENT
                            <input type="checkbox" id="checkbox1" class="form-checkbox" name="Nouveau" onclick="checkboxClicked(1)">
                        </div>
                        <div class="">
                            CLIENT EXISTENT
                            <input type="checkbox" id="checkbox2" class="form-checkbox" name="Existent" onclick="checkboxClicked(2)">
                        </div>
                    </div>
                    <!-- Nouveau Client -->
                    <div id="NouveauClient" style="display:none">
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-prenom">Prenom</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="Prenom" placeholder="Donner le Prenom">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-nom">Nom</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="Nom" placeholder="Donner le Nom">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-mail">Mail</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="Mail" placeholder="Donner le Mail">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-telephone">Telephone</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="Telephone" placeholder="Donner le Numero">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-adresse">Adresse</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="Adresse" placeholder="Donner l'adresse">
                            </div>
                        </div>
                    </div>
                    <!-- -->
                    <!-- Client Existent -->
                    <div id="ClientExistent" style="display:none">
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-client">Client</label>
                            <div class="col-sm-10">
                                <select name="Client" class="form-control">
                                    <option selected disabled>CHOISIR UN CLIENT</option>
                                    @foreach ($Client as $C)
                                    <option class="text-uppercase" value="{{$C['Email']}}">{{$C->Prenom.' '.$C->Nom.' '.' / '.$C->Email}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- -->
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

<script>
    function Affiche(I) {
        var Element;
        Element = document.getElementById(I);
        if (Element.style.display == "none") {
            Element.style.display = "";
        } else {
            Element.style.display = "none";
        }
    }

    function Masquer(I) {
        var Element;
        Element = document.getElementById(I);
        if (Element.style.display == "") {
            Element.style.display = "none";
        }
    }

    function checkboxClicked(checkboxNumber) {
        if (checkboxNumber === 1) {
            Affiche('NouveauClient')
            Masquer('ClientExistent')
            document.getElementById("checkbox2").checked = false;
        } else if (checkboxNumber === 2) {
            Affiche('ClientExistent')
            Masquer('NouveauClient')
            document.getElementById("checkbox1").checked = false;
        }
    }

</script>
