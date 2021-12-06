@extends('layouts.master')
@Section('content')

<div class="row">
  <div class="col-12">
    <a class="btn btn-primary bg-gradient-success mb-0" href="{{ url('emprunts/créer') }}">
      <input type="hidden" name="ajouter">
      <i class="material-icons text-sm ">person_add</i>&nbsp;&nbsp;Ajouter emprunt
    </a>
    </br></br>
    <div class="card my-4">
      <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
          <h6 class="text-white text-capitalize ps-3">Emprunt</h6>
        </div>
      </div>
      <div class="card-body px-0 pb-2">
        <div class="table-responsive p-0">
          <table class="table align-items-center mb-0">
            <thead>
              <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nom</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Prénom </th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Titre</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Date debut</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Date fin</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Rendu</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Actions</th>
              </tr>
            </thead>
            <tbody>
              
              @foreach($emprunts as $emprunt)
              <?php $abonne = \App\Models\Abonnee::find($emprunt->abonnees_id); 
                    $livre = \App\Models\Livres::find($emprunt->livres_id);
              ?>
                <tr>
                  <td>
                    <div class="d-flex px-2 py-1">
                      <div class="d-flex flex-column justify-content-center">
                        <a href="{{url('abonnée/'.$emprunt->abonnees_id.'/profile')}}">
                          <h6 class="mb-0 text-sm">
                            {{$abonne->nom_abonnee}}                
                          </h6>
                        </a>
                      </div>
                    </div>
                  </td>
                  <td>
                    <div class="d-flex px-2 py-1">
                      <div class="d-flex flex-column justify-content-center">
                        <a href="">
                          <h6 class="mb-0 text-sm">
                            {{$abonne->prenom_abonnee}}
                          </h6>
                        </a>
                      </div>
                    </div>  
                  </td>
                  <td>
                    <div class="d-flex px-2 py-1">
                      <div class="d-flex flex-column justify-content-center">
                        <a href="">
                          <h6 class="mb-0 text-sm">
                            {{$livre->titre}}
                          </h6>
                        </a>
                      </div>
                    </div>  
                  </td>
                  <td>
                    <p class="text-xs font-weight-bold mb-0">{{$emprunt->date_debut}}</p>
                  </td>
                  <td>
                    <p class="text-xs font-weight-bold mb-0"></p>
                  </td>
                  <td>
                    <div class="d-flex px-2 py-1">
                        <div class="d-flex flex-column justify-content-center">
                          <a href="">
                            <h6 class="mb-0 text-sm">
                                <?php
                                  if($emprunt->estRendu)
                                    echo 'oui';
                                   else {
                                     echo "non";
                                   } 
                                ?>
                            </h6>
                          </a>
                        </div>
                      </div>
                  </td>  
                  <td class="align-middle">
                    <a class="btn bg-gradient-warning mb-0" href="" >
                      <input type="hidden" name="afficher">
                      <i class="material-icons text-sm" >update</i>&nbsp;&nbsp;
                    </a>
                    <a class="btn bg-gradient-danger mb-0" href="" >
                      <input type="hidden" name="afficher">
                      <i class="material-icons text-sm" >delete</i>&nbsp;&nbsp;
                    </a>
                  </td>
                </tr>
                @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="pagination">
    {{$emprunts->links()}}
  </div>
</div>
@endsection('content')
@Section('admin')
<li class="nav-item">
          <a class="nav-link text-white active bg-gradient-primary" href="{{url('/affgest')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">engineering</i>
            </div>
            <span class="nav-link-text ms-1">Les utilisateurs</span>
          </a>
        </li>
@endsection('admin')