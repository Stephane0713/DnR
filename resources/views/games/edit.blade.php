@extends('layouts.app')

@section('content')

<div class="container">
    <a class="btn btn-outline-primary mb-5" href="{{route('games.index')}}">Retour vers nos jeux</a>
    <h1 class="title">Modifier Jeu</h1>

    <div class="row">
        <div class="col-12">
            <form id="app" action="{{ route('games.update', $game->id) }}" method="POST">
                @csrf
                @method('PUT')
                <game-form :edit="true" :all-genres="{{$genres}}" :game="{{$game}}" :game-genres="{{$game->genres}}" :developers="{{$developers}}" :publishers="{{$publishers}}" :platforms="{{$platforms}}" />
            </form>
        </div>
    </div>
</div>

@endsection
