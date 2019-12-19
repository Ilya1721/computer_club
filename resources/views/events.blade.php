@extends('layouts.app')

@section('content')
<div class="container text-center">
  <div class="row">
    <div class="col-3 pr-0 align-self-center text-justify text-yellow">
      @yield('home-left-links', View::make('layouts.home-left-links'))
    </div>
    <div class="col-8 px-0">
      <h1 class="text-yellow">Усі івенти</h1>
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
            <th>Дата і час початку івенту</th>
            <th>Дата і час кінця івенту</th>
            <th>Ціна</th>
            <th>Зал</th>
          </tr>
        </thead>
        <tbody>
          @foreach($events as $event)
          <tr>
            <td>
              <a href="/event/1" class="text-white">
                {{ $event->activity_type->name }} по
                <span id="game-name">{{ $event->game->name }}</span>
              </a>
            </td>
            <td>{{ date('d.m.Y H:i', strtotime($event->start_date)) }}</td>
            <td>{{ date('d.m.Y H:i', strtotime($event->end_date)) }}</td>
            <td>{{ $event->price }} грн.</td>
            <td>{{ $event->hall->name }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="col-1"></div>
  </div>
  <div class="row mt-3">
    <div class="col-12 d-flex justify-content-center">
      {{ $events->links() }}
    </div>
  </div>
</div>
@endsection
