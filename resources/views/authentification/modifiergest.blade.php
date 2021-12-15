
@extends('layouts.master')
@Section('content')
  
    <div class="row">
        <div class="col-6">
                <div class="card card-plain">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                 <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                  <h6 class="text-white text-capitalize ps-3">Modifier utilisateur</h6> 
              </div>
               <p> <br/>   </p>   
            </div>
                <p class="card-body">
                  <form action="{{url('modifiergest/'.$gest->id)}}" method="POST" ENCTYPE="multipart/form-data">
                    <input type="hidden" name="_method" value="PUT">
                  	{{ csrf_field()}}
                    <p class=" input-group-outline mb-3">
                      <label class="form-label">Nom</label>
                      <input type="text" class=" px-2 form-control border border-primary" name="nom" value="{{$gest->name}}" required="true">
                    </p>

                    <p class=" input-group-outline mb-3">
                      <label class="form-label">
                      Email</label>
                      <input type="text" class="px-2 form-control border border-primary" name="email" value="{{$gest->email}}" required="true">
                    </p>

                    <p class="input-group-outline mb-9">
                      <label class="form-label">
                      Photo</label>
                        <img src="{{asset('storage/Admin/'.$gest->photo)}}" class="avatar avatar-lg me-3 border-radius-lg" alt="user1">
                      <br/><br/>
                      <input type="file" class="form-control border border-primary" name="image"  value="{{asset('storage/Admin/'.$gest->photo)}}" accept="image/jpg,image/jpeg,image/png">
                    </p>
                    <div class="text-center">
                      <input type="submit" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0" name="" value="Modifier">
                    </div>
                  </form>
                </p>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-2 text-sm mx-auto">
                    <a href="{{url('/affgest')}}" class="text-primary text-gradient font-weight-bold">Retournez aux utilisateurs</a>
                  </p>
                </div>
              </div>
            </div>
    </div></div>
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
