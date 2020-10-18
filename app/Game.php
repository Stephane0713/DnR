<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $table = 'videogames';

    public function genres()
    {
        return $this->belongsToMany('App\Genre', 'gamesgenres', 'idVideoGame', 'idGenre');
    }
}
