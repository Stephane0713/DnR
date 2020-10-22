@extends('layouts.layout')

@section('content')
<h1 class="title">Modifier les données</h1>

<form action="{{ route('games.update', $game->id) }}" method="POST">
    @csrf
    @method('PUT')
    <input type="hidden" name="Title" value="test">
    <input type="hidden" name="ReleaseDate" value="test">
    <input type="hidden" name="idPlatform" value="2">
    <input type="hidden" name="idPublisher" value="2">
    <input type="hidden" name="idDeveloper" value="2">
    <input type="hidden" name="genres[]" value="2">

    <button class="btn btn-primary" type="submit">Send</button>
</form>
@endsection