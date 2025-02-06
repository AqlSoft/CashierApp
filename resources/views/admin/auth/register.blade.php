@extends('layouts.app')
@section('extra-links')
<link href="{{ asset('assets/admin/css/register.style.css') }}" rel="stylesheet">
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

          <h1 class="display-5 fw-bold mb-2">Join Our<br>Cashier Team</h1>
          <p class="lead fs-6 mb-0">Create your cashier account</p>
        </div>
      </div>

      <!-- Right Side -->
      <div class="col-md-6 d-flex align-items-center justify-content-center py-3">
        <div class="signup-form px-3">
          <div class="text-center mb-3">
            <div class="restaurant-icon">🏪</div>
            <h5 class="mb-2"> {{ __('Create Account') }}</h5>
          </div>

          <form method="POST" action="{{ route('admin.register.submit') }}">
            @csrf
            <div class="mb-3">
              <label for="userName" class="form-label small">{{ __('User Name') }}</label>
              <input id="userName" type="text" class="form-control form-control-sm @error('userName') is-invalid @enderror" name="userName"  id="userName" value="{{ old('userName') }}" placeholder="Enter your user name" required>
              @error('userName')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>

            <div class="mb-3">
              <label for="employeeId" class="form-label small">{{ __('Email Address') }}</label>
              <input id="email" type="email" class="form-control form-control-sm @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required  placeholder="Enter your email address">
                @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="mb-3">
              <label for="password" class="form-label small">Password</label>
              <input type="password" class="form-control form-control-sm @error('password') is-invalid @enderror" name="password" id="password" placeholder="············" required>
                @error('password')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="mb-3">
              <label for="confirmPassword" class="form-label small">{{ __('Confirm Password') }}</label>
              <input id="password-confirm" type="password" class="form-control form-control-sm" name="password_confirmation" required placeholder="············">
            </div>

            <button type="submit" class="btn btn-primary w-100 mb-3"> {{ __('Create Account') }}</button>

            <div class="text-center">
              <p class="small mb-0">Already have an account? <a href="{{ route('admin.login') }}" class="text-decoration-none color-link">Login</a></p>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection