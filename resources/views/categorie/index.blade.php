@extends('layouts.master')

@section('content')

    <div class="container-fluid py-4">
        <div class="col-12">
            <div>
              <a class="btn bg-gradient-success mb-3" href="{{url('/catégories/ajouter')}}">
                <input type="hidden" name="ajouter">
                <i class="material-icons text-sm">add</i>&nbsp;&nbsp;Ajouter catégorie
                </a>
            </div>
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
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nombre livres</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Actions</th>
                    </tr>
                  </thead>
                  <tbody>


                      @foreach ($categories as $categorie)
                          
                      
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{ $categorie->nom }}</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">10</p>
                      </td>
                      
          
                      <td class="align-middle">
                        
                        <form action="{{url('/catégories/'.$categorie->id)}}" method="POST">
                          {{ csrf_field() }}
                          {{ method_field('DELETE') }}


                          <a href="{{url('/catégories/'.$categorie->id.'/modifier')}}" class="btn btn-secondary">
                            <i class="fas fa-edit me-sm-1"></i>
                            modifier
                          </a>
                          &nbsp;&nbsp;


                          <button type="submit" class="btn btn-danger">
                            <i class="material-icons text-sm me-sm-1">delete</i>  
                            supprimer
                          </button>
                            
                        </form>
                      </td>
                    </tr>


                    @endforeach


                
                  </tbody>
                </table>
              </div>
            </div>
          </div>

      </div>
     
@endsection('content')