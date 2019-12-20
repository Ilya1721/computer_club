@extends('layouts.app')

@section('content')
<div class="container text-center">
  <div class="row">
    <div class="col-3 pr-0 align-self-center text-justify text-yellow">
      @yield('home-left-links', View::make('layouts.home-left-links'))
    </div>
    <div class="col-8 pl-0">
      <h1 class="text-yellow">Наш клуб</h1>
      <table class="table table-dark text-yellow" id="visits">
        <thead>
          <tr>
            <th>Назва</th>
            <th>Адреса</th>
            <th>Тел.</th>
            <th>Режим роботи</th>
            <th>Ціни</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>
              <a href="/admin/clubs/{{ $club->id }}" class="yellow-link">
                {{ $club->name }}
              </a>
            </td>
            <td>{{ $club->street }} {{ $club->house}} {{ $club->flat }}</td>
            <td>{{ $club->phone }}</td>
            <td>{{ $club->schedule }}</td>
            <td>
              <a href="/price" class="yellow-link">
                Ціни
              </a>
            </td>
            <td>
              <div class="d-flex">
                <a href="/admin/clubs/{{ $club->id }}/edit"
                   class="btn btn-warning mr-3">
                  Edit
                </a>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="col-1"></div>
  </div>
</div>
@endsection
