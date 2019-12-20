@extends('layouts.app')

@section('content')
<div class="container text-center">
  <div class="row">
    <div class="col-3 pr-0 align-self-center text-justify text-yellow">
      @yield('home-left-links', View::make('layouts.home-left-links'))
    </div>
    <div class="col-8 pl-0">
      <h1 class="text-yellow">Ціни</h1>
      @auth()
      @if(Auth::user()->role_id == 1)
      <a href="/admin/clubs/{{ $club->id }}/price/edit"
         class="btn btn-block w-100 mb-3 btn-warning">
        Змінити прайс ліст
      </a>
      @endif
      @endauth
      <img src="{{ $club->price_list }}" />
    </div>
    <div class="col-1"></div>
  </div>
</div>
@endsection
