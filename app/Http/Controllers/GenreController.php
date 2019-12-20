<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Genre;

class GenreController extends Controller
{
    public function index()
    {
      $genres = Genre::paginate(5);

      return view('genres', [
        'genres' => $genres,
      ]);
    }

    public function create()
    {
      return view('create_genre');
    }

    public function store()
    {
      $data = request()->validate([
        'name' => 'required',
      ]);

      Genre::updateOrCreate($data);

      return redirect('/admin/genres');
    }

    public function edit(Genre $genre)
    {
      return view('edit_genre', [
        'genre' => $genre,
      ]);
    }

    public function update(Genre $genre)
    {
      $data = request()->validate([
        'name' => 'required',
      ]);

      $genre->update($data);

      return redirect('/admin/genres');
    }
}
