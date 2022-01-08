@extends('Frontend.layouts.footer')
@extends('Frontend.layouts.masterF')

@section('title')
   livres
@endsection
@section('content')

<div class="container-fluid">      
    <div class="row">

        <div class="col-md-3">
            <div class="wrapper d-flex align-items-stretch sticky-top">
                <div>
                    <nav id="sidebar" class="order-last" class="img" style="background-image: url(images/bg_1.jpg);">
                        <div class="">
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
                        </div>
                    </nav>
                </div>
            </div>
        </div>

        <div class="col-md-9">
            
            <div class="row p-2">
                <form action="/search" method="GET">
                    {{csrf_field()}} 
                    
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
                        
                </form>
            </div>
            <div class="row bg-light text-center"><h2 class="title-section">Tout les livres<h2></div>
            <div class="row">
                @foreach ($livres as $livre)
                      <div class="col-md-4">  
                        <div class="card my-2" style="width: 18rem;">
                          <img style="width: 100%;
                          height: 15vw;
                          object-fit: cover;" class="card-img-top" src="{{asset('storage/images/livres/'.$livre->photo)}}" alt="Card image cap">
                          <div class="card-body">
                            <h4 class="card-title text-truncate">{{$livre->titre}}</h4>
                              <p class="card-text text-truncate">
                                {{$livre->resume}}
                              </p>
                              <a href="{{url('/livre/'.$livre->titre)}}" class="btn btn-primary">Détails</a>
                          </div>
                        </div>
                      </div>
                @endforeach                
              </div>
            
        </div>

    </div>
    <div class="pagination">
        {{$livres->links()}}
    </div>
</div>

        

@endsection('content')































