<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Activity;
use App\ActivityType;
use App\Game;
use App\Hall;

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

    public function create()
    {
      $activity_types = ActivityType::all();
      $games = Game::all();

      return view('create_activity', [
        'activity_types' => $activity_types,
        'games' => $games,
      ]);
    }

    public function edit(Activity $activity)
    {
      $activity_types = ActivityType::all();
      $games = Game::all();
      $halls = Hall::all();

      return view('edit_activity', [
        'activity' => $activity,
        'activity_types' => $activity_types,
        'games' => $games,
      ]);
    }

    public function store()
    {
      $data = request()->validate([
        'activity_type_id' => 'required',
        'hall_id' => 'required,'
        'game_id' => 'required',
        'description' => 'required',
        'price' => 'required',
        'start_date' => 'required',
        'end_date' => 'required',
      ]);

      $data['start_date'] = date('Y-m-d H:i:s', strtotime($data['start_date']));
      $data['end_date'] = date('Y-m-d H:i:s', strtotime($data['end_date']));

      Activity::updateOrCreate($data);

      return redirect('/admin/activities');
    }

    public function update(Activity $activity)
    {
      $data = request()->validate([
        'activity_type_id' => 'required',
        'hall_id' => 'required',
        'game_id' => 'required',
        'description' => 'required',
        'price' => 'required',
        'start_date' => 'required',
        'end_date' => 'required',
      ]);

      $data['start_date'] = date('Y-m-d H:i:s', strtotime($data['start_date']));
      $data['end_date'] = date('Y-m-d H:i:s', strtotime($data['end_date']));

      $activity->update($data);

      return redirect('/admin/activities');
    }
}
