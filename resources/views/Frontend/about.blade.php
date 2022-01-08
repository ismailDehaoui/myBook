@extends('Frontend.layouts.footer')
@extends('Frontend.layouts.masterF')
@section('content')
    <div class="page-section">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6 py-3">
            <div class="subhead">A propos de nous</div>
            <h2 class="title-section">Nous sommes <span class="fg-primary">un groupe professionnel</span> qui traville dur pour s'assurer que nous avons fourni tous vos livres préférés</h2>

            <p>Notre bibliothèque offre en partage à tous ceux qui aiment lire, un lieu où l'on puisse aller à la rencontre de merveilleux livres riches aux informations de tous types et catégories et pour tous les ages.</p>
          </div>
          <div class="col-lg-6 py-3">
            <div class="about-img">
              <img src="../assets/img/team.PNG" alt="">
            </div>
          </div>
        </div>
      </div> <!-- .container -->
    </div> <!-- .page-section -->

    <div class="page-section">
      <div class="container">
        <div class="text-center">
          <div class="subhead">Notre groupe</div>
          <h2 class="title-section">Le groupe professionnel sur Mon livre</h2>
        </div>

              <div class="owl-carousel team-carousel mt-5">
               <div class="team-wrap">
            <div class="team-profile">
              <img src="../assets/img/teams/team_1.jpg" alt="">
            </div>
            <div class="team-content">
              <h5>Denoun Yanis</h5>
              <div class="text-sm fg-grey">Directeur</div>

              <div class="social-button">
                <a href="https://www.messenger.com/"><span class="mai-logo-facebook-messenger"></span></a>
                <a href="https://account.viber.com/fr/login"><span class="mai-call"></span></a>
                <a href="https://www.google.com/intl/fr/gmail/about/#"><span class="mai-mail"></span></a>
              </div>
            </div>
          </div>

          <div class="team-wrap">
            <div class="team-profile">
              <img src="../assets/img/teams/team4.jpg" alt="">
            </div>
            <div class="team-content">
              <h5>Ismail dehaoui</h5>
              <div class="text-sm fg-grey">Sous directeur</div>

              <div class="social-button">
                <a href="https://www.messenger.com/"><span class="mai-logo-facebook-messenger"></span></a>
                <a href="https://account.viber.com/fr/login"><span class="mai-call"></span></a>
                <a href="https://www.google.com/intl/fr/gmail/about/#"><span class="mai-mail"></span></a>
              </div>
            </div>
          </div>

          <div class="team-wrap">
            <div class="team-profile">
              <img src="../assets/img/teams/team_2.jpg" alt="">
            </div>
            <div class="team-content">
              <h5>Berrahou malika</h5>
              <div class="text-sm fg-grey">Bibliothécaire</div>

              <div class="social-button">
                <a href="https://www.messenger.com/"><span class="mai-logo-facebook-messenger"></span></a>
                <a href="https://account.viber.com/fr/login"><span class="mai-call"></span></a>
                <a href="https://www.google.com/intl/fr/gmail/about/#"><span class="mai-mail"></span></a>
              </div>
            </div>
          </div>

          <div class="team-wrap">
            <div class="team-profile">
              <img src="../assets/img/teams/team_3.jpg" alt="">
            </div>
            <div class="team-content">
              <h5>Bouanani Hanane</h5>
              <div class="text-sm fg-grey">Fournisseur</div>

              <div class="social-button">
                <a href="https://www.messenger.com/"><span class="mai-logo-facebook-messenger"></span></a>
                <a href="https://account.viber.com/fr/login"><span class="mai-call"></span></a>
                <a href="https://www.google.com/intl/fr/gmail/about/#"><span class="mai-mail"></span></a>
              </div>
            </div>
          </div>

        </div>
      </div> <!-- .container -->
    </div> <!-- .page-section -->
    </div> <!-- .page-section --> 
  @endsection('content')