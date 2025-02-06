@extends('layouts.app')
@section('extra-links')
<link href="{{ asset('assets/admin/css/login.style.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="container-fluid min-vh-100 d-flex align-items-center justify-content-center">
  <div class="main-container">
    <div class="row g-0">
      <!-- Left Side -->
      <div class="col-md-6 left-side d-flex flex-column justify-content-center text-white p-4">
        <div class="position-relative">
          <!-- Decorative Elements -->
          <div class="decoration-dot-1"></div>
          <div class="decoration-dot-2"></div>
          <div class="decoration-circle"></div>
          <div class="decoration-x">×</div>

          <h1 class="display-5 fw-bold mb-2">Cashier System</h1>
          <p class="lead fs-6 mb-0 mx-2">Access your cashier dashboard</p>
        </div>
      </div>

      <!-- Right Side -->
      <div class="col-md-6 d-flex align-items-center justify-content-center py-3">
        <div class="login-form px-3">
          <div class="text-center mb-3">
            <div class="restaurant-icon">🏪</div>
            <h5 class="mb-2"> {{ __('Cashier Login') }}</h5>
          </div>

          <form method="POST" action="{{ route('admin.login.submit') }}">
            @csrf

            <div class="mb-3">
              <label for="userName" class="form-label small">{{ __(' User Name') }}</label>
              <input type="text" class="form-control form-control-sm @error('userName') is-invalid @enderror"
                name="userName" placeholder="Username"
                value="{{ old('userName') }}" required placeholder="Enter your userName">

              @error('userName')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror

            </div>

            <div class="mb-3">
              <label for="password" class="form-label small">{{ __('Password') }}</label>
              <input id="password" type="password" class="form-control form-control-sm @error('password') is-invalid @enderror" name="password" required placeholder="············">

              @error('password')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>

            <div class="mb-3 d-flex justify-content-between">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                <label class="form-check-label small" for="remember">
                  {{ __('Remember Me') }}
                </label>

              </div>
              @if (Route::has('password.request'))
                <a class="btn btn-link text-decoration-none small" href="{{ route('password.request') }}">
                  {{ __('Forgot Your Password?') }}
                </a>
                @endif
            
            </div>

            <button type="submit" class="btn btn-primary w-100 mb-3">  {{ __('Login') }}</button>


          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection