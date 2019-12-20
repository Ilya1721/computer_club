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

    public function edit(Genre $genre)
    {
      return view('edit_genre', [
        'genre' => $genre,
      ]);
    }
}
