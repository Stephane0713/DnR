@extends('layouts.app')

@section('content')

<div class="container">
    <a class="btn btn-outline-primary mb-5" href="{{route('games.index')}}">Retour vers nos jeux</a>
    <h1 class="title">Nouveau Jeu</h1>

    <div class="row">
        <div class="col-12">
            <form id="app" action="{{ route('games.store') }}" method="POST">
                @csrf
                <game-form :edit="false" :all-genres="{{$genres}}" :developers="{{$developers}}" :publishers="{{$publishers}}" :platforms="{{$platforms}}" />
            </form>
        </div>
    </div>
</div>

@endsection
