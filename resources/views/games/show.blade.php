@extends('layouts.app')

@section('content')
<div class="container">
    <a class="btn btn-outline-primary mb-5" href="{{route('games.index')}}">Retour vers nos jeux</a>
    <div class="row">
        <div class="col-12">
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $game->Title }}</h5>
                    <p class="card-text">{{ $game->ReleaseDate }}</p>
                    <p class="card-badges">
                        @foreach($game->genres as $genre)
                        <span class="badge badge-primary p-2 mb-2 mr-2">{{ $genre->name }}</span>
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
                    @auth
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <a href="{{ route('games.edit', $game->id) }}" class="btn btn-primary d-block mb-3">Modifier</a>
                        </div>

                        <!-- Button trigger modal -->
                        <div class="col-12 col-md-6">
                            <button type="button" class="btn btn-outline-danger mb-3 w-100" data-toggle="modal" data-target="#delete">
                                Supprimer
                            </button>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="delete" tabindex="-1" aria-labelledby="delete" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="delete">Modal title</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Voulez-vous vraiment supprimer {{$game->Title}} ?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>

                                    <form action="{{ route('games.destroy', $game->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-outline-danger">Confirmer la suppression</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
