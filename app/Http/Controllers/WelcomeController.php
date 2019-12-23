<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Game;
use App\Platform;
use App\Club;
use App\Activity;

class WelcomeController extends Controller
{
    public function index()
    {
      $games = Game::all()->take(10);
      $platforms = Platform::all();

      $annonces = Activity::query()
                        ->whereNotNull('game_id')
                        ->whereNotNull('end_date')
                        ->where('end_date', '>', date('Y-m-d H:i:s'))
                        ->get();

      $news = Activity::query()
                        ->whereNotNull('game_id')
                        ->whereNotNull('end_date')
                        ->where('end_date', '<', date('Y-m-d H:i:s'))
                        ->get();

      return view('welcome', [
        'games' => $games,
        'platforms' => $platforms,
        'annonces' => $annonces,
        'news' => $news,
      ]);
    }
}
