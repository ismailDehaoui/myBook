@extends('layouts.master')

@Section('content')
<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12">
      <div class="card my-4">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
          <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
            <h6 class="text-white <!--text-capitalize--> ps-3">Ajouter un abonnée</h6>
          </div>
        </div>
        <div class="card-body px-0 pb-2">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <form action="{{ url('abonnée/ajouterAbonnée') }}" method="POST" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group my-3">
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" class="form-control border border-primary" name="nom" required>
                      </div>
                      <div class="form-group my-3">
                        <label for="prenom" class="form-label">Prénom</label>
                        <input type="text" class="form-control border border-primary" name="prenom" required>                               
                      </div>
                      <div class="form-group my-3">                                
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control border border-primary" name="email" placeholder="exemple@gamil.com" required>                                
                      </div>
                      <div class="form-group my-3">
                        <label for="date-de-naissance">Date de naissance</label>
                        <input type="date"  name="date_naissance" class="form-control border border-primary" required>
                      </div>  
                      <div class="form-group my-3">
                        <label for="adresse">Adresse</label>
                        <input type="text"  name="adresse" class="form-control border border-primary" required>
                      </div>
                      <div class="form-group my-3">
                        <label for="image">image</label>
                        <input 
                            type="file" 
                            name="image" 
                            class="form-control border border-primary">
                    </div>  
                    </div>
                    <div class="row">
                      <div class="form-group my-4">
                        <input type="submit" class="form-control btn btn-primary" value="Enregistrer" required>
                      </div>
                    </div>  
                  </div>
                </form>
              </div>
            </div> 
          </div>
          <div class="row">
            <div class="card-footer text-center pt-0 px-lg-2 px-1">
              <p class="mb-2 text-sm mx-auto">
                <a href="{{url('abonnées')}}" class="text-primary text-gradient font-weight-bold">Retourner vers la liste des abonnées</a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
 </div>
 
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
