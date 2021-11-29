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
                   
                    <div class="col-md-12">
                        <form action="{{ url('livres/'.$livre->id) }}" method="POST">
                            <input type="hidden" name="_method" value="PUT">
                            {{ csrf_field() }}
                            <div class="row">
                            <div class="col-md-6">
                                <div class="form-group my-3">
                                    
                                        <label for="titre" class="form-label">Titre</label>
                                        <input type="text" class="form-control border border-primary" name="titre" value="{{ $livre->titre }}" required>
                                    
                                </div>

                            <div class="form-group my-3">
                               
                                    <label for="isbn" class="form-label">ISBN</label>
                                    <input type="text" class="form-control border border-primary" name="isbn" value="{{ $livre->ISBN }}" required>
                               
                            </div>

                            <div class="form-group my-3">
                                
                                    <label for="éditeur" class="form-label">éditeur</label>
                                    <input type="text" class="form-control border border-primary" name="éditeur" value="{{ $livre->editeur }}" required>
                                
                            </div>

                            <div class="form-group my-3">
                               
                                    <label for="nombre-exemplaires-disponibles">Nombre d'exemplaires disponibles</label>
                                    <input type="number" min="1" name="nombre-exemplaires-disponibles" class="form-control border border-primary" value="{{ $livre->nombre_exemplaires_disponibles }}" required>
                                
                            </div>  
                            
                            


                      <div class="form-group my-3">
                               
                        <label for="auteur">Auteur(s)</label>
                        <select id="auteur" name="auteur[]" class="form-control border border-primary" multiple required >
                            @foreach ($auteurs as $auteur)
                            <option value="{{ $auteur->id }}"> {{ $auteur->nom }} </option>
                            @endforeach
                        </select>
                    
                </div>


                            </div>






                            <div class="col-md-6">
                                
                                
                            
                            

                              <div class="form-group my-3">
                                
                                <label for="année" class="form-label">Année</label>
                                <input type="number" min="1900" max="{{ date('Y') }}" name="année" class="form-control border border-primary" value="{{ $livre->annee }}">
                           
                        </div>

                            <div class="form-group my-3">
                               
                                    <label for="categorie">Catégorie</label>
                                    <select id="categorie" name="catégorie" class="form-control border border-primary" required >
                                        @foreach ($categories as $categorie)
                                        <option value="{{ $categorie->id }}"> {{ $categorie->nom }} </option>
                                        @endforeach
                                    </select>
                                
                            </div>

                            

                            <div class="form-group my-3">
                                <label for="langue">Langue</label>
                                <select name="langue" id="langue" class="form-control border border-primary" required >
                                    <option value="anglais">anglais</option>
                                    <option value="francais">francais</option>
                                    <option value="arabe">arabe</option>
                                  </select>
                                  
                            </div>
                            

                            <div class="form-group my-3">
                                <label for="image">image</label>
                                <input type="file" name="image" class="form-control border border-primary" value="{{ asset("public/storage/images/livres".$livre->photo) }}" >
                            </div>
                                
                                
                              
                            <div class="form-group my-3">
                               
                              <label for="mot-cle">Mot(s)-clé(s)</label>
                              <select id="mot-cle" name="motcle[]" class="form-control border border-primary" multiple required >
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
                                        <textarea name="résumé" class="form-control border border-primary" required>{{ $livre->resume }}</textarea>
                                    </p>
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