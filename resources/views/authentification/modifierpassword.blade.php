
@extends('layouts.master')
@Section('content')
  
    <div class="row">
         <div class="col-md-12">
          <div class="row">
           <div class="col-md-6">
            <div class="card  my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                 <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                  <h6 class="text-white text-capitalize ps-3">Modifier Profile</h6> 
              </div>  
                <p class="card-body">
                  <form action="{{url('modifierpass/'.$pass->id)}}" method="POST" ENCTYPE="multipart/form-data">
                    <input type="hidden" name="_method" value="PUT">
                    {{ csrf_field()}}
                   
                      <p class=" input-group-outline mb-3">
                      <label class="form-label">Nom</label>
                      <input type="text" class=" px-2 form-control border border-primary" name="name" value="{{$pass->name}}">

                    <p class=" input-group-outline mb-3">
                      <label class="form-label">
                      Email</label>
                      <input type="text" class="px-2 form-control border border-primary" name="email" value="{{$pass->email}}">
                    </p>
                     <p class=" input-group-outline mb-3">
                      <label class="form-label">
                       Mot de passe actuel</label>
                      <input type="password" class="px-2 form-control border border-primary" name="ancien_password">
                    </p>
                      <p class=" input-group-outline mb-3">
                      <label class="form-label">
                      Nouveau mot de passe</label>
                      <input type="password" class="px-2 form-control border border-primary" name="password" >
                    </p>
                      <p class=" input-group-outline mb-3">
                      <label class="form-label">
                      Confirmer le nouveau mot de passe</label>
                      <input type="password" class="px-2 form-control border border-primary" name="password_confirmation">
                    </p>
                     <p class="input-group-outline mb-5">
                      <label class="form-label">
                      Photo</label>
                        <img src="{{asset('storage/Admin/'.$pass->photo)}}" class="avatar avatar-lg me-3 border-radius-lg" alt="user1">
                      <br/><br/>
                      <input type="file" class="form-control border border-primary" name="image"  value="{{asset('storage/Admin/'.$pass->photo)}}" accept="image/jpg,image/jpeg,image/png">
                    </p>
                    <div class="text-center">
                      <input type="submit" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0" name="" value="Modifier">
                    </div>
                  </form>
                </p>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-2 text-sm mx-auto">
                    <a href="{{url('user/'.$pass->id.'/profile')}}" class="text-primary text-gradient font-weight-bold">Retournez au Profile</a>
                  </p>
                </div>
             </div> </div></div></div>
            </div>
    </div></div>
@endsection('content')
