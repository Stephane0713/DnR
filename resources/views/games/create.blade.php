@extends('layouts.layout')

@section('content')

<div class="container">
    <h1 class="title">Nouveau Jeu</h1>

    <div class="row">
        <div class="col-12">
            <div id="app">
                <!--:developers="{{$developers}}" :publishers="{{$publishers}}" :platforms="{{$platforms}}" -->
                <game-form :all-genres="{{$genres}}" />
            </div>
        </div>
    </div>
</div>

@endsection
