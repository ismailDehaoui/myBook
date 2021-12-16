
@extends('layouts.master')
@Section('content')
<div class="container-fluid py-4">
      <div class="row">
<div class="col-xl-3 col-sm-6">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">credit_card_off</i>
              </div>
              <div class="text-end pt-1">
                <!--p class="text-sm mb-0 text-capitalize">Sales</p-->
                <h4 class="mb-0">Catégories supprimées</h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <div class="d-flex align-items-center justify-content-between">
                        <a href="{{url('/catsupp')}}"><button type="button" class="btn btn-outline-primary btn-sm mb-0">Détailles</button>
                      </a></div>
            </div>
          </div>
       
    </div>
    <div class="col-xl-3 col-sm-6">
        <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">person_add_disabled</i>
              </div>
              <div class="text-end pt-1">
                <!--p class="text-sm mb-0 text-capitalize">Sales</p-->
                <h4 class="mb-0"> Utilisateurs supprimés</h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <div class="d-flex align-items-center justify-content-between">
                        <a href="{{url('/gestsupp')}}"><button type="button" class="btn btn-outline-primary btn-sm mb-0">Détailles</button>
                      </a></div>
            </div>
          </div>
    </div>
   <div class="col-xl-3 col-sm-6">
        <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">no_backpack</i>
              </div>
              <div class="text-end pt-1">
                <!--p class="text-sm mb-0 text-capitalize">Sales</p-->
                <h4 class="mb-0"> Les livres  supprimés</h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <div class="d-flex align-items-center justify-content-between">
                        <a href="{{url('/lsupp')}}"><button type="button" class="btn btn-outline-primary btn-sm mb-0">Détailles</button>
                      </a></div>
            </div>
          </div>
    </div>
        <div class="col-xl-3 col-sm-6">
        <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">person_add_disabled</i>
              </div>
              <div class="text-end pt-1">
                <!--p class="text-sm mb-0 text-capitalize">Sales</p-->
                <h4 class="mb-0"> Abonnés supprimés</h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <div class="d-flex align-items-center justify-content-between">
                        <a href="{{url('/abonsupp')}}"><button type="button" class="btn btn-outline-primary btn-sm mb-0">Détailles</button>
                      </a></div>
            </div>
          </div>
    </div>
    </div>
    </div>
@endsection('content')
<?php $user = auth()->user();?>
@if($user->est_super_admin)
@Section('admin')
<li class="nav-item">
          <a class="nav-link text-white " href="{{url('/affgest')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">engineering</i>
            </div>
            <span class="nav-link-text ms-1">Les utilisateurs</span>
          </a>
        </li>
@endsection('admin')
@endif

