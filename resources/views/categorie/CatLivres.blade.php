
@extends('layouts.master')
@Section('content')
<div class="row">
        <div class="col-12">
        </br></br>
        </br>
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Livres de {{$cat->nom}}</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Titre</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">ISBN</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nombre d'exemplaires</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Editeur</th>
                       <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Langue</th>
                    </tr>
                  </thead>
                  <tbody>
                  	 @foreach($livre as $c)
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <img src="{{asset('storage/images/livres/'.$c->photo)}}" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <a class="nav-link text-blue"   >
                            <input type="hidden" name="afficher">
                            <h6 class="mb-0 text-sm">{{$c->titre}}</h6>
                          </a></div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{$c->ISBN}}</p>
                      </td>
                        <td>
                        <p class="text-xs font-weight-bold mb-0">{{$c->nombre_exemplaires_disponibles}}</p>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{$c->editeur}}</p>
                      </td>
                       <td>
                        <p class="text-xs font-weight-bold mb-0">{{$c->langue}}</p>
                      </td>
                      <!--td class="align-middle text-center text-sm">
                        <span class="badge badge-sm bg-gradient-success">Online</span>
                      </td-->
                 @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="pagination">
          {{$livre->links()}}
        </div>
      </div>
@endsection('content')
<?php $user = auth()->user();?>
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
