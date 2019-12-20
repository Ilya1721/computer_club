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
}
