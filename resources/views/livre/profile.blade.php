@extends('layouts.master')
@Section('content')

  <div class="main-content position-relative max-height-vh-100 h-100">
    <div class="container-fluid px-2 px-md-4">
      <div class="card card-body mx-3 mx-md-4 mt-n6">
        <div class="row gx-4 mb-2">
          
          <div class="col-auto">
            <div class="avatar avatar-xl position-relative">
              <img src="{{ asset('storage/images/livres/'.$livre->photo) }}" class=""  >
            </div>
          </div>
        
          <div class="col-auto my-auto">
            <div class="h-100">
              <h5 class="mb-1">
               {{ $livre->titre; }}
              </h5>  
            </div>
          </div>

      </div>

        <div class="row">
          <div class="row">
            <div class="col-md-12">
              
              <div class="card card-plain h-100">
                
                <div class="card-header pb-0 p-3">

                  <div class="row">

                    <div class="col-md-8 d-flex align-items-center">
                      <h6 class="mb-0">Les informations relatives au livre</h6>
                    </div>
                    
                    <div class="col-md-4 text-end">
                      <a href="javascript:;">
                        <i class="fas fa-user-edit text-secondary text-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Profile"></i>
                      </a>
                    </div>
                  
                </div>

                </div>
                
                
                
                <div class="row">


                  <div class="col-md-6 card-body p-3">
                    <hr class="horizontal gray-light my-4">
                    <ul class="list-group">
                      <li class="list-group-item border-0 ps-0 text-sm">
                          <strong class="text-dark">
                              ISBN : 
                          </strong>
                           {{ $livre->ISBN }}
                      </li>
                      <li class="list-group-item border-0 ps-0 text-sm">
                          <strong class="text-dark">
                              Editeur : 
                          </strong>
                            {{ $livre->editeur }}
                      </li>
                      <li class="list-group-item border-0 ps-0 pb-0">
                        <strong class="text-dark text-sm">Langue : </strong>
                        {{ $livre->langue }}
                      </li> 
                      <li class="list-group-item border-0 ps-0 pb-0">
                        <strong class="text-dark text-sm">Catégorie : </strong>
                        {{ $nomCategorie }}
                      </li>   
                    </ul>
                  </div>  
                  <div class="col-md-6 card-body p-3">
                    <hr class="horizontal gray-light my-4">
                    <ul class="list-group">
                      <li class="list-group-item border-0 ps-0 text-sm">
                          <strong class="text-dark">
                              Nombre total des livres : 
                          </strong>
                            {{$nbTotal}}
                      </li>
                      <li class="list-group-item border-0 ps-0 text-sm">
                          <strong class="text-dark">
                              Nombre de lives empruntés : 
                          </strong>
                          {{$nbEmprunt}}
                      </li>
                      <li class="list-group-item border-0 ps-0 pb-0">
                        <strong class="text-dark text-sm">Nombre de livres disponibles : </strong>
                        {{ $nbTotal-$nbEmprunt }}
                      </li>   
                    </ul>
                  </div>

                  <div class="col-md-12">
                    <strong class="ms-1 text-dark text-sm">Les mots cles : </strong>
                    <div class="border mt-2 p-2">
                      @foreach ($motscles as $motcle)
                      <span class="badge badge-sm bg-gradient-light text-dark text-lowercase">{{ $motcle->motcle }}</span>
                      @endforeach
                    </div>
                  </div>

                </div>
                

                <hr>








                           
              </div>






            </div>
            <div class="card my-4">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                  <h6 class="text-white ps-3">Les emprunts dont la date limite est dépassée</h6>
                </div>
              </div>
              
              <div class="card-body px-0 pb-2">
                <div class="table-responsive p-0">
                  <table class="table align-items-center mb-0">
                    <thead>
                      <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nom complet</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Date debut </th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Date fin </th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($empruntsNonRendus as $emprunt)
                          
                      
                      <tr>
                        <td>
                          <div class="d-flex px-2 py-1">
                            <div class="d-flex flex-column justify-content-center">
                              <a href="{{url('abonnée/'.$emprunt->abonnes_id.'/profile')}}">
                              <h6 class="mb-0 text-sm"> {{ $emprunt->nom ." ".$emprunt->prenom }} </h6>
                            </a>
                            </div>
                          </div>
                        </td>
                        <td>
                          <div class="d-flex px-2 py-1">
                            <div class="d-flex flex-column justify-content-center">
                              <p class="text-sm">{{ $emprunt->date_debut }}</p>
                            </div>
                          </div>  
                        </td>
                        <td>
                          <div class="d-flex px-2 py-1">
                            <div class="d-flex flex-column justify-content-center">
                              <p class="mb-0 text-sm">{{ $emprunt->date_fin }}</p>
                            </div>
                          </div>
                        </td>  
                      </tr>
                      @endforeach
                    
                    </tbody>
                  </table>
       
                </div>
              </div>
              <div class="pagination">
                {{$empruntsNonRendus->links()}}
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> 
</div>

@endsection('content')