@Section('form')
 <form action="{{url('/rechercheLivre')}}" method="POST"  id="myForm">
@endsection
@extends('layouts.master')
@Section('content')
<div class="row">
        <div class="col-12">
           <div class="form-check">
                      <form action="{{url('/MasterDetails/'.$livre->id)}}" method="POST" id="myF">
                        {{ csrf_field()}}
                            <input class="form-check-input" type="radio" name="flexRadioDefault" value="radio1" onclick="submitform2()">
                              <label class="form-check-label" id='r1' for="flexRadioDefault1">
                               Emprunts
                              </label>
                               <input checked class="form-check-input" type="radio" name="flexRadioDefault" id='r2' value="radio2" onclick="submitform2()">
                              <label class="form-check-label" for="flexRadioDefault1">
                               Mots clés
                              </label>
                      </form>
                    </div>
        </br>
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">{{$motsC}} mots clés du  
                <img src="{{asset('storage/images/livres/'.$livre->photo)}}" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                          {{$livre->titre}}</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date de creation</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Mot clé</th>
                    </tr>
                  </thead>
                  <tbody>
                  	 @foreach($mots as $c)
                    <tr>
                      <td>
                        <div class="d-flex  py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <a class="nav-link text-blue"   >
                            <input type="hidden" name="afficher">
                            <h6 class="mb-0 text-sm">{{$c->created_at}}</h6>
                          </a></div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{$c->motcle}}</p>
                      </td>
                       
                       <td>
                        <p class="text-xs font-weight-bold mb-0"></p>
                      </td>
                      <!--td class="align-middle text-center text-sm">
                        <span class="badge badge-sm bg-gradient-success">Online</span>
                      </td-->
                 @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
         <div class="pagination">
          {{$mots->links()}}
        </div>
      </div>
@endsection('content')
 <script>
    function submitform2()
{
document.getElementById("myF").submit();
 if(document.getElementById('r1').checked) {
                document.getElementById("r1").checked = true;
            }
            else if(document.getElementById('r2').checked)
                   document.getElementById("r2").checked = true;
                else
                   document.getElementById("r1").checked = true;
            
}
    </script>
