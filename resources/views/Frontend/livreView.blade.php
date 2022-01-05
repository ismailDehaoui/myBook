@extends('Frontend.layouts.footer')
@extends('Frontend.layouts.masterF')
@section('title')
   {{$livre->titre}}
@endsection
@section('content')
<style>
 .container{
    
    width: 400%;
 }  
 /* Par défaut, une étoile est en gris,
   avec un padding et un curseur en forme de main. */
   .bxs-star {
	color: gray;
	cursor: pointer;
	padding: 0.0001rem;
}
/* Si elle porte en plus la classe '.gold', elle sera en jaune. */
.bxs-star.gold {
	color: #ffdc0f;
}

/* Le parent global '.rating' positionne le groupe des étoiles et le lien en colonne */
.rating {
	display: flex;
	flex-direction: column;
	/*align-items: center;*/
}

	/* Le groupe '.stars' positionne les étoiles
		 les unes à côté des autres sans espacements. */
	.stars {
		display: inline-flex;
		/*justify-content: center;*/
		font-size: 1em;
	}

	/**
	 * Et là opère la magie du ':hover' !
	 */

	/* A l'état :hover sur le parent '.rating',
		 on force TOUTES les étoiles à passer en jaune. */
	
	/* Et si la souris survole une étoile en particulier,
		 on sélectionne toutes les étoiles qui sont APRÈS celle-ci
		 grâce à l'opérateur '~' et on les force en GRIS */
	.stars .bxs-star:hover ~ .bxs-star {
		color: gray;
	}
   .kheir{
      background:  #f7e7d9;
    }
/******************************************************************/
/* style pour la démo */

/******************************************************************/
</style>
<div class="py-3 kheir mb-4 shadow-sm  border-top">
   <div class="container">
      <h6 class="mb-0">
         <a href="{{url('/')}}">accueil</a>/
         <a href="{{url('/books')}}">Categoreis</a>/
         <a href="{{url('/livre/categorie/'.$caregorie->nom)}}">{{$caregorie->nom}}</a>
      </h6>
   </div>
</div> 
<div class="container">
     <div class="bd">
      <div class="dehaoui">
         <div class="left_Side"> 
            <div class="profileText">
               <div class="imgBx">
                  <img src="{{asset('storage/images/livres/'.$livre->photo)}}" alt="">
               </div>  
               <h2>
                  {{$livre->titre}}
                  <br>
                  @foreach ($auteurs as $auteur)
                     <small>
                       {{$auteur->nom}}
                       <br> 
                     </small>
                  @endforeach   
               </h2>
            </div>
         </div>
         <div class="center_Side">
            <div class="about">
               <h2 class="title">Resume</h2>                           
               <hr>
               <p>
                  {{$livre->resume}}
               </p>
            </div>
         </div>
         <div class="right_Side">
            <table>
               <thead>
                  <tr>
                     <td class="main">Auteur</td>
                     <td>
                        @foreach ($auteurs as $auteur)
                     <small>
                       {{$auteur->nom}}
                       <br> 
                     </small>
                  @endforeach
                     </td>
                  </tr>
                  <tr>
                     <td class="main">Editeur</td>
                     <td>{{$livre->editeur}}</td>
                  </tr>   
                  <tr>
                     <td class="main">ISBN</td>
                     <td>{{$livre->ISBN}}</td>
                  </tr>
                  <tr>
                     <td class="main">Categorei</td>
                     <td>{{$caregorie->nom}}</td>
                  </tr>
                  <tr>
                     <td class="main">Nombre des exemplaires</td>
                     <td>{{$livre->nombre_exemplaires_disponibles}}</td>
                  </tr>
                  <tr>
                     <td class="main">Année</td>
                     <td>{{$livre->annee}}</td>
                  </tr>
                  <tr>
                     <td class="main">La langue</td>
                     <td>{{$livre->langue}}</td>
                  </tr>
                  <tr>
                     <td class="main">Mot-clé</td>
                     <td>
                        @foreach ($motsCles as $motcle)
                            {{$motcle->motcle}}/ 
                        @endforeach
                     </td>
                  </tr>
               </thead>
            </table> 
         </div>   
      </div>
   </div>  
   <hr>
   
   
    <hr>
</div>
<hr>
<div class="page-section">
   <div class="container">
     <div class="row align-items-center">
       <div class="col-md-6 py-3">
         <div class="subhead"></div>
         <h2 class="title-section">Livres similaires</h2>
         <hr>
       </div>
     </div>
     <div class="row mt-3">
       <div class="owl-carousel featured-carousel owl-theme">
           @foreach ($livres as $livre)          
               <div class="item">
                  <div class="left_Side"> 
                     <div class="profileText">
                        <div class="imgBx">
                           <img src="{{asset('storage/images/livres/'.$livre->photo)}}" alt="">
                        </div>  
                        <h4>
                           {{$livre->titre}}
                        </h4>
                     </div>
                  </div>
               </div>
           @endforeach
       </div>          
     </div>
   </div>
</div>
@endsection('content')
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












