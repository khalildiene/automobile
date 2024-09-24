@extends('layouts/blankLayout')

@section('title', 'Connexion')

@section('page-style')

<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-auth.css')}}">
@endsection

@section('content')
<div class="position-relative">
    <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner py-4">

            <div class="card p-2">

                <div class="app-brand justify-content-center mt-5">
                    <a class="app-brand-link gap-2">
                        <span class="app-brand-logo demo">@include('_partials.macros',["height"=>20,"withbg"=>'fill: #fff;'])</span>
                        <span class="app-brand-text demo text-heading fw-semibold">Khalil</span>
                    </a>
                </div>

                <div class="card-body mt-2">
                    <h4 class="mb-2">BIENVENUE !</h4>
                    <p class="mb-4">Connectez-Vous Pour Continuer</p>

                    <form id="formAuthentication" class="mb-3" action="{{url('Connexion/Verification')}}" method="POST">
                        @csrf
                        <div class="form-floating form-floating-outline mb-3">
                            <input type="text" class="form-control" id="email" name="email" placeholder="Entrer Votre Identifiant" autofocus>
                            <label for="email">Identifiant</label>
                        </div>
                        <div class="mb-3">
                            <div class="form-password-toggle">
                                <div class="input-group input-group-merge">
                                    <div class="form-floating form-floating-outline">
                                        <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                                        <label for="password">Mot de Passe</label>
                                    </div>
                                    <span class="input-group-text cursor-pointer"><i class="mdi mdi-eye-off-outline"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 d-flex justify-content-between">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="remember-me">
                                <label class="form-check-label" for="remember-me">
                                    Se Souvenir de Moi !
                                </label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary d-grid w-100" type="submit">Se Connecter</button>
                        </div>
                    </form>

                    <p class="text-center">
                        <span>Nouveau Sur le Plateform ?</span>
                        <a href="{{url('Creation')}}">
                            <span>Creer un Compte</span>
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
