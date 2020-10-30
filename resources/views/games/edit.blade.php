@extends('layouts.layout')

@section('content')

<div class="container">
    <h1 class="title">Modifier Jeu</h1>

    <div class="row">
        <div class="col-12">
            <div id="app">
                <game-form :all-genres="{{$genres}}" :game-genres="{{$game->genres}}" />
            </div>
        </div>
    </div>
</div>

@endsection
