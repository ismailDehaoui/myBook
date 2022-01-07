<style>
   .fixed-plugin .fixed-plugin-button {
  background: #fff;
  border-radius: 50%;
  bottom: 30px;
  right: 30px;
  font-size: 1.25rem;
  z-index: 990;
  box-shadow: 0 2px 12px 0 rgba(0, 0, 0, 0.16);
  cursor: pointer; }
  .fixed-plugin .fixed-plugin-button i {
    pointer-events: none; }

.fixed-plugin .card {
  position: fixed !important;
  right: -360px;
  top: 0;
  height: 100%;
  left: auto !important;
  transform: unset !important;
  width: 360px;
  border-radius: 0;
  padding: 0 10px;
  transition: .2s ease;
  z-index: 1020; }

.fixed-plugin .badge {
  border: 1px solid #fff;
  border-radius: 50%;
  cursor: pointer;
  display: inline-block;
  height: 23px;
  margin-right: 5px;
  position: relative;
  width: 23px;
  transition: all 0.2s ease-in-out; }
  .fixed-plugin .badge:hover, .fixed-plugin .badge.active {
    border-color: #344767; }

.fixed-plugin .btn.bg-gradient-dark:not(:disabled):not(.disabled) {
  border: 1px solid transparent; }
  .fixed-plugin .btn.bg-gradient-dark:not(:disabled):not(.disabled):not(.active) {
    background-color: transparent;
    background-image: none;
    border: 1px solid #344767;
    color: #344767; }

.fixed-plugin.show .card {
  right: 0; }
</style>
<footer class="page-footer">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 py-3">
          <img src="{{asset('../Frontend/assets/img/logo.png')}}" alt="" width="150px">
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
          <p>Copyright 2021.</p>
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
