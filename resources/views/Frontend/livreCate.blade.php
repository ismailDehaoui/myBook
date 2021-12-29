@extends('Frontend.layouts.footer')
@extends('Frontend.layouts.masterF')
@section('title')
   {{$categorie->nom}}
@endsection
@section('content')
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
                    <ul class="nav_list">
                        @foreach ($categoreis as $categorei)
                            <li >
                                <a href="{{url('/livre/categorie/'.$categorei->nom)}}">
                                    <span class="links_name">{{$categorei->nom}}</span>
                                </a>
                                <span class="tooltip">{{$categorei->nom}}</span>
                            </li>    
                        @endforeach  
                    </ul>
                    <div class="logo">
                        <img src="https://img.icons8.com/color/48/000000/language.png"/>
                        <div class="logo">
                            Langue
                        </div>    
                    </div>
                    <ul class="nav_list">
                        <li>
                            <a href="">
                                <span class="links_name">Arabe</span>
                            </a>
                            <span class="tooltip">Arabe</span>
                        </li>
                        <li>
                            <a href="">
                                <span class="links_name">Français</span>
                            </a>
                            <span class="tooltip">Français</span>
                        </li>
                        <li>
                            <a href="">
                                <span class="links_name">Anglais</span>
                            </a>
                            <span class="tooltip">Anglais</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>       
    <div class="ii">
        <div class="page-section">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6 py-3">
                        <div class="subhead"></div>
                            <h2 class="title-section">{{$categorie->nom}}</h2>
                            <hr>
                        </div>
                    </div>
                </div>    
                <div class="row ">
                    @foreach ($livres as $livre)          
                        <div class="col-md-3 mb-3">
                                <a href="{{asset('storage/images/livres/'.$livre->photo)}}">
                                    <div class="container">
                                        <ul class="gallery">
                                            <li>
                                                <div class="flip">
                                                    <div class="front-side">
                                                        <img src="{{asset('storage/images/livres/'.$livre->photo)}}" alt="">
                                                    </div>
                                                    <div class="back-side">
                                                        <a href="{{url('/livre/categorie/'.$categorei->nom.'/'.$livre->titre)}}">
                                                             <div class="content">
                                                                <div class="loader"></div>
                                                                <div class="text">
                                                                    <h3>{{$livre->titre}}</h3>                                        
                                                                </div>
                                                            </div>
                                                        </a>
                                                     </div>
                                                </div>
                                            </li>  
                                        </ul>
                                    </div>
                                </a>
                            </div>
                         @endforeach         
                </div>
            </div>
        </div>
    </div>
</div>                   
@endsection('content')    
