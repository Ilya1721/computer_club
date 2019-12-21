<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Activity;

class ActivityController extends Controller
{
    public function index()
    {
      $activities = Activity::query()
                          ->whereNotNull('game_id')
                          ->whereNotNull('end_date')
                          ->orderBy('end_date', 'DESC')
                          ->paginate(10);

      return view('activities', [
        'activities' => $activities,
      ]);
    }

    public function show($activity)
    {
      return view('activity', [
        'activity' => $activity,
      ]);
    }
}
