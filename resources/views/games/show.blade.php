@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $game->Title }}</h5>
                    <p class="card-text">{{ $game->ReleaseDate }}</p>
                    <p class="card-badges">
                        @foreach($game->genres as $genre)
                        <span class="badge badge-primary">{{ $genre->name }}</span>
                        @endforeach
                    </p>
                    <p class="card-badges">
                        <span class="badge badge-primary">{{ $game->developer->name }}</span>
                    </p>
                    <p class="card-badges">
                        <span class="badge badge-primary">{{ $game->publisher->name }}</span>
                    </p>
                    <p class="card-badges">
                        <span class="badge badge-primary">{{ $game->platform->name }}</span>
                        <span class="badge badge-primary">{{ $game->platform->constructor->name }}</span>
                    </p>
                    <a href="{{ route('games.edit', $game->id) }}" class="btn btn-primary d-block">Modifier</a>
                    <form action="{{ route('games.destroy', $game->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-outline-danger">Supprimer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection