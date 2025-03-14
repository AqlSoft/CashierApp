@extends('layouts.app')
@section('extra-links')
<link href="{{ asset('assets/admin/css/login.style.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="main-container  d-flex flex-column align-items-center justify-content-center">
      <!-- top Side -->
      <div class=" top-side ">
      <h2 class=" fw-bold mb-2 text-center pt-3">{{ __('Cashier Login') }}</h2>
      </div>
      <div class="restaurant-icon ">🏪</div>
      <!-- bottom Side -->
      <div class="bottom-side py-3 mt-5">
        <div class="login-form px-3">
          <form method="POST" action="{{ route('admin.login.submit') }}">
            @csrf
            <div class="mb-3 input-group ">
              <label for="userName" class="input-group-text small">{{ __(' User Name') }}</label>
              <input type="text" class="form-control w- form-control-sm @error('userName') is-invalid @enderror"
                name="userName" placeholder="Username"
                value="{{ old('userName') }}" required placeholder="Enter your userName">

              @error('userName')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror

            </div>

            <div class="mb-3 input-group">
              <label for="password" class="input-group-text small">{{ __('Password') }}</label>
              <input id="password" type="password" class="form-control form-control-sm @error('password') is-invalid @enderror" name="password" required placeholder="············">

              @error('password')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <button type="submit" class="btn btn-primary w-100 mb-3 ">  {{ __('Login') }}</button>

          </form>
        </div>
      </div>
</div>

@endsection