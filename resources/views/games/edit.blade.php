@extends('layouts.app')

@section('content')

<div class="container">
    <h1 class="title">Modifier Jeu</h1>

    <div class="row">
        <div class="col-12">
            <div id="app">
                <game-form :edit="true" :all-genres="{{$genres}}" :game="{{$game}}" :game-genres="{{$game->genres}}" :developers="{{$developers}}" :publishers="{{$publishers}}" :platforms="{{$platforms}}" />
            </div>
        </div>
    </div>
</div>

@endsection
