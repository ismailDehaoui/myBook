
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