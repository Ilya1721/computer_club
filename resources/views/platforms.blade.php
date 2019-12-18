@extends('layouts.app')

@section('content')
<div class="container text-center">
  <div class="row">
    <div class="col-3 pr-0 align-self-center text-justify text-yellow">
      @yield('home-left-links', View::make('layouts.home-left-links'))
    </div>
    <div class="col-8 pl-0">
      <h1 class="text-yellow">Усі платформи</h1>
      <div class="row justify-content-center mb-3">
        <a href="#" class="btn btn-block btn-warning w-50" role="button">
          Анонси
        </a>
      </div>
      <table class="table text-left table-dark text-yellow" id="visits">
        <thead>
          <tr>
            <th>#</th>
            <th>Фото</th>
            <th>Назва</th>
          </tr>
        </thead>
        <tbody>
          @foreach($platforms as $platform)
          <tr>
            <td>{{ $platform->id }}</td>
            <td><img class="game-image" src="{{ $platform->image }}"></td>
            <td>{{ $platform->name }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="col-1"></div>
  </div>
  <div class="row mt-3">
    <div class="col-12 d-flex justify-content-center">
      {{ $platforms->links() }}
    </div>
  </div>
</div>
@endsection
