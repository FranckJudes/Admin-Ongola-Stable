@extends('Master.main')
@section('links')

  <link rel="stylesheet" href="assets/bundles/datatables/datatables.min.css">
  <link rel="stylesheet" href="assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
@endsection
@section('content')
<section>
    <nav>
        <ol class="breadcrumb bg-primary text-white-all">
            <li class="breadcrumb-item"><a href="{{url('/')}}"><i class="fas fa-tachometer-alt"></i> dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-list"></i> Attribution </li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>Les Commandes</h4>
              </div>
              <div class="card-body">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                      aria-controls="home" aria-selected="true">Commande en cours de livraison</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                      aria-controls="profile" aria-selected="false">Commande en preparation</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                      aria-controls="contact" aria-selected="false">Commande Livree</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="contact-tab_cancel" data-toggle="tab" href="#contact_cancel" role="tab"
                      aria-controls="contact" aria-selected="false">Commande Annuler</a>
                  </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="card">
                        <div class="card-header">
                            <h4>Simple recherche</h4>
                        </div>
                        <div class="card-body" style="margin-left: auto;margin-right: auto;">
                            <form action="#" method="GET">

                                <div class="form-group" style="margin-left: auto;margin-right: auto; width:100%;">

                                </div>
                                <div class="form-group" style="margin-left: auto; margin-right: auto;">
                                    <input type="text" class="form-control" id="my_research_all_app_id"  name="query" placeholder="Recherche dans l'app" required>
                                </div>


                                    <div class="form-group"  style="margin-left: auto;margin-right: auto;width:100%">
                                        <button id="searchButton"  type="submit" class="btn btn-success"><i class="fas fa-search"></i> Rechercher</button>
                                    </div>

                            </form>
                        </div>
                    </div>
                        <div class="row">
                            @foreach ($commandeEnLivraisom as $item)
                            <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 mb-4">
                                <div class="card l-bg-green">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <h4 class="card-title mb-0">{{$item->commande->reference}}</h4>
                                        <a href="{{url('view_detail_order',$item->commande->id)}}" class="btn btn-primary btn-sm">Detail</a>
                                    </div>
                                    <div class="card-statistic-3">
                                        <div class="card-icon card-icon-large"><i class="fa fa-award"></i></div>

                                        <div class="card-content">
                                            <span>$2,658</span>
                                            <div class="progress mt-1 mb-1" data-height="8">
                                                <div class="progress-bar l-bg-green" role="progressbar" data-width="25%" aria-valuenow="25"
                                                    aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <p class="mt-3 mb-0 text-muted text-sm">
                                                <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 5.4%</span>
                                                <span class="text-nowrap">Since last month</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                              </div>
                            @endforeach
                        </div>
                    {{ $commandeEnLivraisom->links('pagination::bootstrap-5') }}

                  </div>
                  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="card">
                        <div class="card-header">
                            <h4>Simple recherche</h4>
                        </div>
                        <div class="card-body" style="margin-left: auto;margin-right: auto;">
                            <form action="#" method="GET">

                                <div class="form-group" style="margin-left: auto;margin-right: auto; width:100%;">

                                </div>
                                <div class="form-group" style="margin-left: auto; margin-right: auto;">
                                    <input type="text" class="form-control" id="my_research_all_app_id"  name="query" placeholder="Recherche dans l'app" required>
                                </div>


                                    <div class="form-group"  style="margin-left: auto;margin-right: auto;width:100%">
                                        <button id="searchButton"  type="submit" class="btn btn-success"><i class="fas fa-search"></i> Rechercher</button>
                                    </div>

                            </form>
                        </div>
                    </div>
                    <div class="row">
                        @foreach ($commandeEnPreparation as $item)
                            <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 mb-4">
                                <div class="card l-bg-purple">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <h4 class="card-title mb-0">{{$item->commande->reference}}</h4>
                                        <a href="{{url('view_detail_order',$item->commande->id)}}" class="btn btn-primary btn-sm">Details</a>
                                    </div>
                                    <div class="card-statistic-3">
                                        <div class="card-icon card-icon-large"><i class="fa fa-globe"></i></div>
                                        <div class="card-content">
                                            <span>$2,658</span>
                                            <div class="progress mt-1 mb-1" data-height="8">
                                                <div class="progress-bar l-bg-green" role="progressbar" data-width="25%" aria-valuenow="25"
                                                    aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <p class="mt-3 mb-0 text-muted text-sm">
                                                <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 5.4%</span>
                                                <span class="text-nowrap">Since last month</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    {{ $commandeEnPreparation->links('pagination::bootstrap-5') }}

                  </div>
                  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                    <div class="card">
                        <div class="card-header">
                            <h4>Simple recherche</h4>
                        </div>
                        <div class="card-body" style="margin-left: auto;margin-right: auto;">
                            <form action="#" method="GET">

                                <div class="form-group" style="margin-left: auto;margin-right: auto; width:100%;">

                                </div>
                                <div class="form-group" style="margin-left: auto; margin-right: auto;">
                                    <input type="text" class="form-control" id="my_research_all_app_id"  name="query" placeholder="Recherche dans l'app" required>
                                </div>


                                    <div class="form-group"  style="margin-left: auto;margin-right: auto;width:100%">
                                        <button id="searchButton"  type="submit" class="btn btn-success"><i class="fas fa-search"></i> Rechercher</button>
                                    </div>

                            </form>
                        </div>
                    </div>
                    <div class="row">
                        @foreach ($commandeLivree as $item)
                            <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 mb-4">
                                <div class="card l-bg-green">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <h4 class="card-title mb-0">{{$item->commande->reference}}</h4>
                                        <a href="{{url('view_detail_order',$item->commande->id)}}" class="btn btn-primary btn-sm">Details</a>
                                    </div>
                                    <div class="card-statistic-3">
                                        <div class="card-icon card-icon-large">
                                            <i class="fa fa-briefcase"></i>
                                        </div>
                                        <div class="card-content">
                                            <span>$2,658</span>
                                            <div class="progress mt-1 mb-1" data-height="8">
                                                <div class="progress-bar l-bg-green" role="progressbar" data-width="25%" aria-valuenow="25"
                                                    aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <p class="mt-3 mb-0 text-muted text-sm">
                                                <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 5.4%</span>
                                                <span class="text-nowrap">Since last month</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    {{ $commandeLivree->links('pagination::bootstrap-5') }}
                  </div>
                  <div class="tab-pane fade" id="contact_cancel" role="tabpanel" aria-labelledby="contact-tab">
                        <div class="card">
                            <div class="card-header">
                                <h4>Simple recherche</h4>
                            </div>
                            <div class="card-body" style="margin-left: auto;margin-right: auto;">
                                <form action="#" method="GET">

                                    <div class="form-group" style="margin-left: auto;margin-right: auto; width:100%;">

                                    </div>
                                    <div class="form-group" style="margin-left: auto; margin-right: auto;">
                                        <input type="text" class="form-control" id="my_research_all_app_id"  name="query" placeholder="Recherche dans l'app" required>
                                    </div>


                                        <div class="form-group"  style="margin-left: auto;margin-right: auto;width:100%">
                                            <button id="searchButton"  type="submit" class="btn btn-success"><i class="fas fa-search"></i> Rechercher</button>
                                        </div>

                                </form>
                            </div>
                        </div>
                        <div class="row">
                            @foreach ($commandeEnAnnuler as $item)
                                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 mb-4">
                                    <div class="card l-bg-orange">
                                        <div class="card-header d-flex justify-content-between align-items-center">
                                            <h4 class="card-title mb-0">{{$item->commande->reference}}</h4>
                                            <a href="{{url('view_detail_order',$item->commande->id)}}" class="btn btn-primary btn-sm">Detail</a>
                                        </div>
                                        <div class="card-statistic-3">
                                            <div class="card-icon card-icon-large">
                                                <i class="fa fa-money-bill-alt"></i>
                                            </div>
                                            <div class="card-content">
                                                <span>$2,658</span>
                                                <div class="progress mt-1 mb-1" data-height="8">
                                                    <div class="progress-bar l-bg-green" role="progressbar" data-width="25%" aria-valuenow="25"
                                                        aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <p class="mt-3 mb-0 text-muted text-sm">
                                                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 5.4%</span>
                                                    <span class="text-nowrap">Since last month</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        {{ $commandeEnAnnuler->links('pagination::bootstrap-5') }}
                    </div>
                  </div>

              </div>
            </div>
          </div>
    </div>
</section>

@endsection


@section('scripts')
    <script src="assets/bundles/datatables/datatables.min.js"></script>
    <script src="assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script src="assets/bundles/datatables/export-tables/dataTables.buttons.min.js"></script>
    <script src="assets/bundles/datatables/export-tables/buttons.flash.min.js"></script>
    <script src="assets/bundles/datatables/export-tables/jszip.min.js"></script>
    <script src="assets/bundles/datatables/export-tables/pdfmake.min.js"></script>
    <script src="assets/bundles/datatables/export-tables/vfs_fonts.js"></script>
    <script src="assets/bundles/datatables/export-tables/buttons.print.min.js"></script>
    <script src="assets/js/page/datatables.js"></script>

    <script>





    </script>
@endsection
