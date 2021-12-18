@extends('layouts.master')

@Section('content')



<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card my-4">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
              <h6 class="text-white <!--text-capitalize--> ps-3">Ajouter un livre</h6>
            </div>
          </div>
          <div class="card-body px-0 pb-2">
            <div class="container">
                <div class="row">





                  <!-- start modal add keyword -->

                  <form id="addKeyword" action="{{ route('motscles.ajouter') }}" method="POST">                  
                    @csrf
                    <div class="modal" id="myModal" tabindex="-1">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Ajouter un mot-clé</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <label for="motcle">Mot-clé</label>
                            <input type="text" id="motcle" name="motcle_name" class="form-control px-2 border border-primary" required>
                            <span class="text-danger error-text motcle-error"></span>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                            <button id="butsave" type="submit" class="btn btn-primary">Ajouter</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>
                   

                  <!-- End modal add keyword -->




                  <!-- Start modal add author -->



                  <form id="addAuthor" action="{{ route('auteurs.ajouter') }}" method="POST">                  
                    @csrf
                    <div class="modal" id="myModal2" tabindex="-1">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Ajouter un auteur</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <label for="auteur">Auteur</label>
                            <input type="text" id="motcle" name="auteur_name" class="form-control px-2 border border-primary" required>
                            <span class="text-danger error-text auteur-error"></span>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                            <button id="butsave" type="submit" class="btn btn-primary">Ajouter</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>
                   




                  







                  







                  <!-- End modal Author -->





                   
                    <div class="col-md-12">
                        <form action="{{ url('livres') }}" method="POST"  enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">
                            <div class="col-md-6">
                                <div class="form-group my-3">
                                    
                                        <label for="titre" class="form-label">Titre</label>
                                        <input type="text" class="form-control border border-primary px-2" name="titre" required>
                                    
                                </div>

                            <div class="form-group my-3">
                               
                                    <label for="isbn" class="form-label">ISBN</label>
                                    <input type="text" class="form-control border border-primary px-2" name="isbn" required>
                               
                            </div>

                            <div class="form-group my-3">
                                
                                    <label for="éditeur" class="form-label">éditeur</label>
                                    <input type="text" class="form-control border border-primary px-2" name="éditeur" required>
                                
                            </div>

                            <div class="form-group my-3">
                               
                                    <label for="nombre-exemplaires-disponibles">Nombre d'exemplaires disponibles</label>
                                    <input type="number" min="1" name="nombre-exemplaires-disponibles" class="form-control border border-primary px-2" required>
                                
                            </div>  
                            
                            


                      <div class="form-group my-3">
                               
                        <label for="auteur">Auteur(s)</label> &nbsp;&nbsp;&nbsp; <a href="#" class="btn p-0 m-0" data-bs-toggle="modal" data-bs-target="#myModal2"><i class="fas fa-plus"></i></a>
                        <select id="auteur" name="auteur[]" class="form-control border border-primary px-2" multiple required >
                            @foreach ($auteurs as $auteur)
                            <option value="{{ $auteur->id }}"> {{ $auteur->nom }} </option>
                            @endforeach
                        </select>
                    
                </div>


                            </div>






                            <div class="col-md-6">
                                
                                
                            
                            

                              <div class="form-group my-3">
                                
                                <label for="année" class="form-label">Année</label>
                                <input type="number" min="1900" max="{{ date('Y') }}" name="année" class="form-control border border-primary px-2">
                           
                        </div>

                            <div class="form-group my-3">
                               
                                    <label for="categorie">Catégorie</label>
                                    <select id="categorie" name="catégorie" class="form-control border border-primary px-2" required >
                                        @foreach ($categories as $categorie)
                                        <option value="{{ $categorie->id }}"> {{ $categorie->nom }} </option>
                                        @endforeach
                                    </select>
                                
                            </div>






                            

                            <div class="form-group my-3">
                                <label for="langue">Langue</label>
                                <select name="langue" id="langue" class="form-control border border-primary px-2" required >
                                    <option value="anglais">anglais</option>
                                    <option value="francais">francais</option>
                                    <option value="arabe">arabe</option>
                                  </select>
                                  
                            </div>
                            

                            <div class="form-group my-3">
                                <label for="image">image</label>
                                <input type="file" name="image" class="form-control border border-primary px-2">
                            </div>




                            <!--  Start Pop Up  -->



                            




                            <!--  End Pop Up  -->
                                
                                
                              
                            <div class="form-group my-3">
                              <label for="mot-cle">Mot(s)-clé(s)</label> 
                              &nbsp;&nbsp;&nbsp;  
                              <a href="{{url('/motscles/supprimer')}}" id="minus-motcle" title="Supprimer les mots-clés selectionnés" class="mr-0"><i class="fas fa-minus"></i></a> 
                              &nbsp;&nbsp;&nbsp;
                              <a href="#" title="Ajouter un nouveau mot-clé" class="" data-bs-toggle="modal" data-bs-target="#myModal"><i class="fas fa-plus"></i></a>
                             
                              <select id="mot-cle" name="motcle[]" class="form-control border border-primary px-2" multiple>
                                  @foreach ($motscles as $motcle)
                                  <option value="{{ $motcle->id }}"> {{ $motcle->motcle }} </option>
                                  @endforeach
                              </select>
                          
                      </div>
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                            
                                </div>





                            </div>

                            <div class="row">
                                <div class="form-group my-3">
                                        <label for="résumé" class="form-label">Résumé</label>
                                        <textarea name="résumé" class="form-control border border-primary px-2" required></textarea>
                                    </p>
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
                      <a href="{{url('/livres')}}" class="text-primary text-gradient font-weight-bold">Retourner vers la liste des livres</a>
                    </p>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    @endsection('content')