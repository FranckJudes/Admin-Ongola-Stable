@extends('Master.main')
@section('links')


@endsection

@section('content')
<nav>
    <ol class="breadcrumb bg-primary text-white-all">
        <li class="breadcrumb-item"><a href="{{url('/')}}"><i class="fas fa-tachometer-alt"></i> dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-list"></i> Perfomances Livreurs </li>
    </ol>
</nav>

<section class="section">
    <div class="card">
        <div class="card-header">
            <h4>Les livreurs</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <div class="list-group" id="list-tab" role="tablist">
                        @foreach ($livreurs as $item)
                            <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list"
                            href="#list-messages" role="tab">{{$item->nom .'  '. $item->prenom}}</a>
                        @endforeach
                    </div>
                    <div>
                        {{ $livreurs->links('pagination::bootstrap-5')}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-sm-12 col-lg-12">
          <div class="card ">
            <div class="card-header">
              <h4>Performances des livreurs </h4>
              <div class="card-header-action">
                <div class="dropdown">
                  <a href="#" data-toggle="dropdown" class="btn btn-warning dropdown-toggle">Options</a>
                  <div class="dropdown-menu">
                    <a href="#" class="dropdown-item has-icon"><i class="fas fa-eye"></i> View</a>
                    <a href="#" class="dropdown-item has-icon"><i class="far fa-edit"></i> Edit</a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item has-icon text-danger"><i class="far fa-trash-alt"></i>
                      Delete</a>
                  </div>
                </div>
                <a href="#" class="btn btn-primary">View All</a>
              </div>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-9">
                  <div id="chart1"></div>
                  <div class="row mb-0">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                      <div class="list-inline text-center">
                        <div class="list-inline-item p-r-30"><i data-feather="arrow-up-circle"
                            class="col-green"></i>
                          <h5 class="m-b-0">$675</h5>
                          <p class="text-muted font-14 m-b-0">Performance du Week-end</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                      <div class="list-inline text-center">
                        <div class="list-inline-item p-r-30"><i data-feather="arrow-down-circle"
                            class="col-orange"></i>
                          <h5 class="m-b-0">$1,587</h5>
                          <p class="text-muted font-14 m-b-0">Performances du Mois</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                      <div class="list-inline text-center">
                        <div class="list-inline-item p-r-30"><i data-feather="arrow-up-circle"
                            class="col-green"></i>
                          <h5 class="mb-0 m-b-0">$45,965</h5>
                          <p class="text-muted font-14 m-b-0">Performances de l'annee</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3">
                  <div class="row mt-5">
                    <div class="col-7 col-xl-7 mb-3">Total customers</div>
                    <div class="col-5 col-xl-5 mb-3">
                      <span class="text-big">8,257</span>
                      <sup class="col-green">+09%</sup>
                    </div>
                    <div class="col-7 col-xl-7 mb-3">Total Income</div>
                    <div class="col-5 col-xl-5 mb-3">
                      <span class="text-big">$9,857</span>
                      <sup class="text-danger">-18%</sup>
                    </div>
                    <div class="col-7 col-xl-7 mb-3">Project completed</div>
                    <div class="col-5 col-xl-5 mb-3">
                      <span class="text-big">28</span>
                      <sup class="col-green">+16%</sup>
                    </div>
                    <div class="col-7 col-xl-7 mb-3">Total expense</div>
                    <div class="col-5 col-xl-5 mb-3">
                      <span class="text-big">$6,287</span>
                      <sup class="col-green">+09%</sup>
                    </div>
                    <div class="col-7 col-xl-7 mb-3">New Customers</div>
                    <div class="col-5 col-xl-5 mb-3">
                      <span class="text-big">684</span>
                      <sup class="col-green">+22%</sup>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
</section>
@endsection



@section('scripts')


@endsection
