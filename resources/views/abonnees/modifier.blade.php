@extends('layouts.master')
@Section('content')
<div class="container d-flex">
    <div class="row align-self-center">
        <div class="col-xl-12 col-lg-5 col-md-2 d-flex flex-column ms-auto me-auto ms-lg-auto  me-lg-1">
            <div class="card card-plain">
                <div class="card-header">
                  <h4 class="font-weight-bolder">Modifier abounnée</h4>  
                </div>
                <form action="{{url('modifier/'.$abonnee->id)}}" method="POST"  enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="PUT">
                  	{{ csrf_field()}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group my-3">
                                <label for="nom" class="form-label">Nom</label>
                                <input 
                                  type="text" 
                                  class="form-control border px-2 border-primary" 
                                  name="nom" 
                                  value ="{{$abonnee->nom}}" 
                                  required
                                >
                            </div>
                            <div class="form-group my-3">
                                <label for="prenom" class="form-label">Prénom</label>
                                <input 
                                  type="text" 
                                  class="form-control border px-2 border-primary" 
                                  name="prenom" 
                                  value="{{$abonnee->prenom}}" 
                                  required
                                >                               
                            </div>
                            <div class="form-group my-3">                                
                                <label for="email" class="form-label">Email</label>
                                <input 
                                  type="email" 
                                  class="form-control border px-2 border-primary" 
                                  name="email" 
                                  value="{{$abonnee->email}}" 
                                  required
                                >                                
                            </div>
                            <div class="form-group my-3">
                                <label for="date-de-naissance">Date de naissance</label>
                                <input 
                                  type="date"  
                                  name="date_naissance" 
                                  class="form-control border px-2 border-primary" 
                                  value="{{$abonnee->date_naissance}}"  
                                  required
                                >
                            </div>  
                            <div class="form-group my-3">
                                <label for="adresse">Adresse</label>
                                <input 
                                  type="text"  
                                  name="adresse" 
                                  class="form-control px-2 border border-primary" 
                                  value="{{$abonnee->adresse}}"
                                  required
                                >
                            </div>
                            <div class="form-group my-3">
                              <p class="input-group-outline mb-9">
                                <label class="form-label">
                                Photo</label>
                                <img 
                                    src="{{asset('storage/Admin/'.$abonnee->photo)}}" 
                                    class="avatar avatar-lg px-2 me-3 border-radius-lg" 
                                    required>
                                <br/><br/>
                                <input type="file" class="form-control border border-primary" name="image"  accept="image/jpg,image/jpeg,image/png">
                                </p>
                            </div>  
                        </div>
                        <div class="text-center">
                            <input type="submit" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0" name="" value="Modifier">
                        </div>
                    </div>    
                  </form>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-2 text-sm mx-auto">
                    <a href="{{url('/abonnees')}}" class="text-primary text-gradient font-weight-bold">Retournez aux abounnées</a>
                  </p>
                </div>
              </div>
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
