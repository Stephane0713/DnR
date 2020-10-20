@extends('layouts.layout')

@section('content')
<h1 class="title">Nouveau Jeu</h1>

<form action="{{ route('games.index') }}" method="post">
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
</form>
@endsection