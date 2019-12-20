@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Створити клуб') }}</div>

        <div class="card-body">
          <form method="POST" enctype="multipart/form-data"
                action="/admin/clubs">
            @csrf

            <div class="form-group row">
              <label for="name" class="col-md-4 col-form-label text-md-right">
                {{ __('Назва') }}
              </label>

              <div class="col-md-6">
                <input id="name" type="text"
                 class="form-control @error('name') is-invalid @enderror"
                 name="name" value="{{ old('name') }}"
                 required autocomplete="name" autofocus>

                @error('name')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="street" class="col-md-4 col-form-label text-md-right">
                {{ __('Вулиця') }}
              </label>

              <div class="col-md-6">
                <input id="street" type="text"
                 class="form-control @error('street') is-invalid @enderror"
                 name="street" value="{{ old('street') }}"
                 required autocomplete="street" autofocus>

                @error('street')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="house" class="col-md-4 col-form-label text-md-right">
                {{ __('Будинок') }}
              </label>

              <div class="col-md-6">
                <input id="house" type="text"
                 class="form-control @error('house') is-invalid @enderror"
                 name="house" value="{{ old('house') }}"
                 required autocomplete="house" autofocus>

                @error('house')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="flat" class="col-md-4 col-form-label text-md-right">
                {{ __('Квартира') }}
              </label>

              <div class="col-md-6">
                <input id="flat" type="text"
                 class="form-control @error('flat') is-invalid @enderror"
                 name="flat" value="{{ old('flat') }}"
                 required autocomplete="flat" autofocus>

                @error('flat')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="phone" class="col-md-4 col-form-label text-md-right">
                {{ __('Телефон') }}
              </label>

              <div class="col-md-6">
                <input id="phone" type="text"
                 class="form-control @error('phone') is-invalid @enderror"
                 name="phone" value="{{ old('phone') }}"
                 required autocomplete="phone" autofocus>

                @error('phone')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="schedule" class="col-md-4 col-form-label text-md-right">
                {{ __('Режим роботи') }}
              </label>

              <div class="col-md-6">
                <textarea id="schedule"
                 class="form-control @error('schedule') is-invalid @enderror"
                 name="schedule" required autocomplete="schedule" autofocus>
                 
                </textarea>

                @error('schedule')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="price_list" class="col-md-4 col-form-label text-md-right">
                {{ __('Ціни') }}
              </label>

              <div class="col-md-6">
                <input id="price_list" type="file"
                 class="form-control-file" name="price_list">

                @error('price_list')
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
                <a href="/admin/clubs" class="btn btn-danger" role="button">
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
