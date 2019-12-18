@extends('layouts.app')

@section('content')
<div class="container text-center">
  <div class="row">
    <div class="col-3 pr-0 align-self-center text-justify text-yellow">
      @yield('home-left-links', View::make('layouts.home-left-links'))
    </div>
    <div class="col-8 pl-0">
      <h1 class="text-yellow">Режим роботи</h1>
      <p class="text-white text-big">Клуб працює 24/7 з перервою з 7.00 до 9.00</p>
    </div>
    <div class="col-1"></div>
  </div>
</div>
@endsection
