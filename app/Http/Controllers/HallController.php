<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hall;

class HallController extends Controller
{
    public function index()
    {
      $halls = Hall::paginate(5);

      return view('halls', [
        'halls' => $halls,
      ]);
    }
}
