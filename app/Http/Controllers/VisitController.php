<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VisitController extends Controller
{
    public function create()
    {
      return view('create_visit');
    }
}
