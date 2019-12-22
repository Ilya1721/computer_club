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

    public function filter()
    {
      $data = request()->validate([
        'category' => '',
      ]);

      if($data['category'] != 'all')
      {
        $games = Game::query()
                     ->join('game_genre', 'game_genre.game_id',
                           'games.id')
                     ->join('genres', 'genres.id', 'game_genre.genre_id')
                     ->where('genres.id', '=', $data['category'])
                     ->select('games.*')
                     ->paginate(10);
      }
      else
      {
        $games = Game::paginate(10);
      }

      $genres = Genre::all();

      return view('games', [
        'games' => $games,
        'genres' => $genres,
      ]);
    }

    public function search()
    {
      $data = request()->validate([
        'category' => '',
        'search' => '',
      ]);

      $activities = Activity::query()
                          ->join('games', 'games.id',
                                 'activities.game_id')
                          ->whereNotNull('activities.game_id')
                          ->whereNotNull('activities.end_date')
                          ->where($data['category'], 'LIKE',
                             '%'.$data['search'].'%')
                          ->orderBy('activities.end_date', 'DESC')
                          ->paginate(10);

      $activity_types = ActivityType::all();

      return view('activities', [
        'activities' => $activities,
        'activity_types' => $activity_types,
      ]);
    }
}
