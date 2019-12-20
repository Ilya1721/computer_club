<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Club;

class ClubController extends Controller
{
    public function index()
    {
      $clubs = Club::paginate(5);

      return view('clubs', [
        'clubs' => $clubs,
      ]);
    }

    public function create()
    {
      return view('create_club');
    }

    public function store()
    {
      $data = request()->validate([
        'name' => 'required',
        'street' => 'required',
        'house' => 'required',
        'flat' => 'required',
        'phone' => 'required',
        'schedule' => 'required',
      ]);

      if(request('price_list'))
      {
        $imagePath = request('price_list')->store('img', 'public');
        $image = Image::make(public_path("storage/{$imagePath}"));
        $image->save();
        $imageArray = ['price_list' => '/storage/'.$imagePath];
      }

      Club::updateOrCreate(array_merge(
          $data,
          $imageArray ?? [],
      ));

      return redirect('/admin/clubs');
    }

    public function edit(Club $club)
    {
      return view('edit_club', [
        'club' => $club,
      ]);
    }

    public function update(Club $club)
    {
      $data = request()->validate([
        'name' => 'required',
        'street' => 'required',
        'house' => 'required',
        'flat' => 'required',
        'phone' => 'required',
        'schedule' => 'required',
      ]);

      if(request('price_list'))
      {
        $imagePath = request('price_list')->store('img', 'public');
        $image = Image::make(public_path("storage/{$imagePath}"));
        $image->save();
        $imageArray = ['price_list' => '/storage/'.$imagePath];
      }

      $club->update(array_merge(
          $data,
          $imageArray ?? [],
      ));

      return redirect('/admin/clubs');
    }

    public function destroy(Club $club)
    {
      $club->delete();

      return redirect('/admin/clubs');
    }
}
