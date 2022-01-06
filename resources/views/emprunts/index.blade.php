@extends('layouts.master')

@section('content')

    <div class="container-fluid py-4">
        <div class="col-12">
            <div class="row">
            <div class="col-md-4">
              <a class="btn bg-gradient-success mb-3" href="{{url('/emprunts/ajouter')}}">
                <input type="hidden" name="ajouter">
                <i class="material-icons text-sm">add</i>&nbsp;&nbsp;Ajouter emprunt
                </a>
            </div>
            <div class="col-md-8 d-flex flex-row-reverse">
                <div class="btn-group" role="group" aria-label="Basic example">
                    @if (Request::url() === url('/emprunts/tout'))
                        <a class="btn btn-dark" href="{{url('/emprunts/tout')}}">Tout</a>
                    @else
                    <a class="btn btn-secondary" href="{{url('/emprunts/tout')}}">Tout</a>
                    @endif
                    @if (Request::url() === url('/emprunts/rendu'))
                    <a class="btn btn-dark" href="{{url('/emprunts/rendu')}}">Rendu</a>
                    @else
                    <a class="btn btn-secondary" href="{{url('/emprunts/rendu')}}">Rendu</a>
                    @endif
                    @if (Request::url() === url('/emprunts/non-rendu'))
                    <a class="btn btn-dark" href="{{url('/emprunts/non-rendu')}}">Non rendu</a>
                    @else
                    <a class="btn btn-secondary" href="{{url('/emprunts/non-rendu')}}">Non rendu</a>
                    @endif
                    @if (Request::url() === url('/emprunts/date-limite-depasse'))
                    <a class="btn btn-dark" href="{{url('/emprunts/date-limite-depasse')}}">Date limite dépassé</a>
                    @else
                    <a class="btn btn-secondary" href="{{url('/emprunts/date-limite-depasse')}}">Date limite dépassé</a>
                    @endif
                  </div>
            </div>
            </div>

            <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Emprunts</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-3">Abonné</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Titre du livre</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date d'emprunt</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date de remise</th>
                      @if (Request::url() === url('/emprunts/tout'))
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Rendu</th>
                    @endif
                    </tr>
                  </thead>
                  <tbody>


                      @foreach ($emprunts as $emprunt)
                      
                      <?php $abonne = \App\Models\Abonne::withTrashed()->find($emprunt->abonnes_id); ?>
                      <?php $livre = \App\Models\Livre::withTrashed()->find($emprunt->livres_id); ?>

                    <tr>
                      <td>
                            <p class="text-xs text-secondary mb-0 ps-2"><b>{{ $abonne->nom.' '.$abonne->prenom }}<b></p>
                          </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{ $livre->titre }}</p>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <p class="text-xs font-weight-bold mb-0"> {{ $emprunt->date_debut }} </p>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <p class="text-xs font-weight-bold mb-0"> {{ $emprunt->date_fin }} </p>
                    </td>
                    @if (Request::url() === url('/emprunts/tout'))
                    <td class="align-middle text-center text-sm">
                        @if ($emprunt->est_rendu == true)
                          <span class="badge badge-sm bg-gradient-success">Oui</span>
                        @else
                          <span class="badge badge-sm bg-gradient-secondary">Non</span>
                        @endif
                    </td>
                    @endif
                    </tr>
                    @endforeach

                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <div class="pagination">
            {{$emprunts->links()}}
            </div>

      </div>
     
@endsection('content')