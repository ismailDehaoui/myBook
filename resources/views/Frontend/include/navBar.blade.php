  <style>
    .kheiro{
      background:  #f8f2ed;
    }
  </style>
  <header>
    
    <div class="container bg-danger text-center text-white">
      <div class="p-2">
        <b>COVID-19 Alert : </b> 
        Pour se protèger et protèger les autres ! - 
        <a href = "#" class="text-dark">
          <b>Lire Plus</b>
        </a>
      </div>
    </div>
    <div class="top-bar">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-8">
            <div class="d-inline-block">
              <span class="mai-mail fg-primary"></span> <a href="mailto:contact@mail.com">MonLivre13@mail.com</a>
            </div>
            <div class="d-inline-block ml-2">
              <span class="mai-call fg-primary"></span> <a href="tel:+0011223495"> +213 43581122</a>
            </div>
          </div>
          <div class="col-md-4 text-right d-none d-md-block">
            <div class="social-mini-button">
              
              <a href="https://www.facebook.com/275570925812221/posts/2235785053124122/"><span class="mai-logo-facebook-f"></span></a>
              <a href="https://twitter.com/arwa109638/status/840514830037585921"><span class="mai-logo-twitter"></span></a>
              <a href="https://www.youtube.com/watch?v=fma5QYNoFQk"><span class="mai-logo-youtube"></span></a>
              <a href="https://dz.linkedin.com/in/saida-bouaoune-606789155"><span class="mai-logo-linkedin"></span></a>
            </div>
          </div>
        </div>
      </div> <!-- .container -->
    </div> <!-- .top-bar -->

    <nav class="navbar  navbar-expand-lg navbar-light">
      <div class="container kheiro">
        <a href="{{url('/')}}" class="navbar-brand">
          <img src="{{asset('../Frontend/assets/img/logo.png')}}" alt="" width="150px">  
        </a>

        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-collapse collapse" id="navbarContent">
          <ul class="navbar-nav ml-auto pt-3 pt-lg-0">
            <li class="nav-item active">
              <a href="{{url('/')}}" class="nav-link">Accueil</a>
            </li>
            <li class="nav-item">
              <a href="about.html" class="nav-link">A propos</a>
            </li>
            <li class="nav-item">
              <a href="{{url('/books')}}" class="nav-link">Les livres</a>
            </li>
            <!--<li class="nav-item">
              <a href="{{url('/livre/categories')}}" class="nav-link">Categoreis</a>
            </li>-->
            <li class="nav-item">
              <a href="blog.html" class="nav-link">News</a>
            </li>
            <li class="nav-item">
              <a href="contact.html" class="nav-link">Contact</a>
            </li>
          </ul>
        </div>
      </div> <!-- .container -->
    </nav> <!-- .navbar -->
  </header>