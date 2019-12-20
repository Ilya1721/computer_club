<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ActivityType;

class ActivityTypeController extends Controller
{
    public function index()
    {
      $activity_types = ActivityType::paginate(5);

      return view('activity_types', [
        'activity_types' => $activity_types,
      ]);
    }

    public function edit(ActivityType $activity_type)
    {
      return view('edit_activity_type', [
        'activity_type' => $activity_type,
      ]);
    }

    public function update(ActivityType $activity_type)
    {
      $data = request()->validate([
        'name' => 'required',
      ]);

      $activity_type->update($data);

      return redirect('/admin/activity-types');
    }
}
