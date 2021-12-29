
@extends('layouts.master')
@Section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.8/sweetalert2.min.js" integrity="sha512-ySDkgzoUz5V9hQAlAg0uMRJXZPfZjE8QiW0fFMW7Jm15pBfNn3kbGsOis5lPxswtpxyY3wF5hFKHi+R/XitalA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<div class="row">
        <div class="col-12">
          <a class="btn bg-gradient-success mb-0" href="{{url('/ajoutercat')}}">
             <input type="hidden" name="ajouter">
            <i class="material-icons text-sm">add</i>&nbsp;&nbsp;Ajouter catégorie
          </a>
            <!--a class="btn bg-gradient-danger mb-0" href="{{url('/catsupp')}}">
             <input type="hidden" name="afficher">
            <i class="material-icons text-sm">delete</i>&nbsp;&nbsp;Catégories supprimées
          </a-->
        </br></br>
        </br>
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Catégories</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Catégorie</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Date d'ajout</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Date de modification</th>
                    </tr>
                  </thead>
                  <tbody>
                  	 @foreach($categories as $c)
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <!--img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3 border-radius-lg" alt="user1"-->
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <a class="nav-link text-blue"  href="{{url('/afficherLivres/'.$c->id)}}" >
                            <input type="hidden" name="afficher">
                            <h6 class="mb-0 text-sm">{{$c->nom}}</h6>
                          </a></div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{$c->created_at}}</p>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{$c->updated_at}}</p>
                      </td>
                      <!--td class="align-middle text-center text-sm">
                        <span class="badge badge-sm bg-gradient-success">Online</span>
                      </td-->
                 
                      <td class="align-middle">
                         <a   href="{{url('mod/'.$c->id.'/edit')}}" >
                            <input type="hidden" name="afficher">
                          <i class="material-icons text-xlg" >update</i>&nbsp;&nbsp;
                        </a>
                      </td>
                      <td class="align-middle">
                         <a  href="{{url('/supprimer'.$c->id)}}" >
                            <input type="hidden" name="afficher">
                          <i class="material-icons text-xlg" >delete</i>&nbsp;&nbsp;
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
          {{$categories->links()}}
        </div>
      </div>
@endsection('content')
<<<<<<< HEAD
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

=======
>>>>>>> 583c23ea7eaa59431b13bf6761a1665121feb0ae
