@Section('form')
 <form action="{{url('/rechercheUti')}}" method="POST" >
@endsection
@extends('layouts.master')
@Section('content')

  <div class="main-content position-relative  max-height-vh-100 h-100">
    <div class="container-fluid px-2 px-md-4">
      <div class="card card-body mx-3 mx-md-4 mt-n6">
        <div class="row gx-4 mb-2">
          <div class="col-auto">
            <div class="avatar avatar-xl position-relative">
              <img src="{{asset('storage/Admin/'.$users->photo)}}" class="avatar avatar-sm me-3 border-radius-lg"  >
            </div>
              <div class="col-md-4 text-end" style="padding-right:60;">
                      <a href="{{url('/modifierpassword'.$users->id)}}">
                        <i class="fas fa-user-edit text-secondary text-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Profile"></i>
                      </a>
                    </div>
          </div>
          <div class="col-auto my-auto">
            <div class="h-100">
              <h5 class="mb-1"> 
                {{$users->name}}
              </h5>
              <?php
                   if($users->est_super_admin)
                   	{echo '<b> Admin </b>';}
                   else  	{echo '<b> Gestionnaire </b>';}
              ?>
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
                  
                  </div>
                </div>
                <div class="card-body p-3">
                  <hr class="horizontal gray-light my-4">
                  <ul class="list-group">
                    <li class="list-group-item border-0 ps-0 text-sm">
                        <strong class="text-dark">
                            Email:
                        </strong>
                         <br> 
                         {{ $users->email}} 
                       </li>
                       <hr class="horizontal gray-light my-4">
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