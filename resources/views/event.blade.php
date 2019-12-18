@extends('layouts.app')

@section('content')
<div class="container text-center">
  <div class="row">
    <div class="col-3 pr-0 align-self-center text-justify text-yellow">
      @yield('home-left-links', View::make('layouts.home-left-links'))
    </div>
    <div class="col-8 px-0">
      <h1 class="text-yellow">
        Турнір по <span id="game-name">CS GO</span>
      </h1>
      <div class="row justify-content-center mb-3">
        <a href="#" class="btn btn-block btn-warning w-50" role="button">
          Анонси
        </a>
      </div>
      <p class="text-white text-middle text-justify">
        Як і завжди наш клуб продовжує підтримувати
        кіберспорт і організовувати турніри найвищого
        рівня. Не пропустіть бліжайшійтурнір - відбіркові
        на справжню кіберолімпіаду WCG 2012. Відбіркові
        ігри на лані пройдуть в нашому клубі 27-28 жовтня.
      </p>
      <div class="row">
        <div class="col">
          <img class="tournament-image" src="/storage/storage/img/tournament.jpg" />
        </div>
        <div class="col">
          <img class="tournament-image" src="/storage/storage/img/tournament2.jfif" />
        </div class="col">
        <div class="col">
          <img class="tournament-image" src="/storage/storage/img/tournament3.jfif" />
        </div>
      </div>
    </div>
    <div class="col-1"></div>
  </div>
</div>
@endsection
