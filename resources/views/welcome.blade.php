@extends('layouts.app')
@section('content')
<div class="container text-center">
  <div class="row mt-5">
    <div class="col-4 text-justify text-yellow">
      <span id="welcome-title">{{ $club->name }}</span>
      <span class="text-white">- найкращий комп`ютерний клуб міста<br/></span>
      <hr id="site-hr" />
      <span id="address-title">Адреса:</span>
      {{ $club->street }} {{ $club->house }}<br/>
      {{ $club->flat }}<br/>
      <span id="address-title">телефон:</span> {{ $club->phone }}<br/>
      <span id="address-title">Режим роботи:</span> {{ $club->schedule }}
      <span id="category">Анонси</span>
      @foreach($annonces as $annonce)
        <div class="mb-2">
          <a class="text-white" href="/activity/{{ $annonce->id }}">
            З {{ date('d.m.Y H:i', strtotime($annonce->start_date)) }}<br/>
            по {{ date('d.m.Y H:i', strtotime($annonce->end_date)) }}
            Відбудеться<br/>
            {{ $annonce->activity_type->name }} по
            <span id="game-name">{{ $annonce->game->name }}</span>
          </a><br />
        </div>
      @endforeach
      <span id="category">Останні події</span>
      @foreach($news as $new)
        <div class="mb-2">
          <a class="text-white" href="/activity/{{ $new->id }}">
            З {{ date('d.m.Y H:i', strtotime($new->start_date)) }}<br/>
            по {{ date('d.m.Y H:i', strtotime($new->end_date)) }}
            Відбувся<br/>
            {{ $new->activity_type->name }} по
            <span id="game-name">{{ $new->game->name }}</span>
          </a><br />
        </div>
      @endforeach
      <a class="text-white" href="/event">Та інші...</a><br />
      <span id="category">Ігри</span>
      <div class="text-white">
        @foreach($games as $game)
          {{ $game->name }}<br/>
        @endforeach
        <a class="text-white" href="/game">Та інші...</a><br />
      </div>
      <span id="category">Платформи</span>
      <div class="text-white">
        @foreach($platforms as $platform)
          {{ $platform->name }}<br />
        @endforeach
        <a class="text-white" href="/platform">Та інші...</a><br />
      </div>
    </div>
    <div class="col-8 text-left">
      <img id="main-img" src="/storage/img/main.png" />
      <img src="/storage/img/comp.png" />
    </div>
  </div>
</div>
@endsection
