@extends('layouts/blankLayout')

@section('title', 'Register Basic - Pages')

@section('page-style')
<!-- Page -->
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-auth.css')}}">
@endsection


@section('content')
<div class="position-relative">
    <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner py-4">

            <div class="card p-2">

                <div class="app-brand justify-content-center mt-5">
                    <a class="app-brand-link gap-2">
                        <span class="app-brand-logo demo">@include('_partials.macros',["height"=>20])</span>
                        <span class="app-brand-text demo text-heading fw-semibold">Khalil</span>
                    </a>
                </div>

                <div class="card-body mt-2">

                    <form id="formAuthentication" class="mb-3" action="{{url('Creation/AjouterUtilisateur')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-floating form-floating-outline mb-3">
                            <input type="text" class="form-control" id="nom" name="nom" placeholder="Entrer Votre Nom" autofocus>
                            <label for="nom">Nom</label>
                        </div>
                        <div class="form-floating form-floating-outline mb-3">
                            <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Entrer Votre Prenom" autofocus>
                            <label for="nom">Prenom</label>
                        </div>
                        <div class="form-floating form-floating-outline mb-3">
                            <input type="email" class="form-control" id="username" name="email" placeholder="Enter your email">
                            <label for="email">Email</label>
                        </div>
                        <div class="mb-3 form-password-toggle">
                            <div class="input-group input-group-merge">
                                <div class="form-floating form-floating-outline">
                                    <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                                    <label for="password">Mot de Passe</label>
                                </div>
                                <span class="input-group-text cursor-pointer"><i class="mdi mdi-eye-off-outline"></i></span>
                            </div>
                        </div>
                        <button class="btn btn-primary d-grid w-100" type="submit">
                            Creer Un Compte
                        </button>
                    </form>

                    <p class="text-center">
                        <span>Vous avez deja Un Compte ?</span>
                        <a href="{{url('Connexion')}}">
                            <span>Se Connecter</span>
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    @endsection
