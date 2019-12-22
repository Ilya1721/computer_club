@extends('layouts.app')

@section('content')
<div class="container text-center">
  <div class="row">
    <div class="col-3 pr-0 align-self-center text-justify text-yellow">
      @yield('home-left-links', View::make('layouts.home-left-links'))
    </div>
    <div class="col-7 pl-0">
      <h1 class="text-yellow">Усі візити</h1>
      <div class="row justify-content-center mb-3">
        <a href="/user/activity/visit/register"
           class="btn btn-block btn-warning w-50" role="button">
          Забронювати місце
        </a>
      </div>
      <table class="table table-dark text-yellow" id="visits">
        <thead>
          <tr>
            <th>Дата і час візиту</th>
            <th>Час перебування</th>
            <th>Сума</th>
            <th>Зал</th>
            <th>Місце</th>
          </tr>
        </thead>
        <tbody>
          @foreach($visits as $visit)
          <tr>
            <td>{{ date('d.m.Y H:i', strtotime($visit->start_date)) }}</td>
            <td>{{ date('G', strtotime($visit->end_date) -
                             strtotime($visit->start_date)) }} години
            </td>
            <td>{{ $visit->price *
                    date('G', strtotime($visit->end_date) -
                    strtotime($visit->start_date)) }} грн.</td>
            <td>{{ $visit->hall->name }}</td>
            <td>{{ $visit->place }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="col-2"></div>
  </div>
</div>
@endsection
