<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $guarded = [];

    public function genre()
    {
      return $this->belongsTo(Genre::class);
    }

    public function platform()
    {
      return $this->belongsTo(Platform::class);
    }
}
