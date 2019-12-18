@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Забронювати місце') }}</div>

        <div class="card-body">
          <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group row">
              <label for="place"
               class="col-md-4 col-form-label text-md-right">
                {{ __('Місце') }}
              </label>

              <div class="col-md-6">
                <select id="place" name="place"
                 autofocus class="form-control">
                  <option value="1">
                    1
                  </option>
                  <option value="2">
                    2
                  </option>
                </select>
              </div>
            </div>

            <div class="form-group row">
              <label for="hours" class="col-md-4 col-form-label text-md-right">
                {{ __('На скільки годин') }}
              </label>

              <div class="col-md-6">
                <input id="hours" type="hours"
                 class="form-control @error('hours') is-invalid @enderror"
                 name="hours" value="{{ old('hours') }}"
                 required autocomplete="hours">

                @error('hours')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="hall"
               class="col-md-4 col-form-label text-md-right">
                {{ __('Зал') }}
              </label>

              <div class="col-md-6">
                <select id="hall" name="hall"
                 autofocus class="form-control">
                  <option value="1">
                    Звичайний
                  </option>
                  <option value="2">
                    VIP
                  </option>
                  <option value="3">
                    PRO
                  </option>
                </select>
              </div>
            </div>

            <div class="form-group row mb-0">
              <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                  {{ __('Register') }}
                </button>
                <a href="/" class="btn btn-danger" role="button">
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
