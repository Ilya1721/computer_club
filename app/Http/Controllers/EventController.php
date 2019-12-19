<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Activity;

class EventController extends Controller
{
    public function index()
    {
      $events = Activity::query()
                          ->orderBy('end_date', 'DESC')
                          ->paginate(10);

      return view('events', [
        'events' => $events,
      ]);
    }

    public function show($event)
    {
      return view('event', [
        'event' => $event,
      ]);
    }
}
