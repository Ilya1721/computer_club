@extends('layouts.app')

@section('content')
<div class="container text-center">
  <div class="row">
    <div class="col-3 pr-0 align-self-center text-justify text-yellow">
      @yield('home-left-links', View::make('layouts.home-left-links'))
    </div>
    <div class="col-8 pl-0">
      <h1 class="text-yellow">Режим роботи</h1>
      @auth()
      @if(Auth::user()->role_id == 1)
      <a href="/admin/clubs/{{ $club->id }}/schedule/edit"
         class="btn btn-block w-100 mb-3 btn-warning">
        Змінити режим роботи
      </a>
      @endif
      @endauth
      <p class="text-white text-big">Клуб працює {{ $club->schedule }}</p>
    </div>
    <div class="col-1"></div>
  </div>
</div>
@endsection
