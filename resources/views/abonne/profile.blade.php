@extends('layouts.master')
@Section('content')

  <div class="main-content position-relative max-height-vh-100 h-100">
    <div class="container-fluid px-2 px-md-4">
      <div class="card card-body mx-3 mx-md-4 mt-n6">
        <div class="row gx-4 mb-2">
          <div class="col-auto">
            <div class="avatar avatar-xl position-relative">
              <img src="{{ asset('storage/images/abonnés/'.$abonne->photo) }}" class=""  >
            </div>
          </div>
        
          <div class="col-auto my-auto">
            <div class="h-100">
              <h5 class="mb-1">
                {{$abonne->nom}} {{$abonne->prenom}}
              </h5>
              
            </div>
          </div>
          <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
            <div class="nav-wrapper position-relative end-0">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="row">
            <div class="col-12 col-xl-4">
              <div class="card card-plain h-100">
                <div class="card-header pb-0 p-3">
                  <div class="row">
                    <div class="col-md-8 d-flex align-items-center">
                      <h6 class="mb-0">Profile Information</h6>
                    </div>
                    <div class="col-md-4 text-end">
                      <a href="javascript:;">
                        <i class="fas fa-user-edit text-secondary text-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Profile"></i>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="card-body p-3">
                  <hr class="horizontal gray-light my-4">
                  <ul class="list-group">
                    <li class="list-group-item border-0 ps-0 text-sm">
                        <strong class="text-dark">
                            Email:
                        </strong>
                         <br> {{$abonne->email}}
                    </li>
                    <li class="list-group-item border-0 ps-0 text-sm">
                        <strong class="text-dark">
                            Adresse:
                        </strong>
                         <br> {{$abonne->adresse}}
                    </li>
                    <li class="list-group-item border-0 ps-0 pb-0">
                      <strong class="text-dark text-sm">Date de naissance:</strong>
                      <br>{{$abonne->date_naissance}}
                    </li>   
                  </ul>
                </div>             
              </div>
            </div>
            <div class="card my-4">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                  <h6 class="text-white text-capitalize ps-3">Les livres</h6>
                </div>
              </div>
              
              <div class="card-body px-0 pb-2">
                <div class="table-responsive p-0">
                  <table class="table align-items-center mb-0">
                    <thead>
                      <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Titre </th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Date debut </th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Date fin </th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Rendu </th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th>
                          <div class="d-flex px-2 py-1">
                            <div class="d-flex flex-column justify-content-center">
                              <h6 class="mb-0 text-sm">dd</h6>
                            </div>
                          </div>
                        </th>
                        <th>
                          <div class="d-flex px-2 py-1">
                            <div class="d-flex flex-column justify-content-center">
                              <h6 class="mb-0 text-sm">dd</h6>
                            </div>
                          </div>  
                        </th>
                        <th>
                          <div class="d-flex px-2 py-1">
                            <div class="d-flex flex-column justify-content-center">
                              <h6 class="mb-0 text-sm"> </h6>
                            </div>
                          </div>
                        </th>  
                        <th>
                          <div class="d-flex px-2 py-1">
                            <div class="d-flex flex-column justify-content-center">
                              <h6 class="mb-0 text-sm">
                                dd
                              </h6>
                            </div>
                          </div>
                        </th>
                      </tr>
                    
                    </tbody>
                  </table>
       
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> 
</div>

@endsection('content')