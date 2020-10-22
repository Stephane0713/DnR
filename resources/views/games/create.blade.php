@extends('layouts.layout')

@section('content')

<div class="container">
    <h1 class="title">Nouveau Jeu</h1>

    <div class="row">
        <div class="col-12">
            <!-- <form action="{{ route('games.index') }}" method="post">
                @csrf
                <input type="hidden" name="Title" value="test">
                <input type="hidden" name="ReleaseDate" value="test">
                <input type="hidden" name="idPlatform" value="1">
                <input type="hidden" name="idPublisher" value="1">
                <input type="hidden" name="idDeveloper" value="1">
                <input type="hidden" name="genres[]" value="1">
                <input type="hidden" name="genres[]" value="3">
                <input type="hidden" name="genres[]" value="4">

                <button class="btn btn-primary" type="submit">Send</button>
            </form> -->

            {!! Form::open(['route' => 'games.index', 'method' => 'post']) !!}
            <div class="form-group">
                {{Form::label('title', 'Title')}}
                {{Form::text('title', '', ['class' => 'form-control'])}}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

@endsection