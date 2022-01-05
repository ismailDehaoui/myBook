@Section('form')
 <form action="{{url('/rechercheLivre')}}" method="POST"  id="myForm">
@endsection
@extends('layouts.master')

@section('content')

    <div class="container-fluid py-4">
        <div class="col-12">
            <div>
              <a class="btn bg-gradient-success mb-3" href="{{url('/livres/ajouter')}}">
                <input type="hidden" name="ajouter">
                <i class="material-icons text-sm">add</i>&nbsp;&nbsp;Ajouter livre
                </a>
            </div>
            <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Livres</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Titre</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">ISBN</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Catégorie</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Statut</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Actions</th>
                    </tr>
                  </thead>
                  <tbody>


                      @foreach ($livres as $livre)
                      
                      <?php $categorie = \App\Models\Categorie::find($livre->categories_id); ?>

                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <img src="{{ asset('storage/images/livres/'.$livre->photo) }}" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <a class="nav-link text-blue"  href="{{url('/livre/profile/'.$livre->id)}}" >
                            <h6 class="mb-0 text-sm">{{ $livre->titre }}</h6>
                            <!--<p class="text-xs text-secondary mb-0">john@creative-tim.com</p>-->
                          </a></div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{ $livre->ISBN }}</p>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <p class="text-xs font-weight-bold mb-0"> {{ $categorie->nom }} </p>
                      </td>
                      <td class="align-middle text-center text-sm">
                        @if ($livre->nombre_exemplaires_disponibles > 0)
                          <span class="badge badge-sm bg-gradient-success">Disponible</span>
                        @else
                          <span class="badge badge-sm bg-gradient-secondary">Emprunté</span>
                        @endif  
                      <td class="align-middle">
                        <form action="{{url('/livres/'.$livre->id)}}" method="POST">
                          {{ csrf_field() }}
                          {{ method_field('DELETE') }}
                            <a href="{{url('/livres/'.$livre->id.'/qrcode')}}" title="Qr Code">
                              <i class="fas fa-qrcode me-sm-1"></i>  
                            </a>
                            <a href="{{url('/livres/'.$livre->id.'/modifier')}}" title="Modifier">
                              <i class="fas fa-edit me-sm-1"></i>
                    
                            </a>
                            <a href="{{url('/livres/'.$livre->id.'/supprimer')}}" title="Supprimer">

                              <i class="fas fa-trash-alt me-sm-1"></i> 
                          </a>

                          
                            
                        </form>
                        
                      </td>
                    </tr>


                    @endforeach
<!--
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <img src="../assets/img/team-3.jpg" class="avatar avatar-sm me-3 border-radius-lg" alt="user2">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">Alexa Liras</h6>
                            <p class="text-xs text-secondary mb-0">alexa@creative-tim.com</p>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">Programator</p>
                        <p class="text-xs text-secondary mb-0">Developer</p>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="badge badge-sm bg-gradient-secondary">Offline</span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">11/01/19</span>
                      </td>
                      <td class="align-middle">
                        <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                          Edit
                        </a>
                      </td>
                    </tr>-->
                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <div class="pagination">
            {{$livres->links()}}
            </div>

      </div>
     
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
