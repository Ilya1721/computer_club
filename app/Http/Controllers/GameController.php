<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Game;
use App\Genre;
use App\Platform;

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

      $games = Game::query()
                   ->where($data['category'], 'LIKE',
                     '%'.$data['search'].'%')
                   ->paginate(10);

      $genres = Genre::all();

      return view('games', [
        'games' => $games,
        'genres' => $genres,
      ]);
    }

    public function create()
    {
      $genres = Genre::all();
      $platforms = Platform::all();

      return view('create_game', [
        'genres' => $genres,
        'platforms' => $platforms,
      ]);
    }

    public function edit(Game $game)
    {
      $genres = Genre::all();
      $platforms = Platform::all();

      return view('edit_game', [
        'game' => $game,
        'genres' => $genres,
        'platforms' => $platforms,
      ]);
    }

    public function update(Game $game)
    {
      $data = request()->validate([
        'name' => 'required',
        'genre_id' => 'required',
        'platform_id' => 'required',
        'image' => '',
      ]);

      if(request('image'))
      {
        $imagePath = request('image')->store('img', 'public');
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(150, 150);
        $image->save();
        $imageArray = ['image' => '/storage/'.$imagePath];
      }

      $game->update(array_merge(
          $data,
          $imageArray ?? [],
      ));

      return redirect('/admin/games');
    }
}
