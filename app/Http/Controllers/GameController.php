<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Game;
use App\Genre;

class GameController extends Controller
{
    public function index()
    {
      $games = Game::paginate(5);
      $genres = Genre::all();

      return view('games', [
        'games' => $games,
        'genres' => $genres,
      ]);
    }
}
