@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">

        @foreach($games as $game)
        <div class="col-12 col-md-6 col-lg-4">
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $game->Title }}</h5>
                    <p class="card-text">{{ $game->ReleaseDate }}</p>
                    <p class="card-badges">
                        @foreach($game->genres as $genre)
                        <span class="badge badge-primary">{{ $genre->name }}</span>
                        @endforeach
                    </p>
                    <a href="{{ route('games.show', $game->id) }}" class="btn btn-primary d-block">Afficher</a>
                </div>
            </div>
        </div>
        @endforeach

    </div>
    <div class="d-flex justify-content-center">
        {{ $games->appends(['sort' => 'id'])->render() }}
    </div>

</div>

@endsection
