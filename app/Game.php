<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Game extends Model
{
    protected $table = 'videogames';
    public $timestamps = false;

    public function genres()
    {
        return $this->belongsToMany('App\Genre', 'gamesgenres', 'idVideoGame', 'idGenre');
    }

    public function developer()
    {
        return $this->hasOne('App\Developer', 'id', 'idDeveloper');
    }

    public function publisher()
    {
        return $this->hasOne('App\Publisher', 'id', 'idPublisher');
    }

    public function platform()
    {
        return $this->hasOne('App\Platform', 'id', 'idPlatform');
    }

    protected static function getPlatforms()
    {
        $platforms = DB::table('platform')
        ->select('id', 'name')
        ->get()->pluck('name', 'id');

        return $platforms;
    }

    protected static function getDevelopers()
    {
        $developers = DB::table('developers')
        ->select('id', 'name')
        ->get()->pluck('name', 'id');

        return $developers;
    }
    
    protected static function getPublishers()
    {
        $publishers = DB::table('publishers')
        ->select('id', 'name')
        ->get()->pluck('name', 'id');

        return $publishers;
    }

    protected static function getGenres()
    {
        $genres = DB::table('genres')
        ->select('id', 'name')
        ->get()->pluck('name', 'id');

        return $genres;
    }
}
