<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <meta name="copyright" content="MACode ID, https://macodeid.com/">

  <title>Mon livre</title>

  <link rel="stylesheet" href="{{asset('../Frontend/assets/css/bootstrap.css')}}">
  
  <link rel="stylesheet" href="{{asset('../Frontend/assets/css/maicons.css')}}">

  <link rel="stylesheet" href="{{asset('../Frontend/assets/vendor/animate/animate.css')}}">

  <link rel="stylesheet" href="{{asset('../Frontend/assets/vendor/owl-carousel/css/owl.carousel.css')}}">

  <link rel="stylesheet" href="{{asset('../Frontend/assets/vendor/fancybox/css/jquery.fancybox.css')}}">

  <link rel="stylesheet" href="{{asset('../Frontend/assets/css/theme.css')}}">

</head>
<body>

  <!-- Back to top button -->
  <div class="back-to-top"></div>

  <header>
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

    <nav class="navbar navbar-expand-lg navbar-light">
      <div class="container">
        <a href="index.html" class="navbar-brand">Reve<span class="text-primary">Tive.</span></a>

        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-collapse collapse" id="navbarContent">
          <ul class="navbar-nav ml-auto pt-3 pt-lg-0">
            <li class="nav-item active">
              <a href="index.html" class="nav-link">Accueil</a>
            </li>
            <li class="nav-item">
              <a href="about.html" class="nav-link">A propos</a>
            </li>
            <li class="nav-item">
              <a href="services.html" class="nav-link">Services</a>
            </li>
            <li class="nav-item">
              <a href="portfolio.html" class="nav-link">Projects</a>
            </li>
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

    <div class="page-banner home-banner mb-5">
      <div class="slider-wrapper">
        <div class="owl-carousel hero-carousel">
          <div class="hero-carousel-item">
            <img src="https://cdn.britannica.com/92/216092-131-5FF4D1E7/custom-library.jpg" alt="">
            <div class="img-caption">
              <h1 class="mb-4">je fais partie de tout ce que j'ai lu.</h1>
              <div class="subhead">Theodor Resovelt</div>
              
              <a href="#services" class="btn btn-outline-light">Get Started</a>
            </div>
          </div>
          <div class="hero-carousel-item">
            <img src="{{asset('../Frontend/assets/img/b.jpg')}}" alt="">
            <div class="img-caption">
              <h1 class="mb-4">continuez à lire c'est l'une des aventures les plus merveilleuses que n'importe qui puisse avoircccc</h1>
              <a href="#services" class="btn btn-outline-light">Get Started</a>
              <a href="#services" class="btn btn-primary">See Pricing</a>
            </div>
          </div>
          <div class="hero-carousel-item">
            <img src="{{asset('../Frontend/assets/img/bf.jpg')}}" alt="">
            <div class="img-caption">
              <div class="subhead"></div>
              <h1 class="mb-4">Today a reader,Tomorrow a leader.</h1>
              <a href="#services" class="btn btn-primary">Read More</a>
            </div>
          </div>
        </div>
      </div> <!-- .slider-wrapper -->
    </div> <!-- .page-banner -->
  </header>

  <main>
    <div class="page-section">
      <div class="container">
       @yield('content')
        <div class="text-center">
          <h2 class="title-section mb-3">Restez en contact</h2>
          <p>Dites simplement bonjour ou envoyez-nous un message. Vous pouvez nous envoyer manuellement un e-mail sur<a href="mailto:MonLivre13@mail.com">MonLivre13@mail.com</a></p>
        </div>
        <div class="row justify-content-center mt-5">
          <div class="col-lg-8">
            <form action="#" class="form-contact">
              <div class="row">
                <div class="col-sm-6 py-2">
                  <label for="name" class="fg-grey">Nom</label>
                  <input type="text" class="form-control" id="name" placeholder="Entrer nom..">
                </div>
                <div class="col-sm-6 py-2">
                  <label for="email" class="fg-grey">Email</label>
                  <input type="text" class="form-control" id="email" placeholder="Adresse email..">
                </div>
                <div class="col-12 py-2">
                  <label for="subject" class="fg-grey">Sujet</label>
                  <input type="text" class="form-control" id="subject" placeholder="Sujet..">
                </div>
                <div class="col-12 py-2">
                  <label for="message" class="fg-grey">Message</label>
                  <textarea id="message" rows="8" class="form-control" placeholder="Entrer message.."></textarea>
                </div>
                <div class="col-12 mt-3">
                  <button type="submit" class="btn btn-primary px-5">Envoyer</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div> <!-- .container -->
    </div> <!-- .page-section -->

    <div class="page-section">
      <div class="container-fluid">
        <div class="row row-cols-md-3 row-cols-lg-5 justify-content-center text-center">
          <div class="py-3 px-5">
            <img src="../assets/img/clients/airbnb.png" alt="">
          </div>
          <div class="py-3 px-5">
            <img src="../assets/img/clients/google.png" alt="">
          </div>
          <div class="py-3 px-5">
            <img src="../assets/img/clients/mailchimp.png" alt="">
          </div>
          <div class="py-3 px-5">
            <img src="../assets/img/clients/paypal.png" alt="">
          </div>
          <div class="py-3 px-5">
            <img src="../assets/img/clients/stripe.png" alt="">
          </div>
        </div>
      </div> <!-- .container-fluid -->
    </div> <!-- .page-section -->

  </main>

  <footer class="page-footer">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 py-3">
          <h3>Reve<span class="fg-primary">Tive.</span></h3>
        </div>
        <div class="col-lg-3 py-3">
          <h5>Information de contact</h5>
          <p>301 Mon Livre bibliothèque, Cerisiers, Tlemcen, Algérie.</p>
          <p>Email: MonLivre13@mail.com</p>
          <p>Phone: +213 43581122</p>
        </div>
        <div class="col-lg-3 py-3">
          <h5>Bibliothèque</h5>
          <ul class="footer-menu">
            <li><a href="#">Carrière</a></li>
            <li><a href="#">Resources</a></li>
            <li><a href="#">News & Feed</a></li>
          </ul>
        </div>
        <div class="col-lg-3 py-3">
          <h5>Newsletter</h5>
          <form action="#">
            <input type="text" class="form-control" placeholder="Entrer votre email">
            <button type="submit" class="btn btn-primary btn-sm mt-2">Envoyer</button>
          </form>
        </div>
      </div>

      <hr>

      <div class="row mt-4">
        <div class="col-md-6">
          <p>Copyright 2021.<a href="https://macodeid.com">MACode ID</a></p>
        </div>
        <div class="col-md-6 text-right">
          <div class="sosmed-button">
            <a href="https://www.facebook.com/275570925812221/posts/2235785053124122/"><span class="mai-logo-facebook-f"></span></a>
            <a href="https://twitter.com/arwa109638/status/840514830037585921"><span class="mai-logo-twitter"></span></a>
            <a href="https://www.youtube.com/watch?v=fma5QYNoFQk"><span class="mai-logo-youtube"></span></a>
            <a href="https://dz.linkedin.com/in/saida-bouaoune-606789155"><span class="mai-logo-linkedin"></span></a>
          </div>
        </div>
      </div>
    </div>
  </footer>

  
<script src="{{asset('../Frontend/assets/js/jquery-3.5.1.min.js')}}"></script>

<script src="{{asset('../Frontend/assets/js/bootstrap.bundle.min.js')}}"></script>

<script src="{{asset('../Frontend/assets/vendor/owl-carousel/js/owl.carousel.min.js')}}"></script>

<script src="{{asset('../Frontend/assets/vendor/wow/wow.min.js')}}"></script>

<script src="{{asset('../Frontend/assets/vendor/fancybox/js/jquery.fancybox.min.js')}}"></script>

<script src="{{asset('../Frontend/assets/vendor/isotope/isotope.pkgd.min.js')}}"></script>

<script src="{{asset('../Frontend/assets/js/google-maps.js')}}"></script>

<script src="{{asset('../Frontend/assets/js/theme.js')}}"></script>

<!-- <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAIA_zqjFMsJM_sxP9-6Pde5vVCTyJmUHM&callback=initMap"></script> -->

</body>
</html>