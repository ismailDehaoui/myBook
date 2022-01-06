@extends('layouts.master')
@Section('content')


    <div class="container mt-4">

        <div class="card">
            <div class="card-header">
                <h2>Nom complet de l'abonné(e) : {{ $abonne->prenom .' '.$abonne->nom }} </h2>
            </div>
            <hr/>
            <div class="card-body">
                {!! QrCode::size(300)->generate($abonne->id) !!}
            </div>
        </div>
    </div>

    @endsection('content')