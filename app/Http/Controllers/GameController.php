<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Game;

class GameController extends Controller
{
    public function index()
    {
        $games = Game::all();

        foreach ($games as $game) {
            $game->ReleaseDate = $game->ReleaseDate ?: 'N/C';
        }

        return view('games.index', [
            'games' => $games,
        ]);
    }

    public function show($id)
    {
        $game = Game::findOrFail($id);

        return view('games.show', [
            'game' => $game,
        ]);
    }

    public function create()
    {
        $platforms = Game::getPlatforms();
        $developers = Game::getDevelopers();    
        $publishers = Game::getPublishers();
        $genres = Game::getGenres();
        
        return view('games.create', [
            'platforms' => $platforms,
            'developers' => $developers,
            'publishers' => $publishers,
            'genres' => $genres,
        ]);
    }

    public function store()
    {
        $game = new Game;

        $game->Title = request('Title');
        $game->ReleaseDate = request('ReleaseDate');
        $game->idPlatform = request('idPlatform');
        $game->idPublisher = request('idPublisher');
        $game->idDeveloper = request('idDeveloper');
        $game->save();

        $genres = request('genres');

        foreach($genres as $genre) {
            $game->genres()->attach($genre);
        }

        return redirect('/games');
    }

    public function destroy($id) 
    {
        $game = Game::findOrFail($id);
        $game->delete();

        $game->genres()->detach($id);

        return redirect('/games');
    }

    public function edit($id)
    {
        $game = Game::findOrFail($id);

        $platforms = Game::getPlatforms();
        $developers = Game::getDevelopers();    
        $publishers = Game::getPublishers();
        $genres = Game::getGenres();

        return view('games.edit', [
            'game' => $game,
            'platforms' => $platforms,
            'developers' => $developers,
            'publishers' => $publishers,
            'genres' => $genres,
        ]);
    }

    public function get($id)
    {
        $game = Game::findOrFail($id);
        $genres = $game->genres->pluck('name', 'id');

        return $genres;
    }

    public function update($id)
    {
        $game = Game::find($id);

        $game->Title = request('Title');
        $game->ReleaseDate = request('ReleaseDate');
        $game->idPlatform = request('idPlatform');
        $game->idPublisher = request('idPublisher');
        $game->idDeveloper = request('idDeveloper');
        $game->save();

        $genres = request('genres');

        foreach($genres as $genre) {
            $game->genres()->sync($genre);
        }

        return redirect('/games');
    }
}
