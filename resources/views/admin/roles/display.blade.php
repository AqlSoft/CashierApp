@extends('layouts.admin')
@section('title', __('roles.users_roles'))
@section('header-links')
<li class="breadcrumb-item"><a href="#">{{ __('roles.admins') }}</a></li>
<li class="breadcrumb-item"><a href="#">{{ __('roles.roles') }}</a></li>
<li class="breadcrumb-item active" aria-current="page">{{ __('roles.role_details') }}</li>
@endsection
@section('contents')
<div class="container-fluid">

    <!-- تبويبات التنقل -->
    <ul class="nav nav-tabs mt-3" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="roles-list-tab" data-bs-toggle="tab"
                data-bs-target="#roles-list" type="button" role="tab" aria-controls="roles-list"
                aria-selected="false">
                <a href="{{ route('roles-list') }}">{{ __('roles.roles_list') }}</a>
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="basic-info-tab" data-bs-toggle="tab"
                data-bs-target="#basic-info" type="button" role="tab" aria-controls="basic-info"
                aria-selected="true">{{ __('roles.basic_info') }}</button>
        </li>
        <li class="nav-item">
            <button class="nav-link" id="role-admins-tab" data-bs-toggle="tab" data-bs-target="#role-admins"
                type="button" role="tab" aria-controls="role-admins" aria-selected="false">{{ __('roles.attached_to') }}</button>
        </li>
        <li class="nav-item">
            <button class="nav-link" id="role-permissions-tab" data-bs-toggle="tab" data-bs-target="#role-permissions"
                type="button" role="tab" aria-controls="role-permissions" aria-selected="false">{{ __('roles.role_permissions') }}</button>
        </li>
    </ul>

    <div class="tab-content" id="roleInfo">
        <div class="tab-pane fade show active" id="basic-info" role="tabpanel" aria-labelledby="basic-info-tab">
            <div class="row">
                <div class="col col-12 mb-3 p-1">
                    <h4 class="btn btn-outline-secondary mb-3">{{ __('roles.edit_role_basic_info') }}</h4>
                    <form action="{{ route('update-role-info') }}" method="POST">
                        <div class="card-body">
                            @csrf
                            @method('put')
                            <input type="hidden" name="id" value="{{ $role->id }}">
                            <div class="input-group sm mb-2">
                                <label class="input-group-text" for="name">{{ __('roles.role_name') }}</label>
                                <input type="text" class="form-control sm" name="name" id="name"
                                    value="{{ old('name', $role) }}">
                            </div>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <div class="input-group sm mb-2">
                                <label class="input-group-text" for="brief">{{ __('roles.brief') }}</label>
                                <input type="text" class="form-control sm" name="brief" id="brief"
                                    value="{{ old('brief', $role) }}">
                            </div>
                            @error('brief')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                            <div class="input-group sm mb-2">
                                <label class="input-group-text" for="status">{{ __('roles.status') }}</label>
                                <select class="form-select sm" name="status" id="status">
                                    <option {{ $role->status ? 'selected' : '' }} value="1">{{ __('roles.active') }}</option>
                                    <option {{ !$role->status ? 'selected' : '' }} value="0">{{ __('roles.inactive') }}</option>
                                </select>
                            </div>
                            @error('status')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="card-footer d-flex justify-content-end">
                            <button type="submit" class="btn py-0 btn-outline-primary">
                                <i class="fa fa-save me-2"></i>{{ __('roles.update') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="tab-pane fade" id="role-admins" role="tabpanel" aria-labelledby="role-admins-tab">
            <div class="row">
                <div class="col col-12 mb-3 p-1">
                    <h4 class="btn btn-outline-secondary mb-3">{{ __('roles.attached_to') }}</h4>
                    <ul>
                        @foreach($role->admins as $admin)
                        <li>{{ $admin->profile->full_name() }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <div class="tab-pane fade" id="role-permissions" role="tabpanel" aria-labelledby="role-permissions-tab">
            <div class="row">
                <div class="col col-12 mb-3 p-1">
                    <h4 class="btn btn-outline-secondary mb-3">{{ __('roles.role_permissions') }}</h4>
                    <div class="accordion accordion-flush" id="permissionsAccordion">
                        <input type="hidden" id="role_id" value="{{ $role->id }}">
                        @forelse ($permissions as $module => $group)
                        <div class="accordion-item shadow-sm rounded">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed py-2 fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse{{ $module }}" aria-expanded="false" aria-controls="flush-collapse{{ $module }}">
                                    {{ ucwords(str_replace('-', ' ', $module)) }}
                                </button>
                            </h2>
                            <div id="flush-collapse{{ $module }}" class="accordion-collapse collapse" data-bs-parent="#permissionsAccordion">
                                <div class="accordion-body">
                                    <div class="row gap-0">
                                        @foreach ($group as $permission)
                                        <div class="col col-md-4 mb-2 px-1">
                                            <div class="permission btn w-100 btn-{{ $role->permissions->contains($permission->id) ? 'success' : 'outline-secondary' }}"
                                                data-permission_id="{{ $permission->id }}"
                                                data-is-role-permission="{{ $role->permissions->contains($permission->id) ? 1 : 0 }}">
                                                {{ $permission->parseName() }}
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div>{{ __('roles.no_permissions_found') }}</div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection