@extends('layouts.layout')

@section('content')

<div class="container">
    <h1 class="title">Nouveau Jeu</h1>

    <div class="row">
        <div class="col-12">
            {!! Form::open(['route' => 'games.index', 'method' => 'post']) !!}
            {{Form::token()}}
            <div class="form-group">
                {{Form::label('Title', 'Titre')}}
                {{Form::text('Title', '', ['class' => 'form-control'])}}
            </div>
            <div class="form-group">
                {{Form::label('idPlatform', 'Plateforme')}}
                {{Form::select('idPlatform', $platforms, null, ['class' => 'form-control'])}}
            </div>
            <div class="form-group">
                {{Form::label('ReleaseDate', 'Date de sortie')}}
                {{Form::text('ReleaseDate', \Carbon\Carbon::now(), ['class' => 'form-control'])}}
            </div>
            <div class="form-group">
                {{Form::label('idDeveloper', 'Developpeur')}}
                {{Form::select('idDeveloper', $developers, null, ['class' => 'form-control'])}}
            </div>
            <div class="form-group">
                {{Form::label('idPublisher', 'Éditeur')}}
                {{Form::select('idPublisher', $publishers, null, ['class' => 'form-control'])}}
            </div>
            <div class="form-group">
                {{Form::label('stock', 'En stock')}}
                {{Form::text('stock', 1, ['class' => 'form-control'])}}
            </div>
            <div class="form-group">
                {{Form::label('genres[]', 'Genres')}}
                {{Form::select('genres[]', $genres, null, ['class' => 'form-control'])}}
            </div>
            {{Form::submit('Click Me!', ['class' => 'btn btn-primary'])}}
            {!! Form::close() !!}
        </div>
    </div>
</div>

@endsection