@extends('layouts.layout')

@section('content')

<div class="container">
    <h1 class="title">Modifier Jeu</h1>

    <div class="row">
        <div class="col-12">
            {!! Form::open(['route' => 'games.index', 'method' => 'post']) !!}
            {{Form::token()}}
            <div class="form-group">
                {{Form::label('Title', 'Titre')}}
                {{Form::text('Title', $game->Title, ['class' => 'form-control'])}}
            </div>
            <div class="form-group">
                {{Form::label('idPlatform', 'Plateforme')}}
                {{Form::select('idPlatform', $platforms, $game->platform->id, ['class' => 'form-control'])}}
            </div>
            <div class="form-group">
                {{Form::label('ReleaseDate', 'Date de sortie')}}
                {{Form::text('ReleaseDate', $game->ReleaseDate, ['class' => 'form-control'])}}
            </div>
            <div class="form-group">
                {{Form::label('idDeveloper', 'Developpeur')}}
                {{Form::select('idDeveloper', $developers, $game->developer->id, ['class' => 'form-control'])}}
            </div>
            <div class="form-group">
                {{Form::label('idPublisher', 'Éditeur')}}
                {{Form::select('idPublisher', $publishers, $game->publisher->id, ['class' => 'form-control'])}}
            </div>
            <div class="form-group">
                {{Form::label('stock', 'En stock')}}
                {{Form::text('stock', 1, ['class' => 'form-control'])}}
            </div>

            <div id="app">
                <genres-manager id="{{$game->id}}" :genres="{{$game->genres}}"></genres-manager>
            </div>

            {{Form::submit('Click Me!', ['class' => 'btn btn-primary'])}}
            {!! Form::close() !!}
        </div>
    </div>
</div>

@endsection