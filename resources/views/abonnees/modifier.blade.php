@extends('layouts.master')
@Section('content')
<div class="container d-flex">
    <div class="row align-self-center">
        <div class="col-xl-12 col-lg-5 col-md-2 d-flex flex-column ms-auto me-auto ms-lg-auto  me-lg-1">
            <div class="card card-plain">
                <div class="card-header">
                  <h4 class="font-weight-bolder">Modifier abounnée</h4>  
                </div>
                <form action="{{url('modifier/'.$abonnee->id)}}" method="POST" >
                    <input type="hidden" name="_method" value="PUT">
                  	{{ csrf_field()}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group my-3">
                                <label for="nom" class="form-label">Nom</label>
                                <input 
                                  type="text" 
                                  class="form-control border border-primary" 
                                  name="nom" 
                                  value ="{{$abonnee->nom_abonnee}}" 
                                  required
                                >
                            </div>
                            <div class="form-group my-3">
                                <label for="prenom" class="form-label">Prénom</label>
                                <input 
                                  type="text" 
                                  class="form-control border border-primary" 
                                  name="prenom" 
                                  value="{{$abonnee->prenom_abonnee}}" 
                                  required
                                >                               
                            </div>
                            <div class="form-group my-3">                                
                                <label for="email" class="form-label">Email</label>
                                <input 
                                  type="email" 
                                  class="form-control border border-primary" 
                                  name="email" 
                                  value="{{$abonnee->email_abonnee}}" 
                                  placeholder="exemple@gamil.com" 
                                  required
                                >                                
                            </div>
                            <div class="form-group my-3">
                                <label for="date-de-naissance">Date de naissance</label>
                                <input 
                                  type="date"  
                                  name="date_naissance" 
                                  class="form-control border border-primary" 
                                  value="{{$abonnee->date_naissance_abonnee}}"  
                                  required
                                >
                            </div>  
                            <div class="form-group my-3">
                                <label for="adresse">Adresse</label>
                                <input 
                                  type="text"  
                                  name="adresse" 
                                  class="form-control border border-primary" 
                                  value="{{$abonnee->adresse_abonnee}}"
                                  required
                                >
                            </div>
                            <div class="form-group my-3">
                                <label for="image">Image</label>
                                <input type="file" name="image" class="form-control border border-primary">
                            </div>  
                        </div>
                        <div class="text-center">
                            <input type="submit" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0" name="" value="Modifier">
                        </div>
                    </div>    
                  </form>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-2 text-sm mx-auto">
                    <a href="{{url('/')}}" class="text-primary text-gradient font-weight-bold">Retournez aux abounnées</a>
                  </p>
                </div>
              </div>
            </div>
    </div></div></div>
@endsection('content')