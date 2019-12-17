@extends('layouts.app')
@section('content')
<div class="container text-center">
  <div class="row mt-5">
    <div id="left-info" class="col-4 text-justify">
      <span id="welcome-title">{{ config('app.name') }}</span>
      <span id="site-desc">- найкращий комп`ютерний клуб міста<br/></span>
      <hr id="site-hr" />
      <span id="address-title">Адреса:</span> Разіна 17<br/>
      ТЦ Метроград, 2-й поверх<br/>
      <span id="address-title">телефон:</span> +380(93)247-56-47<br/>
      <span id="address-title">Режим роботи:</span> Кожний день. 9.00-24.00
      <span id="category">Анонси</span>
      <a id="activity" href="#">
        18.12.2019 з 10.00.
        Турнір по <span id="game-name">CS GO</span>
      </a><br />
      <a id="activity" href="#">
        25.12.2019 з 10.00.
        Турнір по <span id="game-name">Dota 2</span>
      </a><br />
      <span id="category">Ігри</span>
      <div class="categories">
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
      </div>
      <span id="category">Платформи</span>
      <div class="categories">
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
