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
            <th>#</th>
            <th>Дата і час івенту</th>
            <th>Назва івенту</th>
            <th>Час перебування</th>
            <th>Сума</th>
            <th>Зал</th>
            <th>Місце</th>
          </tr>
        </thead>
        <tbody>
          @for($i = 0; $i < 5; $i++)
          <tr>
            <td>1</td>
            <td>17.12.2019 - 21:00</td>
            <td>Турнір по <span id="game-name">СS GO</span></td>
            <td>3 години</td>
            <td>25 грн.</td>
            <td>Головний</td>
            <td>17</td>
          </tr>
          @endfor
        </tbody>
      </table>
    </div>
    <div class="col-1"></div>
  </div>
</div>
@endsection
