@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Редагувати гру') }}</div>

        <div class="card-body">
          <form method="POST" enctype="multipart/form-data"
                action="/admin/games/{{ $game->id }}">
            @csrf
            @method('patch')

            <div class="form-group row">
              <label for="name" class="col-md-4 col-form-label text-md-right">
                {{ __('Назва') }}
              </label>

              <div class="col-md-6">
                <input id="name" type="text"
                 class="form-control @error('name') is-invalid @enderror"
                 name="name" value="{{ old('name') ?? $game->name }}"
                 required autocomplete="name" autofocus>

                @error('name')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="genre_id"
               class="col-md-4 col-form-label text-md-right">
                {{ __('Жанр') }}
              </label>

              <div id="genres" class="col-md-6">
                @foreach($game->genres as $game_genre)
                  <select id="genre_id" name="genre_id[]"
                   autofocus class="form-control"
                   selected value="{{ $game_genre->id }}">
                   <option value="{{ $game_genre->id }}">
                     {{ $game_genre->name }}
                   </option>
                   @foreach($genres as $genre)
                   @if($genre->id != $game_genre->id)
                   <option value="{{ $genre->id }}">
                     {{ $genre->name }}
                   </option>
                   @endif
                   @endforeach
                  </select>
                @endforeach
                <div class="d-flex mt-2">
                  <button class="btn btn-info" type="button"
                   onClick="more_genres()">Більше жанрів</button>
                  <button class="btn btn-danger ml-1" type="button"
                   onClick="less_genres()">Менше жанрів</button>
                </div>
              </div>
            </div>

            <div class="form-group row">
              <label for="platform_id"
               class="col-md-4 col-form-label text-md-right">
                {{ __('Платформа') }}
              </label>

              <div id="platforms" class="col-md-6">
                @foreach($game->platforms as $game_platform)
                  <select id="platform_id" name="platform_id[]"
                   autofocus class="form-control"
                   selected value="{{ $game_platform->id }}">
                   <option value="{{ $game_platform->id }}">
                     {{ $game_platform->name }}
                   </option>
                   @foreach($platforms as $platform)
                   @if($platform->id != $game_platform->id)
                   <option value="{{ $platform->id }}">
                     {{ $platform->name }}
                   </option>
                   @endif
                   @endforeach
                  </select>
                @endforeach
              </div>
            </div>

            <div class="form-group row">
              <label for="image" class="col-md-4 col-form-label text-md-right">
                {{ __('Фото') }}
              </label>

              <div class="col-md-6">
                <input id="image" type="file"
                 class="form-control-file" name="image">

                @error('image')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>

            <div class="form-group row mb-0">
              <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                  {{ __('Submit') }}
                </button>
                <a href="/admin/games" class="btn btn-danger" role="button">
                  Cancel
                </a>
              </div>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>
</div>
@endsection

<script>
function more_genres()
{
  $("#genres").append("<select>")
              .append("<option value='1'>RGG</option>")
              .append("</select>");
}

function less_genres()
{

}



</script>
