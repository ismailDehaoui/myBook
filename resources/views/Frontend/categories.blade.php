@extends('Frontend.layouts.footer')
@extends('Frontend.layouts.masterF')
@section('title')
    Categories
@endsection
@section('content')
<div class="page-section">
      <div class="row mt-3">
        <div class="owl-carousel featured-carousel owl-theme">
            @foreach ($categories as $categorie)          
                <div class="item">
                    <div class="portfolio">
                        iiii
                        <a href="{{url('/livre/categorie/'.$categorie->nom)}}" data-fancybox="portfolio">
                            <h5>{{$categorie->nom}}</h5>
                        </a>
                    </div>
                    
                </div>
            @endforeach
        </div>          
      </div>
    </div>
</div>
@endsection('content')