@extends('layouts.master')

@section('content')

    <div class="container-fluid py-4">
        <div class="col-12">
            <div>
              <a class="btn bg-gradient-success mb-3" href="{{url('/abonnés/ajouter')}}">
                <input type="hidden" name="ajouter">
                <i class="material-icons text-sm">add</i>&nbsp;&nbsp;Ajouter abonné(e)
                </a>
            </div>
            <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white ps-3">Abonné(e)(s)</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nom</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Prénom</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date d'inscription</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Actions</th>
                    </tr>
                  </thead>
                  <tbody>


                      @foreach ($abonnes as $abonne)
                      
                      

                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <img src="{{ asset('storage/images/abonnés/'.$abonne->photo) }}" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <a href="{{url('abonnée/'.$abonne->id.'/profile')}}">
                              <h6 class="mb-0 text-sm">{{$abonne->nom}}</h6>
                            </a>
                            <!--<p class="text-xs text-secondary mb-0">john@creative-tim.com</p>-->
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{ $abonne->prenom }}</p>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <p class="text-xs font-weight-bold mb-0"> {{ $abonne->email }} </p>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <p class="text-xs font-weight-bold mb-0"> {{ $abonne->created_at }} </p>
                      </td>
                      <td>
                       
                        <form action="{{url('/abonnés/'.$abonne->id)}}" method="POST">
                          {{ csrf_field() }}
                          {{ method_field('DELETE') }}

                          <div class="btn-group">
                            <a href="{{url('/abonnés/'.$abonne->id.'/qrcode')}}" title="Qr Code" class="btn btn-info">
                              <i class="fas fa-qrcode me-sm-1"></i>  
                            </a>
                            <a href="{{url('/abonnés/'.$abonne->id.'/edit')}}" title="Modifier" class="btn btn-secondary">
                              <i class="fas fa-edit me-sm-1"></i>
                            </a>
                            <button type="submit" class="btn btn-danger">
                              <i class="fas fa-trash-alt me-sm-1"></i> 
                            </button>
                          </div>

                          
                            
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
            {{$abonnes->links()}}
            </div>

      </div>
     
@endsection('content')



