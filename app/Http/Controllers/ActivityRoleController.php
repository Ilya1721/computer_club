<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ActivityRole;

class ActivityRoleController extends Controller
{
    public function index()
    {
      $activity_roles = ActivityRole::paginate(5);

      return view('activity_roles', [
        'activity_roles' => $activity_roles,
      ]);
    }

    public function edit(ActivityRole $activity_role)
    {
      return view('edit_activity_role', [
        'activity_role' => $activity_role,
      ]);
    }
}
