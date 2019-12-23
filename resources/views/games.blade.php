@extends('layouts.app')

@section('content')
<div class="container text-center">
  <div class="row">
    <div class="col-3 pr-0 align-self-center text-justify text-yellow">
      @yield('home-left-links', View::make('layouts.home-left-links'))
    </div>
    <div class="col-8 pl-0">
      <h1 class="text-yellow">Усі ігри</h1>
      <div class="row justify-content-center mb-3">
        <form action="/game/filter" method="GET" class="form-inline mr-3">
          @csrf
          <div class="input-group">
            <select name="category" class="form-control">
              @foreach($genres as $genre)
              <option value="{{ $genre->id }}">
                {{ $genre->name }}
              </option>
              @endforeach
              <option value="all">
                Усі жанри
              </option>
            </select>
            <div class="input-group-append">
              <button class="btn btn-warning" type="submit">
                Filter<span class="glyphicon glyphicon-search"></span>
              </button>
            </div>
          </div>
        </form>
        <form action="/game/search" method="GET"
         class="form-inline w-50 mr-3">
          @csrf
          <div class="input-group">
            <select name="category" class="form-control">
              <option value="name">Назва</option>
            </select>
            <input id="search" name="search"
             class="w-50 input-group-append"
             type="text" placeholder="Search"
             aria-label="Search" />
            <div class="input-group-append">
              <button class="btn btn-warning" type="submit">
                Search<span class="glyphicon glyphicon-search"></span>
              </button>
            </div>
          </div>
        </form>
      </div>
      @auth()
      @if(Auth::user()->role_id == 1)
      <a href="/admin/games/create"
         class="btn btn-block w-25 mb-3 btn-warning">
        Додати гру
      </a>
      @endif
      @endauth
      <table class="table table-dark text-yellow" id="visits">
        <thead>
          <tr>
            <th>#</th>
            <th>Фото</th>
            <th>Назва</th>
            <th>Жанр</th>
            <th>Платформи</th>
            @auth()
            @if(Auth::user()->role_id == 1)
            <th></th>
            @endif
            @endauth
          </tr>
        </thead>
        <tbody>
          @foreach($games as $game)
          <tr>
            <td>{{ $game->id }}</td>
            <td><img class="game-image" src="{{ $game->image }}" /></td>
            <td><span id="game-name">{{ $game->name }}</span></td>
            <td>
              {{ $game->genre->name }},
            </td>
            <td>{{ $game->platform->name }}</td>
            @auth()
            @if(Auth::user()->role_id == 1)
            <td>
              <div class="d-flex">
                <a href="/admin/games/{{ $game->id }}/edit"
                   class="btn btn-warning mr-3">
                  Edit
                </a>
                <form method="post" action="/admin/games/{{ $game->id }}">
                  @csrf
                  @method('delete')
                  <input type="submit" value="Delete" class="btn btn-danger" />
                </form>
              </div>
            </td>
            @endif
            @endauth
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="col-1"></div>
  </div>
  <div class="row mt-3">
    <div class="col-12 d-flex justify-content-center">
      {{ $games->links() }}
    </div>
  </div>
</div>
@endsection
