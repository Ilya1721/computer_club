<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $guarded = [];

    public function genres()
    {
      return $this->belongsToMany(Genre::class);
    }
}
