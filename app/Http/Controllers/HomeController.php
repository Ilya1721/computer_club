<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Activity;

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
        return view('home');
    }

    public function event()
    {
      $user = Auth::user();
      $user_events = Activity::query()
                               ->join('user_activity', 'activities.id',
                                      'user_activity.activity_id')
                               ->join('activity_roles', 'activity_roles.id',
                                      'user_activity.activity_role_id')
                               ->where('user_id', '=', $user->id)
                               ->orderBy('activities.end_date', 'DESC')
                               ->paginate(10);

      $activity_info = Activity::query()
                               ->join('user_activity', 'activities.id',
                                     'user_activity.activity_id')
                               ->where('user_id', '=', $user->id)
                               ->orderBy('activities.end_date', 'DESC')
                               ->select('activities.*')
                               ->paginate(10);

      return view('user_events', [
        'user_events' => $user_events,
        'activity_info' => $activity_info,
      ]);
    }
}
