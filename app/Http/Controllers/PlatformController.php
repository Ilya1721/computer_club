<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Platform;

class PlatformController extends Controller
{
    public function index()
    {
      $platforms = Platform::paginate(5);

      return view('platforms', [
        'platforms' => $platforms,
      ]);
    }
}
