
@extends('layouts.master')
@Section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.8/sweetalert2.min.js" integrity="sha512-ySDkgzoUz5V9hQAlAg0uMRJXZPfZjE8QiW0fFMW7Jm15pBfNn3kbGsOis5lPxswtpxyY3wF5hFKHi+R/XitalA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<div class="row">
        <div class="col-12">
          <a class="btn bg-gradient-success mb-0" href="{{url('/ajoutergestionnaire')}}">
             <input type="hidden" name="ajouter">
            <i class="material-icons text-sm">person_add</i>&nbsp;&nbsp;Ajouter utilisateur
          </a>
        </br></br>
        <!--div>
           <h6 class="text-black text-capitalize ps-3">Nombre de gestionnaires
           <select id="ncat" onchange="choix(this.selectedIndex)">
            <option value="3" selected>3</option>
             <option value="4">4</option>
             <option value="5">5</option>
             <option value="6">6</option>
             <option value="7">7</option>
           </select>
           </h6>
        </div-->
        </br>
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">utilisateurs</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Utilisateur</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">email</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Rôle</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Date d'ajout</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Date de modification</th>
                    </tr>
                  </thead>
                  <tbody>
                  	 @foreach($gestionnaire as $c)
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            
                            <!--img src="{{asset('photolink/'.$c->photo)}}" class="avatar avatar-sm me-3 border-radius-lg" alt="user1"-->
                             <img src="{{asset('storage/Admin/'.$c->photo)}}" class="avatar avatar-lg me-3 border-radius-lg" alt="user1">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <input type="hidden" name="afficher">
                            <h6 class="mb-0 text-sm">{{$c->name}}</h6>
                          </div>

                        </div>
                      </td>
                      <td >  
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{$c->email}}</h6>
                          </div>
                      </td>
                      <td >
                         @if($c->est_super_admin)
                          <div class='d-flex flex-column justify-content-center badge badge-sm bg-gradient-success'>
                       Admin
                       </div>
                         @else
                          <div class='d-flex flex-column justify-content-center badge badge-sm bg-gradient-secondary'>
                       Gestionnaire
                       </div>
                       @endif
                      
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{$c->created_at}}</p>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{$c->updated_at}}</p>
                      </td>
                      <td>
                         <a class="btn bg-gradient-warning mb-0"  href="{{url('/editgest'.$c->id)}}" >
                            <input type="hidden" name="afficher">
                          <i class="material-icons text-sm" >update</i>&nbsp;&nbsp;modifier
                        </a>
                      </td>
                      <td class="align-middle">
                         <a class="btn bg-gradient-danger mb-0"  href="{{url('/suppressiongest'.$c->id)}}" >
                            <input type="hidden" name="afficher">
                          <i class="material-icons text-sm" >person_add_disabled</i>&nbsp;&nbsp;Supprimer
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
          {{$gestionnaire->links()}}
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

