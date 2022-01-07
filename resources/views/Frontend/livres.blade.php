@extends('Frontend.layouts.footer')
@extends('Frontend.layouts.masterF')

@section('title')
   livres
@endsection
@section('content')

<style>
        
</style>

<div class="ismail ">      
    <div class="row ">
        <div class="col-lg-6 py-4">
            <div class="wrapper d-flex align-items-stretch">
                <div>
                    <nav id="sidebar" class="order-last" class="img" style="background-image: url(images/bg_1.jpg);">
                        <div class="oi">
                            <h1>
                                <a href="" class="logo">Categoreis</a>
                            </h1>
                            <ul class="list-unstyled components mb-5">
                                @foreach ($categoreis as $categorei)
                                    <li class="active">
                                        <a href="{{url('/livre/categorie/'.$categorei->nom)}}"></span> {{$categorei->nom}}</a>
                                    </li>    
                                @endforeach
                            </ul>
                            <!--<div class="mb-5 px-4">
                                <h3 class="h6 mb-3">Subscribe for newsletter</h3>
                                <form action="#" class="subscribe-form">
                                    <div class="form-group d-flex">
                                    <div class="icon">
                                        <span class="icon-paper-plane"></span>
                                    </div>
                                          <input type="text" class="form-control" placeholder="Enter Email Address">
                                </div>
                              </form>
                            </div>
                            <div class="footer px-4">
                            <p>
                              Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib.com</a>
                            </p>
                            </div>-->
                        </div>
                    </nav>
                </div>
            </div>    
        </div>
    </div>       
    <div class="ii">
        <div class="page-section">
            <div class="container card">
                <div>
                    <form action="/search" method="GET">
                        {{csrf_field()}} 
                        <div class="container di">
                            <ul class="list-unstyled row">
                                <li class="col-md-3 ">        
                                    <label for="">Auteur</label>
                                    <br>
                                    <select class="w-100" style="height: 25px;" name="auteur" id="">
                                        <option value=""></option>
                                        @foreach ($auteurs as $auteur)
                                            <option value="{{$auteur->nom}}">{{$auteur->nom}}</option>
                                        @endforeach
                                    </select>
                                </li>
                                <li class="col-md-3 ">    
                                    <label for="">Titre</label>
                                    <BR>
                                    <select class="w-100" style="height: 25px;" name="titre" id="">
                                        <option value=""></option>
                                        @foreach ($livres as $livre)
                                            <option value="{{$livre->titre}}">{{$livre->titre}}</option>
                                        @endforeach
                                    </select>
                                </li>
                                <li class="col-md-3 ">
                                    <label for="">La langue</label>
                                    <br>
                                    <select class="w-100" style="height: 25px;" name="langue" id="">
                                        <option value=""></option>
                                        <option value="arabe">Arabe</option>
                                        <option value="francais">Francais</option>
                                        <option value="anglais">Anglais</option>
                                    </select>
                                </li>
                                
                                <li class="col-md-3 ">    
                                    <label for="">Mot Clé</label>
                                    <br>
                                    <input class="w-100" style="height: 25px;" type="text" name="mot-clé"> 
                                </li>
                                <li class="col">
                                    <button type="submit" class="btn btn-primary mt-2 "><i class='bx bx-search-alt-2'></i>&nbsp;&nbsp; Chercher</button>

                                </li>        
                            </ul>
                        </div>    
                    </form>
                </div>
                
                <div class="row align-items-center">   
                    <div class="col-md-6 py-3">
                        <div class="subhead"></div>
                            <h2 class="title-section">Tous les livres </h2>
                            <hr>
                        </div>
                    </div>
                </div>    
                <div class="row md-3">
                    @foreach ($livres as $livre)          
                        <div class="col-md-4">
                            <div class="my-2" style="width: 18rem;"">       
                                <div class="container2">
                                    <ul class="gallery">
                                        <li>
                                            <div class="flip">
                                                <div class="front-side">
                                                    <img src="{{asset('storage/images/livres/'.$livre->photo)}}">
                                                </div>
                                                <div class="back-side">
                                                    <a href="{{url('/livre/'.$livre->titre)}}">
                                                         <div class="content2 cc">
                                                            <div class="loader"></div>
                                                            <div class="text2 card-body">
                                                                <h6 class="card-text">{{$livre->titre}}</h6>                                        
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </li>  
                                    </ul>
                                </div> 
                            </div>         
                            
                        </div>
                    @endforeach         
                </div>
            </div>
        </div>
        
    </div>
    <div class="pagination">

        {{$livres->links()}}
    
        </div>
</div>

@endsection('content')



































