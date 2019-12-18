@extends('layouts.app')
@section('content')
<div class="container text-center">
  <div class="row mt-5">
    <div class="col-4 text-justify text-yellow">
      <span id="welcome-title">{{ config('app.name') }}</span>
      <span class="text-white">- найкращий комп`ютерний клуб міста<br/></span>
      <hr id="site-hr" />
      <span id="address-title">Адреса:</span> Разіна 17<br/>
      ТЦ Метроград, 2-й поверх<br/>
      <span id="address-title">телефон:</span> +380(93)247-56-47<br/>
      <span id="address-title">Режим роботи:</span> Кожний день. 9.00-24.00
      <span id="category">Анонси</span>
      <a class="text-white" href="/event/1">
        18.12.2019 з 10.00.
        Турнір по <span id="game-name">CS GO</span>
      </a><br />
      <a class="text-white" href="/event/2">
        25.12.2019 з 10.00.
        Турнір по <span id="game-name">Dota 2</span>
      </a><br />
      <span id="category">Останні події</span>
      <a class="text-white" href="/event/2">
        25.11.2019 відбувся
        Турнір по <span id="game-name">Dota 2</span>
      </a><br />
      <span id="category">Ігри</span>
      <div class="text-white">
        CS GO<br/>
        Dota 2<br/>
        League of Legends<br/>
        Lineage 2<br/>
        Gta V<br/>
        Red Alert 3<br/>
        Red Dead Redemption 2<br/>
        Serious Sam 2<br/>
        FIFA 2018<br/>
        PES 2018<br/>
        <a class="text-white" href="/game">Та інші...</a><br />
      </div>
      <span id="category">Платформи</span>
      <div class="text-white">
        ПК<br/>
        XBox360<br/>
        PS4<br/>
      </div>
    </div>
    <div class="col-8 text-left">
      <img id="main-img" src="/img/main.png" />
      <img src="/img/comp.png" />
    </div>
  </div>
</div>
@endsection
