@extends('layouts.master')

@Section('content')



<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card my-4">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
              <h6 class="text-white <!--text-capitalize--> ps-3">Ajouter un(e) abonné(e)</h6>
            </div>
          </div>
          <div class="card-body px-0 pb-2">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ url('abonnés') }}" method="POST"  enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">
                            <div class="col-md-6">
                                <div class="form-group my-3">
                                        <label for="nom" class="form-label">Nom</label>
                                        <input type="text" class="form-control border border-primary px-2" name="nom" required>
                                </div>

                            <div class="form-group my-3">
                               
                                    <label for="prenom" class="form-label">Prénom</label>
                                    <input type="text" class="form-control border border-primary px-2" name="prenom" required>
                               
                            </div>

                            <div class="form-group my-3">
                                
                                    <label for="email" class="form-label">Email</label>
                                    <input type="text" class="form-control border border-primary px-2" name="email" required>
                                
                            </div>

                            <div class="form-group my-3">
                               
                    
                </div>


                            </div>






                            <div class="col-md-6">
                                
                                
                            
                            

                                <div class="form-group my-3">
                                    
                                    <label for="date_de_naissance" class="form-label">Date de naissance</label>
                                    <input type="date" class="form-control border border-primary px-2" name="date_de_naissance" required>
                                
                            </div>

                        <div class="form-group my-3">
                           
                                <label for="adresse" class="form-label">adresse</label>
                                <input type="text" class="form-control border border-primary px-2" name="adresse" required>
                           
                        </div>

                            <div class="form-group my-3">
                                <label for="image">image</label>
                                <input required type="file" name="image" class="form-control border border-primary px-2">
                            </div>




                
                                
                                
                              
                            
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                            
                                </div>





                            </div>

                            


                            <div class="row">
                                <div class="form-group my-4">
                                    <input type="submit" class="form-control btn btn-primary" value="Enregistrer" required>
                                </div>
                            </div>
                        </form>
                    </div>
                    </div>


               
                </div>
                <div class="row">
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                    <p class="mb-2 text-sm mx-auto">
                      <a href="{{url('abonnés')}}" class="text-primary text-gradient font-weight-bold">Retourner vers la liste des abonné(e)s</a>
                    </p>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    @endsection('content')
