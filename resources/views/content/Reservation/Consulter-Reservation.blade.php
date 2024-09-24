@extends('layouts/contentNavbarLayout')

@section('title', 'Consulter Reservations')

@section('content')
<h4 class="py-3 mb-4"><span class="text-muted fw-light">Reservation /</span> Consulter Reservation</h4>
</h4>

<div class="card">
    <h5 class="card-header">Tableau des Reservations</h5>
    <div class="table-responsive text-nowrap">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Trajet</th>
                    <th>Date</th>
                    <th>Depart</th>
                    <th>Note</th>
                    <th>Montant</th>
                    <th>Etat</th>
                    <th>Facture</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach($Liste as $R)
                <tr>
                    <td>
                        {{$R->Depart.' / '.$R->Arriver}}
                    </td>
                    <td>
                        {{$R->Date}}
                    </td>
                    <td class="text-center">
                        {{$R->Heure}}
                    </td>
                    @if($R->Etat == 3 && !($R->Notes))
                    <td>
                        <form method="post" action="{{route("Note-Chauffeur")}}">
                            @csrf
                            <input type="hidden" name="Id" value="{{$R->id}}" />
                            <select name="Note" class="form-select mb-1">
                                <option selected disabled>NOTE</option>
                                <option value="20">20</option>
                                <option value="40">40</option>
                                <option value="60">60</option>
                                <option value="80">80</option>
                                <option value="100">100</option>
                            </select>
                            <button type="submit" class="btn btn-success">
                                Ok
                            </button>
                        </form>
                    </td>
                    @elseif($R->Notes)
                    <td class="text-success text-center">
                        {{$R->Notes->Note}}
                    </td>
                    @else
                    <td class="text-center">
                        00
                    </td>
                    @endif
                    @if($R->Etat == 0)
                    <td>
                        0 FCFA
                    </td>
                    <td class="text-primary">
                        Attente
                    </td>
                    <td>
                    </td>
                    @elseif($R->Etat == 1)
                    <td>
                        {{$R->Tarifs->Montant.' '.'FCFA'}}
                    </td>
                    <td class="text-success">
                        Valider
                    </td>
                    <td>
                        <a href="{{url('Factures/'.$R->Tarifs->Facture.'/')}}" target="_blank" class="btn btn-white">
                            Facture
                        </a>
                    </td>
                    @elseif($R->Etat == 3)
                    <td>
                        {{$R->Tarifs->Montant.' '.'FCFA'}}
                    </td>
                    <td class="text-secondary">
                        Terminer
                    </td>
                    <td>
                        <a href="{{url('Factures/'.$R->Tarifs->Facture.'/')}}" target="_blank" class="btn btn-white">
                            Facture
                        </a>
                    </td>
                    @elseif($R->Etat == 2)
                    <td>
                        0 FCFA
                    </td>
                    <td class="text-danger">
                        Expirer
                    </td>
                    <td>
                        Indisponible
                    </td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
