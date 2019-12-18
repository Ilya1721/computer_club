<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $guarded = [];

    public function games()
    {
      return $this->belongsToMany(Game::class);
    }
}
