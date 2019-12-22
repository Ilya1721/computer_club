@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Забронювати місце') }}</div>

        <div class="card-body">
          <form method="POST"
                action="/user/hall/visit/register">
            @csrf

            <div class="form-group row">
              <label for="hall_id"
                     class="col-md-4 col-form-label text-md-right">
                {{ __('Зал') }}
              </label>

              <div class="col-md-6">
                <select id="hall_id" name="hall_id"
                 autofocus class="form-control">
                 @foreach($halls as $hall)
                 <option value="{{ $hall->id }}">
                   {{ $hall->name }}
                 </option>
                 @endforeach
                </select>
              </div>
            </div>

            <div class="form-group row">
              <label for="place" class="col-md-4 col-form-label text-md-right">
                {{ __('Місце') }}
              </label>

              <div class="col-md-6">
                <input id="place" type="text"
                 class="form-control @error('place') is-invalid @enderror"
                 name="place" value="{{ old('place') }}"
                 required autocomplete="place" autofocus>

                @error('place')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="hours" class="col-md-4 col-form-label text-md-right">
                {{ __('Скільки годин') }}
              </label>

              <div class="col-md-6">
                <input id="hours" type="number"
                 class="form-control @error('hours') is-invalid @enderror"
                 name="hours" value="{{ old('hours') }}"
                 required autocomplete="hours" autofocus>

                @error('hours')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="price" class="col-md-4 col-form-label text-md-right">
                {{ __('Ціна за годину') }}
              </label>

              <div class="col-md-6">
                <input id="price" type="text"
                 class="form-control" readonly autofocus
                 name="price" value="{{ $activity->price }} грн.">
              </div>
            </div>


            <div class="form-group row mb-0">
              <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                  {{ __('Submit') }}
                </button>
                <a href="/home" class="btn btn-danger" role="button">
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
