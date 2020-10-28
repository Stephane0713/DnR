@extends('layouts.layout')

@section('content')

<div class="container">
    <h1 class="title">Modifier Jeu</h1>

    <div class="row">
        <div class="col-12">
            <div id="app">
                <game-form :developers="{{$developers}}" :publishers="{{$publishers}}" :platforms="{{$platforms}}" :genres="{{$genres}}" :game_data="{{$game}}" :game_genres="{{$game->genres}}">
                </game-form>
            </div>
        </div>
    </div>
</div>

@endsection