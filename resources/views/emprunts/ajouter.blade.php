@extends('layouts.master')

@Section('content')

<div class="container-fluid py-4">
  @if (session('status'))
    <div class="text-white alert alert-success">
        {{ session('status') }}
    </div>
  @endif
    <div class="row">
      <div class="col-12">
        <div class="card my-4">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
              <h6 class="text-white <!--text-capitalize--> ps-3">Emprunter/rendre un livre</h6>
            </div>
          </div>
          <div class="card-body px-0 pb-2">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="clignote alert alert-secondary text-white text-center" id="message-emprunt" role="alert">
                          Veuillez scanner la carte de l'abonne
                          </div>
                        
                            <div class="row">
                            <div class="col-md-12">
                                <div class="form-group my-3">
                                        <input id="douchette-abonne" type="text" class="form-control border border-primary px-2" name="id-abonne" required>
                                </div>
                                <div>
                                  <h6 class="text-secondary font-weight-bolder">L'abonné</h6>
                                <table class="table align-items-center mb-0">
                                    <thead>
                                      <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">#</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Photo</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nom complet</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Email</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nombre de livres empruntés</th>
                                      </tr>
                                    </thead>
                                    <tbody id="resultat-abonne">
                                    </tbody>
                                </table>
                                </div>

                                <hr>
                            <div class="form-group my-3">  
                                    <input id="douchette-livre" type="text" class="form-control border border-primary px-2" name="isbn" required>
                            </div>
                            <div>
                              <h6 class="text-secondary font-weight-bolder">Les livres</h6>
                              <table class="table align-items-center mb-0">
                                  <thead>
                                    <tr>
                                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">#</th>
                                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Titre</th>
                                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Image</th>
                                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nombre d'exemplaires disponibles</th>
                                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Catégorie</th>
                                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                                    </tr>
                                  </thead>
                                  <tbody id="resultat-livre">
                                  </tbody>
                              </table>
                              </div>
                            </div>
                            </div>
                            <div class="row">
                                <div class="form-group my-4">
                                   <a id="enregistrer" class="disabled form-control btn btn-secondary" href="#" role="button">Enregistrer</a>
                                </div>
                            </div>
                        
                    </div>
                    </div>


               
                </div>
                <div class="row">
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                    <p class="mb-2 text-sm mx-auto">
                      <a href="{{url('/emprunts')}}" class="text-primary text-gradient font-weight-bold">Retourner vers la liste des emprunts</a>
                    </p>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    @endsection('content')