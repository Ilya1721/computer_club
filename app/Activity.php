<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $guarded = [];

    public function hall()
    {
      return $this->belongsTo(Hall::class);
    }

    public function activity_type()
    {
      return $this->belongsTo(ActivityType::class);
    }

    public function users()
    {
      return $this->belongsToMany(User::class);
    }
}
