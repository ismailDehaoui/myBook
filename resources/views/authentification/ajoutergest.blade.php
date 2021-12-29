
@extends('layouts.master')
@Section('content')
  <div class="row">
  <div class="col-md-12">
     <div class="card my-4">
     <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Ajouter utilisateur</h6>
              </div>
            </div>
              <p class="card-body">
                  <form action="{{url('/ajoutgest')}}" method="POST" ENCTYPE="multipart/form-data">
                    {{ csrf_field()}}
     <div class="row">
     <div class="col-md-6">
        <p class="input-group input-group-outline mb-3 mx-3">
                      <label class="form-label">Nom</label>
                      <input type="text" class="form-control" name="nom" required="true">
                    </p>
                     <p class="input-group input-group-outline mb-3 mx-3">
                      <label class="form-label">Email</label>
                      <input type="email" class="form-control" name="email" required="true">
                    </p>
                      <p class="input-group input-group-outline mb-3 mx-3">
                      <label class="form-label">Mot de passe</label>
                      <input type="password" class="form-control" name="password" required="true">
                    </p>     
     </div>
     <div class="col-md-6"> 
                    <p class="input-group input-group-outline mb-3">
                      <label class="form-label">Prénom</label>
                      <input type="text" class="form-control" name="prenom" required="true">
                    </p>
                     <p class="input-group input-group-outline mb-3">
                      <label class="form-label"></label>
                      <input type="file" class="form-control" name="img" required="true"  accept="image/jpg,image/jpeg,image/png">
                    </p>
                      <p class="input-group input-group-outline mb-3">
                      <label class="form-label">Confirmer le mot de passe</label>
                      <input type="password" class="form-control" name="password_confirmation" required="true">
                    </p>
                      <label class="form-label">Rôle</label>
                    <p class="form-check">

                      <input class="form-check-input" type="radio" name="flexRadioDefault" value="radio1">
                        <label class="form-check-label" for="flexRadioDefault1">
                         Administrateur
                        </label>
                         <input class="form-check-input" type="radio" name="flexRadioDefault" value="radio2" checked="true">
                        <label class="form-check-label" for="flexRadioDefault1">
                         Gestionnaire
                        </label>
                    </p>         
                </p>
              </div>
              <div class="text-center">
                      <input type="submit" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0" name="" value="Ajouter">
                    </div>
                  </form>
               <div class="card-footer text-center pt-0 px-lg-2 px-1">
                <br/>
                  <p class="mb-2 text-sm mx-auto">
                    <a href="{{url('/affgest')}}" class="text-primary text-gradient font-weight-bold">Retournez aux utilisateurs</a>
                  </p>
                </div>
            </div></div></div>

@endsection('content')

<?php 
  $user = auth()->user();?>
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
