@extends('layouts.app')

@section('content')
<div class="container text-center">
  <div class="row">
    <div class="col-3 pr-0 align-self-center text-justify text-yellow">
      @yield('home-left-links', View::make('layouts.home-left-links'))
    </div>
    <div class="col-8 px-0">
      <h1 class="text-yellow">Усі зареєстровані відвідувачі на
         {{ $activity->activity_type->name }} по
         <span id="game-name">
           {{ $activity->game->name }}
         </span>
         у {{ $activity->hall->name }} залі
      </h1>
      <table class="table table-dark text-yellow" id="visits">
        <thead>
          <tr>
            <th>Відвідувач</th>
            <th>Сума</th>
            <th>Місце</th>
            <th>Роль відвідувача</th>
            <th>Дата і час початку</th>
            <th>Дата і час кінця</th>
          </tr>
        </thead>
        <tbody>
          @foreach($users as $user)
          <tr>
            <td>{{ $user->email }}</td>
            <td>{{ $user->price }} грн.</td>
            <td>{{ $user->place }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ date('d.m.Y H:i', strtotime($user->start_date)) }}</td>
            <td>{{ date('d.m.Y H:i', strtotime($user->end_date)) }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="col-1"></div>
  </div>
  <div class="row mt-3">
    <div class="col-12 d-flex justify-content-center">
      {{ $users->links() }}
    </div>
  </div>
</div>
@endsection
