@extends('layouts.master')

@Section('content')



<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card my-4">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
              <h6 class="text-white <!--text-capitalize--> ps-3">Modifier abonné(e)</h6>
            </div>
          </div>
          <div class="card-body px-0 pb-2">
            <div class="container">
                <div class="row">
                   
                    <div class="col-md-12">
                      <form action="{{url('abonnés/'.$abonne->id.'/update')}}" method="POST"  enctype="multipart/form-data">
                            <input type="hidden" name="_method" value="PUT">
                            {{ csrf_field() }}
                            <div class="row">
                            <div class="col-md-6">
                                <div class="form-group my-3">
                                    
                                        <label for="nom" class="form-label">Nom</label>
                                        <input type="text" class="px-2 form-control border border-primary" name="nom" value="{{ $abonne->nom }}" required>
                                    
                                </div>

                            <div class="form-group my-3">
                               
                                    <label for="prenom" class="form-label">Prénom</label>
                                    <input type="text" class="px-2 form-control border border-primary" name="prenom" value="{{ $abonne->prenom }}" required>
                               
                            </div>

                            <div class="form-group my-3">
                                
                                    <label for="email" class="form-label">Email</label>
                                    <input type="text" class="px-2 form-control border border-primary" name="email" value="{{ $abonne->email }}" required>
                                
                            </div>

                        


                            </div>






                            <div class="col-md-6">
                                
                                
                            
                            

                              <div class="form-group my-3">
                                
                                <label id="date_naissance" for="année" class="form-label">Date de naissance</label>
                                <input 
                                  type="date"  
                                  name="date_naissance" 
                                  class="form-control border px-2 border-primary" 
                                  
               
                                  required
                                >
                              
                        
                        
                           
                        </div>

                        <div class="form-group my-3">
                                
                          <label for="année" class="form-label">Adresse</label>
                          <input 
                                  type="text"  
                                  name="adresse" 
                                  class="form-control px-2 border border-primary" 
                                  value="{{$abonne->adresse}}"
                                  required
                                >
                     
                  </div>
                  <div class="form-group my-3">
                    <div class="col-md-12">
                      <div class="row">
                        <div class="col-md-10">
                      <label for="image">image</label>
                      <input type="file" name="image" class="form-control border border-primary" value="{{ asset("public/storage/images/abonnés".$abonne->photo) }}" >
                        </div>
                      <div class="d-flex col-md-2">
                        <img src="{{ asset('storage/images/abonnés/'.$abonne->photo) }}" class="img-fluid">
                        </div>
                      </div>
                    </div>
                  </div>
                                            
                                </div>





                            </div>

                            


                            <div class="row">
                                <div class="form-group my-4">
                                    <input type="submit" class="form-control btn btn-danger" value="Modifier" required>
                                </div>
                            </div>
                        </form>
                    </div>
                    </div>


               
                </div>
                <div class="row">
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                    <p class="mb-2 text-sm mx-auto">
                      <a href="{{url('/abonnés')}}" class="text-primary text-gradient font-weight-bold">Retourner vers la liste des abonnés</a>
                    </p>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    

    @endsection('content')