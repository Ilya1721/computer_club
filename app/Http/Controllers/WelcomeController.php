<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Game;

class WelcomeController extends Controller
{
    public function index()
    {
      $games = Game::all()->take(10);

      return view('welcome', [
        'games' => $games,
      ]);
    }
}
