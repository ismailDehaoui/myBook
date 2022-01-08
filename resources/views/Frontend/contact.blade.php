@extends('Frontend.layouts.footer')
@extends('Frontend.layouts.masterF')

@section('content')
      
      
    
  <main class="bg-light">
    @if (session('status'))
    <div class=" alert alert-success">
        {{ session('status') }}
    </div>
    @endif
    <div class="page-section">
      <div class="container">
        <div class="text-center">
          <h2 class="title-section mb-3">Restez en contact!</h2>
          <p>Dites bonjour ou laissez un message. Vous pouvez envoyé un message manuellement à: <a href="mailto:monlivre12@gmail.com">monlivre12@gmail.com</a></p>
        </div>

        <section style="padding-top:60px;">
         <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
         <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
          <div class="container">
            
         <div class="row">
         <div class="col-md-3"> </div>
            <div class="col-md-6 offset md-3" >
              <div ="card">
                <div class="card-header">

        <div class="card-body">
            <form action="{{route('contact.send')}}" method="POST" enctype="multipart/form-data" >
                @csrf
                <div class="form-group">
                  <label for="name">Nom</label>
                  <input type="text" class="form-control" name="name" placeholder="Entrez votre nom">
                </div>
                <div class="form-group">
                  <label for="email" >Email</label>
                  <input type="email" class="form-control" name="email" placeholder="Entrez votre email">
                </div>
                <div class="form-group">
                  <label for="subject" >Sujet</label>
                  <input type="text" class="form-control" name="subject" placeholder="Sujet">
                </div>
                <div class="form-group">
                  <label for="message">Message</label>
                  <textarea name="message" rows="8" class="form-control" placeholder="Entez votre message.."></textarea>
                </div>
                  <button type="submit" class="btn btn-primary px-5">Soumettre</button>
            </form>
          </div>
         </div>
        </div> 
       </div>
       <div class="col-md-3" ></div>
      </div>
       </section>
        </div>
        </div>                  
         </main> 
      </div> <!-- .container -->
    </div> <!-- .page-section -->

     @endsection('content')

