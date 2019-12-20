@extends('layouts.app')

@section('content')
<div class="container text-center">
  <div class="row">
    <div class="col-3 pr-0 align-self-center text-justify text-yellow">
      @yield('home-left-links', View::make('layouts.home-left-links'))
    </div>
    <div class="col-8 pl-0">
      <h1 class="text-yellow">Усі платформи</h1>
      @auth()
      @if(Auth::user()->role_id == 1)
      <a href="/admin/platform/create"
         class="btn btn-block w-25 mb-3 btn-warning">
        Додати платформу
      </a>
      @endif
      @endauth
      <table class="table text-left table-dark text-yellow" id="visits">
        <thead>
          <tr>
            <th>#</th>
            <th>Фото</th>
            <th>Назва</th>
            @auth()
            @if(Auth::user()->role_id == 1)
            <th></th>
            @endif
            @endauth
          </tr>
        </thead>
        <tbody>
          @foreach($platforms as $platform)
          <tr>
            <td>{{ $platform->id }}</td>
            <td><img class="game-image" src="{{ $platform->image }}"></td>
            <td>{{ $platform->name }}</td>
            @auth()
            @if(Auth::user()->role_id == 1)
            <td>
              <div class="d-flex">
                <a href="/admin/platform/edit" class="btn btn-warning mr-3">
                  Edit
                </a>
                <form method="post" action="/admin/platform/{{ $platform->id }}">
                  @csrf
                  @method('delete')
                  <input type="submit" value="Delete" class="btn btn-danger" />
                </form>
              </div>
            </td>
            @endif
            @endauth
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="col-1"></div>
  </div>
  <div class="row mt-3">
    <div class="col-12 d-flex justify-content-center">
      {{ $platforms->links() }}
    </div>
  </div>
</div>
@endsection
