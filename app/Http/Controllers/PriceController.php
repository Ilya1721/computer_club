<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Club;

class PriceController extends Controller
{
    public function index()
    {
      $club = Club::first();

      return view('prices', [
        'club' => $club,
      ]);
    }
}
