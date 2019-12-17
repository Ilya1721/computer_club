@extends('layouts.app')

@section('content')
<div class="container text-center">
  <div class="row">
    <div class="col-3 pr-0 align-self-center text-justify text-yellow">
      <a href="/home" class="yellow-link big-link">
        Візити
      </a><br />
      <a href="#" class="yellow-link big-link">
        Участь в івентах
      </a><br />
    </div>
    <div class="col-7 pl-0">
      <h1 class="text-yellow">Усі візити</h1>
      <div class="row justify-content-center mb-3">
        <a href="#" class="btn btn-block btn-warning w-50" role="button">
          Забронювати місце
        </a>
      </div>
      <table class="table table-dark text-yellow" id="visits">
        <thead>
          <tr>
            <th>#</th>
            <th>Дата і час візиту</th>
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
            <td>3 години</td>
            <td>25 грн.</td>
            <td>Головний</td>
            <td>17</td>
          </tr>
          @endfor
        </tbody>
      </table>
    </div>
    <div class="col-2"></div>
  </div>
</div>
@endsection
