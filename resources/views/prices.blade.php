@extends('layouts.app')

@section('content')
<div class="container text-center">
  <div class="row">
    <div class="col-3 pr-0 align-self-center text-justify text-yellow">
      @yield('home-left-links', View::make('layouts.home-left-links'))
    </div>
    <div class="col-8 pl-0">
      <h1 class="text-yellow">Ціни</h1>
      <img src="/img/price.gif" />
    </div>
    <div class="col-1"></div>
  </div>
</div>
@endsection
