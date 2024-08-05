@extends('Master.main')
@section('links')

  <link rel="stylesheet" href="assets/bundles/datatables/datatables.min.css">
  <link rel="stylesheet" href="assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
  <style>
    .custom-checkbox {
        transform: scale(1.8); /* Ajustez cette valeur pour agrandir le checkbox */
        -webkit-transform: scale(1.8);
        -moz-transform: scale(1.8);
        -ms-transform: scale(1.8);
        -o-transform: scale(1.8);
    }

    .selected-card {
        border: 2px solid #007bff; /* Changez la couleur et l'épaisseur de la bordure selon vos besoins */
    }
</style>


@endsection

@section('content')

<nav>
    <ol class="breadcrumb bg-primary text-white-all">
        <li class="breadcrumb-item"><a href="{{url('/')}}"><i class="fas fa-tachometer-alt"></i> dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-list"></i> Attribution </li>
        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-list"></i> Details de la commandes </li>

    </ol>
</nav>
{{-- @switch()
    @case()

        @break

    @default

@endswitch --}}
<div class="alert alert-info alert-has-icon">
    <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
    <div class="alert-body">
        @if ($commande->status)
            <div class="alert-title">Commande en cours</div>
            Nous attendons l'approbation du livreur
        @else
            <div class="alert-title">Livraison effectuée avec succès</div>
            Commande a été livrée
        @endif
    </div>
</div>

<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <h4>Details de Commande</h4>
                <div class="card-header-action">

                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-bordered table-md">
                            <tr>
                                <td class="align-middle">Reference Commande :</td>
                                <td>
                                    {{$commande->commande->reference}}
                                </td>
                            </tr>
                            <tr>
                                <td class="align-middle">Type de livraison :</td>
                                <td>
                                    {{$commande->commande->type_livraison}}
                                </td>
                            </tr>
                            <tr>
                                <td class="align-middle">Montant de la transaction :</td>
                                <td>
                                    {{$commande->commande->totaux}}  FCFA
                                </td>
                            </tr>
                            <tr>
                                <td class="align-middle">Date et Heure de soumission :</td>
                                <td>
                                    {{$commande->commande->created_at}}
                                </td>
                            </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <h4>Client Recepteur</h4>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-bordered table-md">
                            <tr>
                                <td class="align-middle">Nom :</td>
                                <td>
                                    {{$commande->commande->receive_client->name}}
                                </td>
                            </tr>
                            <tr>
                                <td class="align-middle">Prenom :</td>
                                <td>
                                    {{$commande->commande->receive_client->lastname}}
                                </td>
                            </tr>
                            <tr>
                                <td class="align-middle">Telephone :</td>
                                <td>
                                    {{$commande->commande->receive_client->telephone}}
                                </td>
                            </tr>
                            <tr>
                                <td class="align-middle">Adresse de destination du colis :</td>
                                <td>
                                    {{$commande->commande->receive_client->adresse}}
                                </td>
                            </tr>
                    </table>
                </div>

            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <h4>Partenaires </h4>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-bordered table-md">
                            <tr>
                                <td class="align-middle">Nom Complet:</td>
                                <td>
                                    {{$commande->commande->partenaire->nom}}
                                </td>
                            </tr>
                            <tr>
                                <td class="align-middle">CNI :</td>
                                <td>
                                    {{$commande->commande->partenaire->cni}}
                                </td>
                            </tr>
                            <tr>
                                <td class="align-middle">E-mail</td>
                                <td>
                                    {{$commande->commande->partenaire->email}}
                                </td>
                            </tr>
                            <tr>
                                <td class="align-middle">Adresse du parteanire :</td>
                                <td>
                                    {{$commande->commande->partenaire->adresse}}
                                </td>
                            </tr>
                    </table>
                </div>

            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <h4>Livreurs </h4>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-bordered table-md">
                            <tr>
                                <td class="align-middle">Nom Complet:</td>
                                <td>
                                    {{$commande->commande->livreurs->nom}}
                                </td>
                            </tr>
                            <tr>
                                <td class="align-middle">Prenom :</td>
                                <td>
                                    {{$commande->commande->livreurs->prenom}}
                                </td>
                            </tr>
                            <tr>
                                <td class="align-middle">Contact (Telephone)</td>
                                <td>
                                    {{$commande->commande->livreurs->telephone}}
                                </td>
                            </tr>
                            <tr>
                                <td class="align-middle">Adresse du parteanire :</td>
                                <td>
                                    {{$commande->commande->livreurs->adresse}}
                                </td>
                            </tr>
                            <tr>
                                <td class="align-middle">situation matrimoniale :</td>
                                <td>
                                    {{$commande->commande->livreurs->situation_matrimoniale}}
                                </td>
                            </tr>
                           <tr>
                            <td class="align-middle">Statut du livreur :</td>
                            <td>
                                {!! ($commande->commande->livreurs->status ?? '0') == '1'
                                    ? '<span class="badge badge-success">Actif</span>'
                                    : '<span class="badge badge-secondary">Suspendu</span>'
                                !!}
                            </td>
                           </tr>

                    </table>
                </div>

            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4>Contenu de la commande</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-striped table-hover" id="save-stage" style="width:100%;">
                        <thead>
                            <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Office</th>
                            <th>Age</th>
                            <th>Start date</th>
                            <th>Salary</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <td>Tiger Nixon</td>
                            <td>System Architect</td>
                            <td>Edinburgh</td>
                            <td>61</td>
                            <td>2011/04/25</td>
                            <td>$320,800</td>
                            </tr>
                            <tr>
                            <td>Garrett Winters</td>
                            <td>Accountant</td>
                            <td>Tokyo</td>
                            <td>63</td>
                            <td>2011/07/25</td>
                            <td>$170,750</td>
                            </tr>
                            <tr>
                            <td>Ashton Cox</td>
                            <td>Junior Technical Author</td>
                            <td>San Francisco</td>
                            <td>66</td>
                            <td>2009/01/12</td>
                            <td>$86,000</td>
                            </tr>
                            <tr>
                            <td>Cedric Kelly</td>
                            <td>Senior Javascript Developer</td>
                            <td>Edinburgh</td>
                            <td>22</td>
                            <td>2012/03/29</td>
                            <td>$433,060</td>
                            </tr>
                        </tbody>
                </table>
            </div>
        </div>
    </div>
</div>





@endsection



@section('scripts')


@endsection
