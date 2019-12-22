<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Activity;
use App\ActivityType;
use App\ActivityRole;
use App\Hall;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      $user = Auth::user();
      $visits = Activity::query()
                        ->join('user_activity', 'activities.id',
                               'user_activity.activity_id')
                        ->join('activity_roles', 'activity_roles.id',
                               'user_activity.activity_role_id')
                        ->join('activity_types', 'activity_types.id',
                               'activities.activity_type_id')
                        ->where('user_id', '=', $user->id)
                        ->where('activity_types.name', '=', 'Візит')
                        ->orderBy('activities.end_date', 'DESC')
                        ->paginate(10);

       return view('home', [
         'visits' => $visits,
       ]);
    }

    public function filter()
    {
      $data = request()->validate([
        'category' => '',
      ]);

      $user = Auth::user();

      if($data['category'] != 'all')
      {
        $user_activities = Activity::query()
                          ->join('activity_types', 'activity_types.id', '=',
                                 'activities.activity_type_id')
                          ->join('user_activity', 'activities.id',
                                'user_activity.activity_id')
                          ->join('activity_roles', 'activity_roles.id',
                                'user_activity.activity_role_id')
                          ->whereNotNull('activities.game_id')
                          ->whereNotNull('activities.end_date')
                          ->where('user_id', '=', $user->id)
                          ->where('activities.activity_type_id', '=',
                                  $data['category'])
                          ->orderBy('activities.end_date', 'DESC')
                          ->paginate(10);

        $activity_info = Activity::query()
                                 ->join('user_activity', 'activities.id',
                                       'user_activity.activity_id')
                                 ->join('activity_types', 'activity_types.id', '=',
                                        'activities.activity_type_id')
                                 ->whereNotNull('activities.game_id')
                                 ->whereNotNull('activities.end_date')
                                 ->where('user_id', '=', $user->id)
                                 ->where('activities.activity_type_id', '=',
                                         $data['category'])
                                 ->orderBy('activities.end_date', 'DESC')
                                 ->paginate(10);
      }
      else
      {
        $user_activities = Activity::query()
                            ->join('user_activity', 'activities.id',
                                   'user_activity.activity_id')
                            ->join('activity_roles', 'activity_roles.id',
                                   'user_activity.activity_role_id')
                            ->whereNotNull('activities.game_id')
                            ->whereNotNull('activities.end_date')
                            ->orderBy('activities.end_date', 'DESC')
                            ->paginate(10);

        $activity_info = Activity::query()
                            ->join('user_activity', 'activities.id',
                                 'user_activity.activity_id')
                            ->whereNotNull('activities.game_id')
                            ->whereNotNull('activities.end_date')
                            ->where('user_id', '=', $user->id)
                            ->orderBy('activities.end_date', 'DESC')
                            ->paginate(10);
      }

      $activity_types = ActivityType::all();

      return view('user_activities', [
        'user_activities' => $user_activities,
        'activity_info' => $activity_info,
        'activity_types' => $activity_types,
      ]);
    }

    public function search()
    {
      $data = request()->validate([
        'category' => '',
        'search' => '',
      ]);

      $user = Auth::user();

      $user_activities = Activity::query()
                          ->join('user_activity', 'activities.id',
                                 'user_activity.activity_id')
                          ->join('activity_roles', 'activity_roles.id',
                                 'user_activity.activity_role_id')
                          ->join('games', 'games.id',
                                 'activities.game_id')
                          ->whereNotNull('activities.game_id')
                          ->whereNotNull('activities.end_date')
                          ->where($data['category'], 'LIKE',
                             '%'.$data['search'].'%')
                          ->orderBy('activities.end_date', 'DESC')
                          ->paginate(10);

      $activity_info = Activity::query()
                          ->join('user_activity', 'activities.id',
                               'user_activity.activity_id')
                          ->join('games', 'games.id',
                                 'activities.game_id')
                          ->whereNotNull('activities.game_id')
                          ->whereNotNull('activities.end_date')
                          ->where('user_id', '=', $user->id)
                          ->where($data['category'], 'LIKE',
                             '%'.$data['search'].'%')
                          ->orderBy('activities.end_date', 'DESC')
                          ->paginate(10);

      $activity_types = ActivityType::all();

      return view('user_activities', [
        'user_activities' => $user_activities,
        'activity_info' => $activity_info,
        'activity_types' => $activity_types,
      ]);
    }

    public function activity()
    {
      $user = Auth::user();
      $user_activities = Activity::query()
                               ->join('user_activity', 'activities.id',
                                      'user_activity.activity_id')
                               ->join('activity_roles', 'activity_roles.id',
                                      'user_activity.activity_role_id')
                               ->whereNotNull('activities.game_id')
                               ->whereNotNull('activities.end_date')
                               ->where('user_id', '=', $user->id)
                               ->orderBy('activities.end_date', 'DESC')
                               ->paginate(10);

      $activity_info = Activity::query()
                               ->join('user_activity', 'activities.id',
                                     'user_activity.activity_id')
                               ->whereNotNull('activities.game_id')
                               ->whereNotNull('activities.end_date')
                               ->where('user_id', '=', $user->id)
                               ->orderBy('activities.end_date', 'DESC')
                               ->paginate(10);

      $activity_types = ActivityType::all();

      return view('user_activities', [
        'user_activities' => $user_activities,
        'activity_info' => $activity_info,
        'activity_types' => $activity_types,
      ]);
    }

    public function register_visit_form()
    {
      $halls = Hall::all();
      $activity = Activity::query()
                            ->join('activity_types', 'activity_types.id',
                                   'activities.activity_type_id')
                            ->where('activity_types.name', '=', 'Візит')
                            ->first();

      return view('visit_register', [
        'halls' => $halls,
        'activity' => $activity,
      ]);
    }

    public function register_visit()
    {
      $data = request()->validate([
        'hall_id' => 'required',
        'place' => 'required',
        'start_date' => 'required',
        'end_date' => 'required',
      ]);
      $data['user_id'] = Auth::user()->id;
      $data['activity_role_id'] = ActivityRole::query()
                                  ->where('activity_roles.name', '=', 'Гравець')
                                  ->first()->id;
      $data['activity_id'] = Activity::query()
                             ->where('hall_id', '=', $data['hall_id'])
                             ->first()->id;

      DB::table('user_activity')->insert([
        'activity_id' => $data['activity_id'],
        'user_id' => $data['user_id'],
        'activity_role_id' => $data['activity_role_id'],
        'place' => $data['place'],
        'start_date' => $data['start_date'],
        'end_date' => $data['end_date'],
      ]);

      return redirect('/home');
    }

    public function register_form($activity)
    {
      $activity = Activity::find($activity);
      $activity_roles = ActivityRole::all();

      return view('activity_register', [
        'activity' => $activity,
        'activity_roles' => $activity_roles,
      ]);
    }

    public function register($activity)
    {
      $activity = Activity::find($activity);

      $data = request()->validate([
        'activity_role_id' => 'required',
        'place' => 'required',
      ]);

      DB::table('user_activity')
          ->insert([
            'activity_id' => $activity->id,
            'user_id' => Auth::user()->id,
            'activity_role_id' => $data['activity_role_id'],
            'place' => $data['place'],
            'start_date' => $activity->start_date,
            'end_date' => $activity->end_date,
          ]);

      return redirect('/user/activity');
    }

    public function unregister($activity)
    {
      $activity = Activity::find($activity);
      $user = Auth::user();

      DB::table('user_activity')
          ->where('activity_id', '=', $activity->id)
          ->where('user_id', '=', $user->id)
          ->delete();

      return redirect('/user/activity');
    }
}
