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

    public function edit(Hall $hall)
    {
      $clubs = Club::all();

      return view('edit_hall', [
        'hall' => $hall,
        'clubs' => $clubs,
      ]);
    }
}
