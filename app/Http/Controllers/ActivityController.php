<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
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

      $activity_types = ActivityType::all();

      return view('activities', [
        'activities' => $activities,
        'activity_types' => $activity_types,
      ]);
    }

    public function filter()
    {
      $data = request()->validate([
        'category' => '',
      ]);

      if($data['category'] != 'all')
      {
        $activities = Activity::query()
                          ->join('activity_types', 'activity_types.id', '=',
                                 'activities.activity_type_id')
                          ->where('activities.activity_type_id', '=',
                                  $data['category'])
                          ->whereNotNull('game_id')
                          ->whereNotNull('end_date')
                          ->orderBy('end_date', 'DESC')
                          ->paginate(10);
      }
      else
      {
        $activities = Activity::query()
                            ->whereNotNull('game_id')
                            ->whereNotNull('end_date')
                            ->orderBy('end_date', 'DESC')
                            ->paginate(10);
      }

      $activity_types = ActivityType::all();

      return view('activities', [
        'activities' => $activities,
        'activity_types' => $activity_types,
      ]);
    }

    public function search()
    {
      $data = request()->validate([
        'category' => '',
        'search' => '',
      ]);

      $activities = Activity::query()
                          ->join('games', 'games.id',
                                 'activities.game_id')
                          ->whereNotNull('activities.game_id')
                          ->whereNotNull('activities.end_date')
                          ->where($data['category'], 'LIKE',
                             '%'.$data['search'].'%')
                          ->orderBy('activities.end_date', 'DESC')
                          ->paginate(10);

      $activity_types = ActivityType::all();

      return view('activities', [
        'activities' => $activities,
        'activity_types' => $activity_types,
      ]);
    }

    public function show($activity)
    {
      $activity = Activity::find($activity);
      $user = Auth::user();

      if($user)
      {
        $is_registered = DB::table('user_activity')
                             ->where('activity_id', '=', $activity->id)
                             ->where('user_id', '=', $user->id)
                             ->select('user_id')
                             ->get();

        return view('activity', [
          'activity' => $activity,
          'is_registered' => $is_registered,
        ]);
      }
      else
      {
        return view('activity', [
          'activity' => $activity,
          'is_registered' => null,
        ]);
      }
    }

    public function users($activity)
    {
      $activity = Activity::find($activity);
      $user = Auth::user();

      $users = Activity::query()
                  ->join('user_activity', 'activities.id',
                         'user_activity.activity_id')
                  ->join('users', 'users.id', 'user_activity.user_id')
                  ->join('activity_roles', 'activity_roles.id',
                         'user_activity.activity_role_id')
                  ->where('user_activity.activity_id', '=',
                          $activity->id)
                  ->orderBy('user_activity.start_date', 'DESC')
                  ->paginate(10);

      return view('activity_users', [
        'activity' => $activity,
        'users' => $users,
      ]);
    }

    public function create()
    {
      $activity_types = ActivityType::all();
      $games = Game::all();
      $halls = Hall::all();

      return view('create_activity', [
        'activity_types' => $activity_types,
        'games' => $games,
        'halls' => $halls,
      ]);
    }

    public function store()
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

      Activity::updateOrCreate($data);

      return redirect('/admin/activities');
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
        'halls' => $halls,
      ]);
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

    public function destroy(Activity $activity)
    {
      $activity->delete();

      return redirect('/admin/activities');
    }
}
