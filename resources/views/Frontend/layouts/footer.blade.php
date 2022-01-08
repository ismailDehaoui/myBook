<style>
  h5{
    color: #fff;
  }
  </style>
<footer class="page-footer">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 py-3">
        <a href="{{url('/')}}" class="navbar-brand">
          <img src="{{asset('../Frontend/assets/img/logo.png')}}" alt="" width="150px">  
        </a>
      </div>
      <div class="col-lg-3 py-3">
        <h5>Information de contact</h5>
        <p>301 Mon Livre bibliothèque, Cerisiers, Tlemcen, Algérie.</p>
        <p>Email: MonLivre12@mail.com</p>
        <p>Phone: 056012815</p>
      </div>
      <div class="col-lg-3 py-3">
        <h5>Bibliothèque</h5>
        <ul class="footer-menu">
          <li><a href="{{url('/contact')}}">Contact</a></li>
          <li><a href="{{url('/about')}}">About</a></li>
          <li><a href="{{url('/covid')}}">Covid-19</a></li>
        </ul>
      </div>
      
  
   
   
    <div class="col-lg-3 py-3">
        <h5>Newsletter</h5>
        <div class="row">
        <form action="{{URL('/newsletter')}}" method="POST" id="form-newsletter">
          <div class="form-group">
          <label for="email">Email </label>
          <input type="email" name="email" class="form-control" placeholder="Entrez votre email" style="width:190px;"></label>
        </div>
        {{csrf_field()}}
          <button type="submit" class="btn btn-primary btn-sm mt-2">Soumettre</button>
        
        </form>
      </div>
     </div>
  
      </div>
    </div>

    <hr>

    <div class="row mt-4">
      <div class="col-md-6">
        <p>Copyright 2022.</p>
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
</footer>  @include('sweetalert::alert')
<script src="{{asset('../Frontend/assets/js/bootstrap.bundle.min.js')}}"></script>

<script src="{{asset('../Frontend/assets/vendor/owl-carousel/js/owl.carousel.min.js')}}"></script>

<script src="{{asset('../Frontend/assets/vendor/wow/wow.min.js')}}"></script>

<script src="{{asset('../Frontend/assets/vendor/fancybox/js/jquery.fancybox.min.js')}}"></script>

<script src="{{asset('../Frontend/assets/vendor/isotope/isotope.pkgd.min.js')}}"></script>

<script src="{{asset('../Frontend/assets/js/google-maps.js')}}"></script>

<script src="{{asset('../Frontend/assets/js/theme.js')}}"></script>
<script src="{{asset('../Frontend/assets/js/animationPhoto.js')}}"></script>

<script src="{{asset('../Frontend/assets/js/main.js')}}"></script>
<script src="{{asset('../Frontend/assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('../Frontend/assets/js/main.js')}}"></script>
<script src="{{asset('../Frontend/assets/js/material-dashboard.js')}}"></script>
<!-- <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAIA_zqjFMsJM_sxP9-6Pde5vVCTyJmUHM&callback=initMap"></script> -->
@yield('scripts')
</body>
</html> 

