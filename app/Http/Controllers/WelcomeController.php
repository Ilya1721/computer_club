<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Game;
use App\Platform;
use App\Club;

class WelcomeController extends Controller
{
    public function index()
    {
      $games = Game::all()->take(10);
      $platforms = Platform::all();
      $club = Club::first();

      return view('welcome', [
        'games' => $games,
        'platforms' => $platforms,
        'club' => $club,
      ]);
    }
}
