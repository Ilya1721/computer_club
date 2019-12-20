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

    public function show(Club $club)
    {
      return view('club', [
        'club' => $club,
      ]);
    }

    public function edit_schedule($club)
    {
      $club = Club::find($club);

      return view('edit_schedule', [
        'club' => $club,
      ]);
    }

    public function update_schedule($club)
    {
      $data = request()->validate([
        'schedule' => 'required',
      ]);

      $club = Club::find($club);

      $club->update($data);

      return redirect('/schedule');
    }

    public function edit_price($club)
    {
      $club = Club::find($club);

      return view('edit_price', [
        'club' => $club,
      ]);
    }

    public function update_price($club)
    {
      $club = Club::find($club);

      if(request('price_list'))
      {
        $imagePath = request('price_list')->store('img', 'public');
        $image = Image::make(public_path("storage/{$imagePath}"));
        $image->save();
        $imageArray = ['price_list' => '/storage/'.$imagePath];
      }

      $club->update($imageArray ?? []);

      return redirect('/price');
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
