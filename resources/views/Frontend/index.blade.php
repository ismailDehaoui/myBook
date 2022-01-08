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
          <h2 class="title-section">Les livres récents</h2>
        </div>
        <div class="col-md-6 py-3 text-md-right">
          <a href="{{url('/books')}}" class="btn btn-outline-primary">Afficher tous <span class="mai-arrow-forward ml-2"></span></a>
        </div>
      </div>
      <div class="row md-3">
        @foreach ($livresN as $livre)
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
          <h2 class="title-section">Les livres les plus vus</h2>
        </div>
        <div class="col-md-6 py-3 text-md-right">
          <a href="{{url('/books')}}" class="btn btn-outline-primary">Afficher tous <span class="mai-arrow-forward ml-2"></span></a>
        </div>
      </div>
      <div class="row mt-3">
        @foreach ($livresV as $livre)          
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
        <h2 class="title-section">Les nouvelles catégories</h2>
      </div>
      <div class="col-md-6 py-3 text-md-right">
        <a href="{{url('/books')}}" class="btn btn-outline-primary">Afficher tous <span class="mai-arrow-forward ml-2"></span></a>
      </div>
    </div>
    <div class="row mt-3">
      @foreach ($categories as $cat)          
        <div class="col-md-4">  
          <div class="card my-2" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title text-truncate" style="color: black;">{{$cat->nom}}</h5>
                <a href="{{url('/livre/categorie/'.$cat->nom)}}" class="btn btn-primary">Détails</a>
            </div>
          </div>
        </div>
      @endforeach
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