<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Platform extends Model
{
    protected $table = 'platform';

    public function constructor()
    {
        return $this->hasOne('App\Constructor', 'id', 'idConstructor');
    }
}
