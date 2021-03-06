<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hall;
use App\Club;

class HallController extends Controller
{
    public function index()
    {
      $halls = Hall::paginate(5);

      return view('halls', [
        'halls' => $halls,
      ]);
    }

    public function create()
    {
      $clubs = Club::all();

      return view('create_hall', [
        'clubs' => $clubs,
      ]);
    }

    public function store()
    {
      $data = request()->validate([
        'name' => 'required',
        'club_id' => '',
      ]);

      Hall::updateOrCreate($data);

      return redirect('/admin/halls');
    }

    public function edit(Hall $hall)
    {
      $clubs = Club::all();

      return view('edit_hall', [
        'hall' => $hall,
        'clubs' => $clubs,
      ]);
    }

    public function update(Hall $hall)
    {
      $data = request()->validate([
        'name' => 'required',
        'club_id' => 'required',
      ]);

      $hall->update($data);

      return redirect('/admin/halls');
    }

    public function destroy(Hall $hall)
    {
      $hall->delete();

      return redirect('/admin/halls');
    }
}
