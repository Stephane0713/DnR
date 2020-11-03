@extends('layouts.app')

@section('content')

<div class="container">
    <h1 class="title">Nouveau Jeu</h1>

    <div class="row">
        <div class="col-12">
            <div id="app">
                <game-form :all-genres="{{$genres}}" :developers="{{$developers}}" :publishers="{{$publishers}}" :platforms="{{$platforms}}" />
            </div>
        </div>
    </div>
</div>

@endsection
