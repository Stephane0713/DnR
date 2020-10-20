@extends('layouts.layout')

@section('content')
<h1 class="title">Nouveau Jeu</h1>

<form action="{{ route('games.index') }}" method="post">
    @csrf
    @method('PUT')
    <input type="hidden" name="Title" value="test1">
    <input type="hidden" name="ReleaseDate" value="test1">
    <input type="hidden" name="idPlatform" value="2">
    <input type="hidden" name="idPublisher" value="2">
    <input type="hidden" name="idDeveloper" value="2">
    <input type="hidden" name="genres[]" value="10">
    <input type="hidden" name="genres[]" value="30">
    <input type="hidden" name="genres[]" value="40">

    <button class="btn btn-primary" type="submit">Send</button>
</form>
@endsection