@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Редагувати івент') }}</div>

        <div class="card-body">
          <form method="POST"
                action="/admin/activities/{{ $activity->id }}">
            @csrf
            @method('patch')

            <div class="form-group row">
              <label for="activity_type_id"
                     class="col-md-4 col-form-label text-md-right">
                {{ __('Тип івенту') }}
              </label>

              <div class="col-md-6">
                <select id="activity_type_id" name="activity_type_id"
                 autofocus class="form-control"
                 selected value="{{ $activity->activity_type->id }}">
                 <option value="{{ $activity->activity_type->id }}">
                   {{ $activity->activity_type->name }}
                 </option>
                 @foreach($activity_types as $activity_type)
                 @if($activity_type->id != $activity->activity_type->id)
                 <option value="{{ $activity_type->id }}">
                   {{ $activity_type->name }}
                 </option>
                 @endif
                 @endforeach
                </select>
              </div>
            </div>

            <div class="form-group row">
              <label for="activity_type_id"
                     class="col-md-4 col-form-label text-md-right">
                {{ __('Зал') }}
              </label>

              <div class="col-md-6">
                <select id="hall_id" name="hall_id"
                 autofocus class="form-control"
                 selected value="{{ $activity->hall->id }}">
                 <option value="{{ $activity->hall->id }}">
                   {{ $activity->hall->name }}
                 </option>
                 @foreach($halls as $hall)
                 @if($hall->id != $activity->hall->id)
                 <option value="{{ $hall->id }}">
                   {{ $hall->name }}
                 </option>
                 @endif
                 @endforeach
                </select>
              </div>
            </div>

            <div class="form-group row">
              <label for="game_id"
                     class="col-md-4 col-form-label text-md-right">
                {{ __('Гра') }}
              </label>

              <div class="col-md-6">
                <select id="game_id" name="game_id"
                 autofocus class="form-control"
                 selected value="{{ $activity->game->id }}">
                 <option value="{{ $activity->game->id }}">
                   {{ $activity->game->name }}
                 </option>
                 @foreach($games as $game)
                 @if($game->id != $activity->game->id)
                 <option value="{{ $game->id }}">
                   {{ $game->name }}
                 </option>
                 @endif
                 @endforeach
                </select>
              </div>
            </div>

            <div class="form-group row">
              <label for="description" class="col-md-4 col-form-label text-md-right">
                {{ __('Опис') }}
              </label>

              <div class="col-md-6">
                <textarea id="description" rows="10" cols="40"
                 class="form-control @error('description') is-invalid @enderror"
                 name="description" value="{{ old('description') }}"
                 required autocomplete="description" autofocus>
                  {{ $activity->description }}
                </textarea>

                @error('description')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="price" class="col-md-4 col-form-label text-md-right">
                {{ __('Ціна') }}
              </label>

              <div class="col-md-6">
                <input id="price" type="number"
                 class="form-control @error('price') is-invalid @enderror"
                 name="price" value="{{ old('price') ?? $activity->price }}"
                 required autocomplete="price" autofocus>

                @error('price')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="start_date" class="col-md-4 col-form-label text-md-right">
                {{ __('Дата і час початку') }}
              </label>
              <div class="col-md-6">
                  <input id="start_date" name="start_date"
                   type="datetime"
                   value="{{ date('d.m.Y H:i', strtotime($activity->start_date)) }}"
                   class="form-control" />
                  @error('start_date')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="end_date" class="col-md-4 col-form-label text-md-right">
                {{ __('Дата і час закінчення') }}
              </label>
              <div class="col-md-6">
                  <input id="end_date" name="end_date"
                   type="datetime"
                   value="{{ date('d.m.Y H:i', strtotime($activity->end_date)) }}"
                   class="form-control" />
                  @error('end_date')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
            </div>

            <div class="form-group row mb-0">
              <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                  {{ __('Submit') }}
                </button>
                <a href="/admin/activities" class="btn btn-danger" role="button">
                  Cancel
                </a>
              </div>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>
</div>
@endsection
