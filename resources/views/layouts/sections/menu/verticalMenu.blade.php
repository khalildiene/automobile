<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">

    <div class="app-brand demo">
        <a @if(Session::has('User') && Session::get('User')['profil']=="Administrateur" ) href="{{url('Acceuil')}}" @endif class="app-brand-link">
            <span class="app-brand-logo demo me-1">
                @include('_partials.macros',["height"=>20])
            </span>
            <span class="app-brand-text demo menu-text fw-semibold ms-2">ROYAL TOUR</span>
        </a>
    </div>

    <ul class="menu-inner py-1">
        @if(Session::has('User') && Session::get('User')['profil']=="Administrateur")
        <li class="menu-header fw-medium mt-4">
            <span class="menu-header-text">VOITURE</span>
        </li>
        <li class="menu-item">
            <a href="{{route('Creer-Voiture')}}" class="menu-link justify-content-around">
                <x-gmdi-add-chart />
                Creer Une Voiture
            </a>
        </li>
        <!--<li class="menu-item">
            <a href="{{route('Assignation-Voiture')}}" class="menu-link justify-content-around">
                <x-codicon-layers-active />
                Assigner Chauffeur
            </a>
        </li>
        -->
        <li class="menu-item">
            <a href="{{route('Gestion-Voiture')}}" class="menu-link justify-content-around">
                <x-carbon-cloud-service-management />
                Gestions Voitures
            </a>
        </li>
        <li class="menu-header fw-medium mt-4">
            <span class="menu-header-text">CHAUFFEUR</span>
        </li>
        <li class="menu-item">
            <a href="{{route('Creer-Chauffeur')}}" class="menu-link justify-content-around">
                <x-gmdi-add-chart />
                Creer Un Chauffeur
            </a>
        </li>
        <li class="menu-item">
            <a href="{{route('Gestion-Chauffeur')}}" class="menu-link justify-content-around">
                <x-carbon-cloud-service-management />
                Gestions Chauffeurs
            </a>
        </li>
        <li class="menu-header fw-medium mt-4">
            <span class="menu-header-text">RESERVATION</span>
        </li>
        <li class="menu-item">
            <a href="{{route('Creer-Reservation')}}" class="menu-link justify-content-around">
                <x-codicon-layers-active />
                Faire Une Reservation
            </a>
        </li>
        <li class="menu-item">
            <a href="{{route('Gestion-Reservation')}}" class="menu-link justify-content-around">
                <x-carbon-cloud-service-management />
                Gestions Reservation
            </a>
        </li>
        <li class="menu-header fw-medium mt-4">
            <span class="menu-header-text">TARIFICATION</span>
        </li>
        <li class="menu-item">
            <a href="{{route('Gestion-Tarification')}}" class="menu-link justify-content-around">
                <x-carbon-cloud-service-management />
                Gestions Tarification
            </a>
        </li>
        @endif
        @if(Session::has('User') && Session::get('User')['profil']=="Client")
        <li class="menu-header fw-medium mt-4">
            <span class="menu-header-text">CLIENT</span>
        </li>
        <li class="menu-item">
            <a href="{{route('Consulter-Reservation')}}" class="menu-link justify-content-around">
                <x-codicon-layers-active />
                Consulter Reservation
            </a>
        </li>
        @endif
    </ul>

</aside>
