<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Activity;
use App\ActivityType;
use App\Game;

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

    public function edit(Activity $activity)
    {
      $activity_types = ActivityType::all();
      $games = Game::all();

      return view('edit_activity', [
        'activity' => $activity,
        'activity_types' => $activity_types,
        'games' => $games,
      ]);
    }
}
