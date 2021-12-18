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
                      <form action="{{url('modifier/'.$abonne->id)}}" method="POST"  enctype="multipart/form-data">
                            <input type="hidden" name="_method" value="PUT">
                            {{ csrf_field() }}
                            <div class="row">
                            <div class="col-md-6">
                                <div class="form-group my-3">
                                    
                                        <label for="titre" class="form-label">Nom</label>
                                        <input type="text" class="form-control border border-primary" name="titre" value="{{ $abonne->nom }}" required>
                                    
                                </div>

                            <div class="form-group my-3">
                               
                                    <label for="isbn" class="form-label">Prénom</label>
                                    <input type="text" class="form-control border border-primary" name="isbn" value="{{ $abonne->prenom }}" required>
                               
                            </div>

                            <div class="form-group my-3">
                                
                                    <label for="éditeur" class="form-label">Email</label>
                                    <input type="text" class="form-control border border-primary" name="éditeur" value="{{ $abonne->email }}" required>
                                
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
           
                    <label class="form-label">Photo</label>
                      <img 
                          src="{{asset('storage/Admin/'.$abonne->photo)}}" 
                          class="avatar avatar-lg px-2 me-3 border-radius-lg" 
                          required>
                      <br/><br/>
                      <input type="file" class="form-control border border-primary" name="image"  accept="image/jpg,image/jpeg,image/png">
               
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