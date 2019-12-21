@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Редагувати зал') }}</div>

        <div class="card-body">
          <form method="POST" enctype="multipart/form-data"
                action="/admin/halls/{{ $hall->id }}">
            @csrf
            @method('patch')

            <div class="form-group row">
              <label for="name" class="col-md-4 col-form-label text-md-right">
                {{ __('Назва') }}
              </label>

              <div class="col-md-6">
                <input id="name" type="text"
                 class="form-control @error('name') is-invalid @enderror"
                 name="name" value="{{ old('name') ?? $hall->name }}"
                 required autocomplete="name" autofocus>

                @error('name')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="club_id"
               class="col-md-4 col-form-label text-md-right">
                {{ __('Клуб') }}
              </label>

              <div class="col-md-6">
                <select id="club_id" name="club_id"
                 autofocus class="form-control"
                 selected value="{{ $hall->club->id }}">
                 <option value="{{ $club->id }}">
                   {{ $hall->club->name }}
                 </option>
                 @foreach($clubs as $club)
                 @if($club->id != $hall->club->id)
                 <option value="{{ $club->id }}">
                   {{ $club->name }}
                 </option>
                 @endif
                 @endforeach
                </select>
              </div>
            </div>

            <div class="form-group row mb-0">
              <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                  {{ __('Submit') }}
                </button>
                <a href="/admin/halls" class="btn btn-danger" role="button">
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
