<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Game;

class GameController extends Controller
{
    public function index()
    {
      $games = Game::paginate(5);

      return view('games', [
        'games' => $games,
      ]);
    }
}
