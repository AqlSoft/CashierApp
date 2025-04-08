@extends('layouts.admin')
@section('contents')
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-12">
                <div id="products-container">

                    <h1 class="d-flex justify-content-between mt-3 pb-2" style="border-bottom: 1px solid #dedede">Edit Admin
                        info
                        <form class="d-inline-block" action="{{ route('destroy-admin-info', [$admin->id]) }}">
                            <button type="submit" class="btn btn-sm btn-outline-danger"><i class="fa fa-trash"></i></button>
                            <a href="{{ route('admin-list') }}" class="btn btn-sm btn-outline-primary">
                                <span data-bs-toggle="tooltip" data-bs-title="Create New Admin"><i
                                        class="fa fa-home"></i></span></a>
                        </form>
                    </h1>

                    <div class="row">
                        <div class="col col-8 card mb-3">
                            <div class="card-header">
                                <h5 class="card-title py-2">
                                    {{ __('Account Basic Info') }}
                                </h5>
                            </div>
                            <form action="{{ route('update-admin-info') }}" method="POST">
                                <div class="card-body">
                                    @csrf
                                    @method('put')

                                    <div class="input-group sm mb-2">
                                        <label class="input-group-text" for="userName">User Name</label>
                                        <input type="text" class=" form-control sm " name="userName" id="userName"
                                            value="{{ old('last_name', $admin->profile) }}">
                                    </div>
                                    @error('userName')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <div class="input-group sm mb-2">
                                        <label class="input-group-text" for="email">Email</label>
                                        <input type="email" class="form-control sm" name="email" id="email"
                                            value="{{ old('last_name', $admin->profile) }}">
                                    </div>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                    <div class="input-group sm mb-2">
                                        <label class="input-group-text" for="role_name">{{ __('Role') }}</label>
                                        <select class="form-select sm" name="role_name" id="role_name"
                                            value="{{ old('last_name', $admin->profile) }}">
                                            <option hidden>{{ __('Select Role') }}</option>
                                            @foreach ($roles as $role)
                                                <option value="{{ $role }}">{{ __('admins.' . $role) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('role_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                                <div class="card-footer d-flex justify-content-end">
                                    <button type=submit class="btn py-0 btn-outline-primary"><i class="fa fa-save me-2"></i>
                                        {{ __('Update') }}</button>
                                </div>
                            </form>
                        </div>

                        {{-- Change Password --}}
                        <div class="col col-4 card mb-3">
                            <div class="card-header">
                                <h5 class="card-title py-2">{{ __('Change Password') }}</h5>
                            </div>
                            <form action="{{ '' }}">
                                <div class="card-body">
                                    <div class="input-group sm mb-2">
                                        <label class="input-group-text"
                                            for="current_password">{{ __('Current Password') }}</label>
                                        <input type="password" class="form-control sm" name="current_password"
                                            id="current_password">
                                    </div>
                                    <div class="input-group sm mb-2">
                                        <label class="input-group-text" for="new_password">{{ __('New Password') }}</label>
                                        <input type="password" class="form-control sm" name="password" id="new_password">
                                    </div>
                                    <div class="input-group sm mb-2">
                                        <label class="input-group-text"
                                            for="password_confirmation">{{ __('Confirm Password') }}</label>
                                        <input type="password" class="form-control sm" name="password_confirmation"
                                            id="password_confirmation">
                                    </div>
                                </div>
                                <div class="d-flex justify-contecnt-end card-footer">
                                    <button class="brn btn-outline-primary py-0"
                                        type="submit">{{ __('Update Password') }}</button>
                                </div>
                            </form>
                        </div>


                        {{-- Profile Legal Info --}}
                        <div class="card mb-3">
                            <div class="card-header">
                                <h5 class="card-title py-2">
                                    {{ __('Profile Identity') }}
                            </div>
                            </h5>
                            <form action="{{ route('update-admin-info') }}" method="POST">
                                <div class="card-body">
                                    @csrf
                                    @method('put')

                                    <div class="input-group sm mb-2">
                                        <label class="input-group-text" for="first_name">First Name</label>
                                        <input type="text" class="form-control sm" name="first_name" id="first_name"
                                            value="{{ old('first_name', $admin->profile) }}">
                                    </div>
                                    @error('first_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <div class="input-group sm mb-2">
                                        <label class="input-group-text" for="last_name">Last Name</label>
                                        <input type="text" class="form-control sm" name="last_name" id="last_name"
                                            value="{{ old('last_name', $admin->profile) }}">
                                    </div>
                                    @error('last_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="card-footer d-flex justify-content-end">
                                    <button type=submit class="btn py-0 btn-outline-primary"><i
                                            class="fa fa-save me-2"></i>
                                        {{ __('Update') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
