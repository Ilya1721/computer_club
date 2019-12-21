@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Зареєструватись на івент') }}</div>

        <div class="card-body">
          <form method="POST"
                action="/activity/{{ $activity->id }}/register">
            @csrf

            <div class="form-group row">
              <label for="activity_role_id"
                     class="col-md-4 col-form-label text-md-right">
                {{ __('Роль учасника') }}
              </label>

              <div class="col-md-6">
                <select id="activity_role_id" name="activity_role_id"
                 autofocus class="form-control">
                 @foreach($activity_roles as $activity_role)
                 <option value="{{ $activity_role->id }}">
                   {{ $activity_role->name }}
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
              <label for="price" class="col-md-4 col-form-label text-md-right">
                {{ __('Сума') }}
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
                <a href="/activity/{{ $activity->id }}"
                   class="btn btn-danger" role="button">
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
