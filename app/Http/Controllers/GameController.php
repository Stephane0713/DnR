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
        $game = Game::find($id);

        return view('games.show', [
            'game' => $game,
        ]);
    }

    public function create()
    {
        return view('games.create');
    }
}
