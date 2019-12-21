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
      @if(date('G', strtotime(date('Y-m-d H:i:s')) -
                    strtotime($activity->start_date))
          > 0)
      <div class="row justify-content-center mb-3">
        <a href="/activity/{{ $activity->id }}/register"
           class="btn btn-block btn-warning w-50" role="button">
          Зареєструватись
        </a>
      </div>
      @endif
      @auth()
      @if(Auth::user()->role_id == 1)
      <a href="/admin/activities/{{ $activity->id }}/edit"
         class="btn btn-block w-25 mb-3 btn-warning">
        Редагувати івент
      </a>
      @endif
      @endauth
      <p class="text-white text-middle text-justify">
        {{ $activity->description }}
      </p>
    </div>
    <div class="col-1"></div>
  </div>
</div>
@endsection
