@extends('layouts.app')

@section('content')
<div class="container text-center">
  <div class="row">
    <div class="col-3 pr-0 align-self-center text-justify text-yellow">
      @yield('home-left-links', View::make('layouts.home-left-links'))
    </div>
    <div class="col-8 pl-0">
      <h1 class="text-yellow">Усі типи івентів</h1>
      @auth()
      @if(Auth::user()->role_id == 1)
      <a href="/admin/activity-types/create"
         class="btn btn-block w-25 mb-3 btn-warning">
        Додати тип івентів
      </a>
      @endif
      @endauth
      <table class="table table-dark text-yellow" id="visits">
        <thead>
          <tr>
            <th>Назва</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach($activity_types as $activity_type)
          <tr>
            <td>{{ $activity_type->name }}</td>
            <td>
              <div class="d-flex">
                <a href="/admin/activity-types/{{ $activity_type->id }}/edit"
                   class="btn btn-warning mr-3">
                  Edit
                </a>
                <form method="post" action="/admin/activity-types/{{ $activity_type->id }}">
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
      {{ $activity_types->links() }}
    </div>
  </div>
</div>
@endsection
