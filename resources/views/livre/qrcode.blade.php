@extends('layouts.master')
@Section('content')


    <div class="container mt-4">

        <div class="card">
            <div class="card-header">
                <h2>Titre du livre : {{ $livre->titre }}</h2>
            </div>
            <hr/>
            <div class="card-body">
                {!! QrCode::size(300)->generate($livre->ISBN) !!}
            </div>
        </div>
    </div>

    @endsection('content')