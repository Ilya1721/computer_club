@extends('layouts.app')

@section('content')
<div class="container text-center">
  <div class="row">
    <div class="col-3 pr-0 align-self-center text-justify text-yellow">
      @yield('home-left-links', View::make('layouts.home-left-links'))
    </div>
    <div class="col-8 pl-0">
      <h1 class="text-yellow">Усі участі</h1>
      <div class="row justify-content-center mb-3">
        <a href="#" class="btn btn-block btn-warning w-50" role="button">
          Анонси
        </a>
      </div>
      <div class="row justify-content-center mb-3">
        <form action="/game/filter" method="post" class="form-inline mr-3">
          @csrf
          <div class="input-group">
            <select name="category" class="form-control">
              <option value="1">
                Турнір
              </option>
              <option value="2">
                Виставка
              </option>
              <option value="all">
                Усі івенти
              </option>
            </select>
            <div class="input-group-append">
              <button class="btn btn-warning" type="submit">
                Filter<span class="glyphicon glyphicon-search"></span>
              </button>
            </div>
          </div>
        </form>
        <form action="/game/search" method="post"
         class="form-inline w-50 mr-3">
          @csrf
          <div class="input-group">
            <select name="category" class="form-control">
              <option value="1">Назва</option>
            </select>
            <input id="search" name="search"
             class="w-50 input-group-append"
             type="text" placeholder="Search"
             aria-label="Search" />
            <div class="input-group-append">
              <button class="btn btn-warning" type="submit">
                Search<span class="glyphicon glyphicon-search"></span>
              </button>
            </div>
          </div>
        </form>
      </div>
      <table class="table table-dark text-yellow" id="visits">
        <thead>
          <tr>
            <th>Назва івенту</th>
            <th>Дата і час прибуття</th>
            <th>Час перебування</th>
            <th>Роль у івенті</th>
            <th>Сума</th>
            <th>Зал</th>
            <th>Місце</th>
          </tr>
        </thead>
        <tbody>
          @php($i = 0)
          @foreach($user_events as $user_event)
          <tr>
            <td>
              <a href="/event/1" class="text-white">
                {{ $activity_info[$i]->activity_type->name }}
                по
                <span id="game-name">
                  {{ $activity_info[$i]->game->name}}
                </span>
              </a>
            </td>
            <td>{{ date('d.m.Y-H:i', strtotime($user_event->start_date)) }}</td>
            <td>{{ date('G', strtotime($user_event->end_date) -
                             strtotime($user_event->start_date)) }} години
            </td>
            <td>{{ $user_event->name }}</td>
            <td>{{ $user_event->price }} грн.</td>
            <td>{{ $activity_info[$i]->hall->name }}</td>
            <td>{{ $user_event->place }}</td>
          </tr>
          @php($i++)
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="col-1"></div>
  </div>
  <div class="row mt-3">
    <div class="col-12 d-flex justify-content-center">
      {{ $user_events->links() }}
    </div>
  </div>
</div>
@endsection
