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

    public function create()
    {
      return view('create_activity_role');
    }

    public function store()
    {
      $data = request()->validate([
        'name' => 'required',
      ]);

      ActivityRole::updateOrCreate($data);

      return redirect('/admin/activity-roles');
    }

    public function edit(ActivityRole $activity_role)
    {
      return view('edit_activity_role', [
        'activity_role' => $activity_role,
      ]);
    }

    public function update(ActivityRole $activity_role)
    {
      $data = request()->validate([
        'name' => 'required',
      ]);

      $activity_role->update($data);

      return redirect('/admin/activity-roles');
    }
}
