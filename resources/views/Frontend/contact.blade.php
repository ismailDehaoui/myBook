@extends('Frontend.layouts.footer')
@extends('Frontend.layouts.masterF')

@section('title')
   contact
@endsection
@section('content')

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
  @endsection('content')
