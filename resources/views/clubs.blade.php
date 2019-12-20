@extends('layouts.app')

@section('content')
<div class="container text-center">
  <div class="row">
    <div class="col-3 pr-0 align-self-center text-justify text-yellow">
      @yield('home-left-links', View::make('layouts.home-left-links'))
    </div>
    <div class="col-8 pl-0">
      <h1 class="text-yellow">Усі клуби</h1>
      @auth()
      @if(Auth::user()->role_id == 1)
      <a href="/admin/clubs/create"
         class="btn btn-block w-25 mb-3 btn-warning">
        Додати клуб
      </a>
      @endif
      @endauth
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
          @foreach($clubs as $club)
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
                <form method="post" action="/admin/clubs/{{ $club->id }}">
                  @csrf
                  @method('delete')
                  <input type="submit" value="Delete" class="btn btn-danger" />
                </form>
              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="col-1"></div>
  </div>
  <div class="row mt-3">
    <div class="col-12 d-flex justify-content-center">
      {{ $clubs->links() }}
    </div>
  </div>
</div>
@endsection
