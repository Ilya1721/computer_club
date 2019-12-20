@yield('home-left-links')
<a href="/home" class="yellow-link big-link">
  Візити
</a><br />
<a href="/user/event" class="yellow-link big-link">
  Участь в івентах
</a><br />
<a href="/event" class="yellow-link big-link">
  Усі івенти
</a><br />
<a href="/game" class="yellow-link big-link">
  Усі ігри
</a><br />
<a href="/platform" class="yellow-link big-link">
  Усі платформи
</a><br />
<a href="/price" class="yellow-link big-link">
  Ціни
</a><br />
<a href="/schedule" class="yellow-link big-link">
  Режим роботи
</a><br />
<a href="/visit/create" class="yellow-link big-link">
  Забронювати місце
</a><br />

@auth()
@if(Auth::user()->role_id == 1)
<a href="/admin" class="yellow-link big-link">
  Адмінка
</a><br />
<a href="/admin/clubs" class="yellow-link big-link">
  Клуби
</a><br />
<a href="/admin/clubs/{{ $club->id }}" class="yellow-link big-link">
  Наш клуб
</a><br />
<a href="/admin/halls" class="yellow-link big-link">
  Зали
</a><br />
@endif
@endauth
