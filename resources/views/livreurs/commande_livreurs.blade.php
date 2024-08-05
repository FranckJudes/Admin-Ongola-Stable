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
    </ol>
</nav>

<div class="card">
    <div class="card-header">
        <h4>Les Commandes en attente de livreurs</h4>
        <div class="card-header-action">
            <button class="btn btn-primary" onclick="get_order_for_delivery();" data-toggle="modal" data-target="#exampleModal">Attribuer a un livreur</button>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            @foreach ($commandeEnPreparation as $item)
                <div class="col-3">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h4>
                                <input type="checkbox" value="{{$item->commande->id}}" class="form-control custom-checkbox" name="commande_checkbox">
                            </h4>
                            <div class="card-header-action">
                                    <a href="{{url('view_detail_order',$item->commande->id)}}" class="btn btn-primary"><i class="fas fa-eye"></i> Details</a>

                            </div>
                        </div>
                        <div class="card-body">
                          <h6> <u>Partenaire</u>  :{{$item->commande->partenaire->nom}}</h6>
                          <h6>Destination :{{$item->commande->receive_client->adresse}}</h6>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{$commandeEnPreparation->links('pagination::bootstrap-5')}}
    </div>
</div>




@endsection
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="formModal"
aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="formModal">Attribuer aux livreurs :</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
        <form action="{{ route('save_to_orders_for_delevery') }}" method="POST" ">
            @csrf
            <div class="form-group">
                <label>Choisir le livreur :</label>
                <div class="input-group">
                    <select class="form-control select2" name="livreurs" style="width: 100%" data-placeholder="Sélectionnez vos options">
                        @foreach ($Livreurs as $item)
                            <option value="{{ $item->id }}">{{ $item->nom . ' ' . $item->prenom }}</option>
                        @endforeach
                    </select>
                </div>
                <input type="hidden" name="commande_aux_livreurs" id="commande_aux_livreurs">
            </div>
            <button type="submit" style="width: 100%" class="btn btn-success m-t-15 waves-effect">Attribuer</button>
        </form>
    </div>
  </div>
</div>
</div>


@section('scripts')


    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var checkboxes = document.querySelectorAll('.custom-checkbox');

            checkboxes.forEach(function (checkbox) {
                checkbox.addEventListener('change', function () {
                    var card = checkbox.closest('.card');

                    if (checkbox.checked) {
                        card.classList.add('selected-card');
                    } else {
                        card.classList.remove('selected-card');
                    }

                });
            });


        });
    </script>
    <script>


function get_order_for_delivery() {
        try {
            // Récupérer toutes les cases à cocher qui sont cochées
            var checkboxes = document.querySelectorAll('input[type="checkbox"]:checked');

            // Tableau pour stocker les valeurs des cases cochées
            var checkedCheckboxes = [];

            // Parcourir toutes les cases cochées et obtenir leurs valeurs
            checkboxes.forEach(function(checkbox) {
                checkedCheckboxes.push(checkbox.value);
            });

            console.log(checkedCheckboxes);
            // Attribuer les valeurs des cases cochées au champ caché dans le formulaire
            document.getElementById('commande_aux_livreurs').value = checkedCheckboxes.join(',');

        } catch (error) {
            console.error('Erreur:', error);
            // Gérez l'erreur si nécessaire
        }
    }


    </script>
@endsection
