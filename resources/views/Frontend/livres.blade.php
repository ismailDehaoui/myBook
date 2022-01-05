@extends('Frontend.layouts.footer')
@extends('Frontend.layouts.masterF')

@section('title')
   livres
@endsection
@section('content')

<style>
    
</style>

<div class="ismail">      
    <div class="row">
        <div class="col-lg-6 py-4">
            <div class="sidebar">
                <div class="logo_content">
                    <div class="logo">
                        <i class='bx bxs-category'></i>
                        <div class="logo">
                            Categoreis
                        </div>
                    </div>
                </div>
                <div>    
                    <ul class="nav_list">
                        @foreach ($categoreis as $categorei)
                            <li>
                                <a href="{{url('/livre/categorie/'.$categorei->nom)}}">   
                                    <span class="links_name">{{$categorei->nom}}</span>
                                </a>
                                <span class="tooltip">{{$categorei->nom}}</span>
                            </li>    
                        @endforeach  
                    </ul>
                </div> 
            </div>
        </div>
    </div>       
    <div class="ii">
        <div class="page-section">
            <div class="container">
                <div>
                    <form action="/search" method="GET">
                        {{csrf_field()}}
                        <div class="container di">
                            <ul class="list-unstyled row    ">
                                <li class="col-md ">        
                                    <label for="">Auteur</label>
                                    <select name="auteur" id="">
                                        <option value=""></option>
                                        @foreach ($auteurs as $auteur)
                                            <option value="{{$auteur->nom}}">{{$auteur->nom}}</option>
                                        @endforeach
                                    </select>
                                </li>
                                <li class="col-md ">    
                                    <label for="">Titre</label>
                                    <select name="titre" id="">
                                        <option value=""></option>
                                        @foreach ($livres as $livre)
                                            <option value="{{$livre->titre}}">{{$livre->titre}}</option>
                                        @endforeach
                                    </select>
                                </li>
                                <li class="col-md ">
                                    <label for="">La langue</label>
                                    <select name="langue" id="">
                                        <option value=""></option>
                                        <option value="arabe">Arabe</option>
                                        <option value="francais">Francais</option>
                                        <option value="anglais">Anglais</option>
                                    </select>
                                </li>
                                
                                <li class="col-md ">    
                                    <label for="">Mot Clé</label>
                                    <input type="text" name="mot-clé"> 
                                </li>
                                <li class="col-md ">
                                    <input type="submit" value="Search">

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
                <div class="row ">
                    @foreach ($livres as $livre)          
                        <div class="col-md-3 mb-3">
                            <div class="portfolio">       
                                <div class="container2">
                                    <ul class="gallery">
                                        <li>
                                            <div class="flip">
                                                <div class="front-side">
                                                    <img src="{{asset('storage/images/livres/'.$livre->photo)}}">
                                                </div>
                                                <div class="back-side">
                                                    <a href="{{url('/livre/categorie/'.$categorei->nom.'/'.$livre->titre)}}">
                                                         <div class="content2">
                                                            <div class="loader"></div>
                                                            <div class="text2">
                                                                <h3>{{$livre->titre}}</h3>                                        
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
</div>
@endsection('content')
