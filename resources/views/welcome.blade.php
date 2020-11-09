@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 d-flex mb-5">
            <div class="m-auto">
                <h1 class="title">Die<small>and</small><br>Retry</h1>
            </div>
        </div>
        <div class="col-12 d-flex mb-5">
            <p class="m-auto">L'assos' des gamerz de la côte d'azur</p>
        </div>
        <div class="col-12 col-md-6">
            <a href="{{route('games.index')}}" class="btn btn-primary d-block mb-3">Nos jeux</a>
        </div>
        <div class="col-12 col-md-6">
            <a href="#" class="btn btn-outline-primary d-block mb-3">Qui somme nous ?</a>
        </div>
    </div>
</div>
@endsection
