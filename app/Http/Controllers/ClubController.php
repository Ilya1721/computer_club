<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Club;

class ClubController extends Controller
{
    public function index()
    {
      $clubs = Club::paginate(5);

      return view('clubs', [
        'clubs' => $clubs,
      ]);
    }

    public function edit(Club $club)
    {
      return view('edit_club', [
        'club' => $club,
      ]);
    }
}
