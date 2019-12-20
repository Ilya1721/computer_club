<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
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

    public function create()
    {
      return view('create_platform');
    }

    public function edit(Platform $platform)
    {
      return view('edit_platform', [
        'platform' => $platform,
      ]);
    }

    public function update(Platform $platform)
    {
      $data = request()->validate([
        'name' => 'required',
        'image' => '',
      ]);

      if(request('image'))
      {
        $imagePath = request('image')->store('img', 'public');
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(150, 150);
        $image->save();
        $imageArray = ['image' => '/storage/'.$imagePath];
      }

      $platform->update(array_merge(
          $data,
          $imageArray ?? [],
      ));

      return redirect('/admin/platforms');
    }
}
