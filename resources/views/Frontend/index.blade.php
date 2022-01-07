@extends('Frontend.layouts.footer')
@extends('Frontend.layouts.masterF')

@section('title')
    Home page
@endsection

@section('content')
@include('Frontend.include.slider')
<div class="page-section">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-6 py-3">
          <div class="subhead"></div>
          <h2 class="title-section">les plus nouveaux</h2>
        </div>
        <div class="col-md-6 py-3 text-md-right">
          <a href="portfolio.html" class="btn btn-outline-primary">Afficher tous <span class="mai-arrow-forward ml-2"></span></a>
        </div>
      </div>
      <div class="row md-3">
        @foreach ($livres as $livre)
              <div class="col-md-4">  
                <div class="card my-2" style="width: 18rem;">
                  <img class="card-img-top" src="{{asset('storage/images/livres/'.$livre->photo)}}" alt="Card image cap">
                  <div class="card-body">
                    <h5 class="card-title text-truncate">{{$livre->titre}}</h5>
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
<div class="page-section">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-6 py-3">
          <div class="subhead"></div>
          <h2 class="title-section">les plus vu</h2>
        </div>
        <div class="col-md-6 py-3 text-md-right">
          <a href="portfolio.html" class="btn btn-outline-primary">Afficher tous <span class="mai-arrow-forward ml-2"></span></a>
        </div>
      </div>
      <div class="row mt-3">
        <div class="owl-carousel featured-carousel owl-theme">
            @foreach ($livres as $livre)          
                <div class="item">
                    <div class="portfolio">
                        <a href="{{asset('storage/images/livres/'.$livre->photo)}}" data-fancybox="portfolio">
                            <img src="{{asset('storage/images/livres/'.$livre->photo)}}" alt="">
                        </a>
                    </div>
                    <h5>{{$livre->titre}}</h5>
                </div>
            @endforeach
        </div>          
      </div>
    </div>
</div>

@endsection
@section('scripts')
<script>
    $('.featured-carousel').owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        dots:false,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:3
            }
        }
})
</script>
    
@endsection