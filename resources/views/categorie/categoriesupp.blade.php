@Section('form')
 <form action="{{url('/rechercheCat')}}" method="POST"  id="myForm" >
@endsection
@extends('layouts.master')
@Section('content')
<div class="row">
        <div class="col-12">
        </br>
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Catégories supprimées</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Catégorie</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Date d'ajout</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Date de suppression</th>
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
                            <h6 class="mb-0 text-sm">{{$c->nom}}</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{$c->created_at}}</p>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{$c->deleted_at}}</p>
                      </td>
                      <!--td class="align-middle text-center text-sm">
                        <span class="badge badge-sm bg-gradient-success">Online</span>
                      </td-->
                 
                      <td class="align-middle">
                        <!--a class="btn bg-gradient-info mb-0"  href="{{url('/res'.$c->id)}}" >
                            <input type="hidden" name="afficher">
                         <i class="material-icons text-xlg" >restore_from_trash</i>&nbsp;&nbsp;Restaurer
                        </a-->
                        <form action="{{url('/res'.$c->id)}}" method="POST">
                            {{ csrf_field()}}
                            <input type="hidden" name="_method" value="PUT"/>

                            <button class="btn bg-gradient-info mb-0" type="submit">

                           <i class="material-icons text-xlg">restore_from_trash</i>Restaurer

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
        <div class="pagination">
          {{$categories->links()}}
        </div>
        <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-2 text-sm mx-auto">
                    <a href="{{url('/histo')}}" class="text-primary text-gradient font-weight-bold">Retournez au Historique</a>
                  </p>
        </div>
      </div>
    
@endsection('content')
