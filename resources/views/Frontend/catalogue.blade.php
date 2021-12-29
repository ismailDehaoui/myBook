@extends('Frontend.layouts.masterF')
@Section('content')
<style>
  body {
	font-family: Arial, Helvetica, sans-serif;
  margin: 0;
}
.sidebar{
  background: linear-gradient(45deg,blueviolet,deeppink);
  float: left;
  width: 250px;
  text-align: center;
  box-shadow: 0px 5px 10px black;
  height: 100vh;
  padding: 10px;
}
.sidebar a{
  display: block;
  color: white;
  text-decoration: none;
  font-size: 18px;
  padding: 14px 25px
  
}
.sidebar a:hover{
  background: linear-gradient(45deg, deeppink, coral);
  border-radius:50px;
  box-shadow: 0 0 5px black; 
}

</style>
<main>
  <aside class="sidebar">
    <h1>Categories</h1>
    @foreach ($categories as $categorie)
        <a href="{{ url('/books/categories/'.$categorie->nom) }}">{{$categorie->nom}}</a>
    @endforeach
  </aside>  
  <div class="">
    <div class="">
      <div class="row align-items-center">
        <div class="col-md-6 py-3">
          <div class="subhead"></div>
          <h2 class="title-section">les livres</h2>
        </div>
      </div>
      <div class="row mt-3">
        @foreach ($livres as $livre)          
            <div class="col-lg-4 py-3">
            <div class="portfolio">
                <a href="../assets/img/portfolio/work-1.jpg" data-fancybox="portfolio">
                <img src="{{asset('storage/images/livres/'.$livre->photo)}}" alt="">
                </a>
            </div>
            </div>
        @endforeach     
      </div>
    </div>
</div>  
</main>

@endsection('content')