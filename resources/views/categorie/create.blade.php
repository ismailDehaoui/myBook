<<<<<<< HEAD
@extends('layouts.master')

@Section('content')

<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card my-4">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
              <h6 class="text-white <!--text-capitalize--> ps-3">Ajouter une nouvelle catégorie</h6>
            </div>
          </div>
          <div class="card-body px-0 pb-2">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ url('catégories') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group my-3">
                                <label for="nom-categorie">Catégorie</label>
                                <input type="text" name="nom-categorie" class="form-control border border-primary" required>
                            </div>
            
                            <div class="form-group my-3">
                                <input type="submit" class="form-control btn btn-primary" value="Enregistrer" required>
                            </div>
            
                    </form>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>




@endsection('content')
=======

@extends('layouts.master')
@Section('content')
  <div class="row">
        <div class="col-6">
            <div class="card card-plain">
                <div class="card-header">
                  <h4 class="font-weight-bolder">Ajouter Catégorie</h4>
                <p>Ajouter une catégorie qui n'existe pas déja</p>  
                </div>
                <p class="card-body">
                  <form action="{{url('ajouter')}}" method="POST" >
                  	{{ csrf_field()}}
                    <p class="input-group input-group-outline mb-3">
                      <label class="form-label">Nom_Catégorie</label>
                      <input type="text" class="form-control" name="nom" required="true">
                    </p>
                    
                    <div class="text-center">
                      <input type="submit" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0" name="" value="Ajouter">
                    </div>
                  </form>
                </p>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-2 text-sm mx-auto">
                    <a href="{{url('/categories')}}" class="text-primary text-gradient font-weight-bold">Retournez aux catégories</a>
                  </p>
                </div>
              </div>
            </div>
    </div></div>
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

