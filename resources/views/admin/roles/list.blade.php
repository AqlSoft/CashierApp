@extends('layouts.admin')

@section('title', __('roles.roles_list'))

@section('header-links')
<li class="breadcrumb-item"><a href="#">{{ __('roles.admins') }}</a></li>
<li class="breadcrumb-item active" aria-current="page">{{ __('roles.roles_list') }}</li>
@endsection

@section('contents')
<div class="container-fluid">
    <ul class="nav nav-tabs mt-3" id="myTab" role="tablist">
        <li class="nav-item">
            <button class="nav-link" id="role-admins-tab" data-bs-toggle="tab" data-bs-target="#role-admins"
                type="button" role="tab" aria-controls="role-admins" aria-selected="false">
                <a href="{{ route('admin-list') }}">{{ __('roles.admins_list') }}</a>
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="roles-list-tab" data-bs-toggle="tab"
                data-bs-target="#roles-list" type="button" role="tab" aria-controls="roles-list"
                aria-selected="false">
                <a href="{{ route('roles-list') }}">{{ __('roles.roles_list') }}</a>
            </button>
        </li>

        <li class="nav-item">
            <button class="nav-link" id="role-permissions-tab" data-bs-toggle="tab" data-bs-target="#role-permissions"
                type="button" role="tab" aria-controls="role-permissions" aria-selected="false">
                <a href="{{ route('permissions-list') }}">{{ __('roles.permissions_list') }}</a>
            </button>
        </li>
    </ul>

    <h4 class="btn btn-outline-secondary mt-2">{{ __('roles.roles_list') }}</h4>

    <!-- Search Section -->
    <div class="row">
        <div class="col col-12 pt-3">
            <div class="card card-body">
                <div class="input-group sm mb-2">
                    <label class="input-group-text" for="name">{{ __('roles.role_name') }}</label>
                    <input type="text" class="form-control sm" name="name" id="name"
                        data-url="{{ route('search-roles-by-name') }}"
                        onkeyup="getData(this, '#listOfAdmins')">
                </div>
            </div>
        </div>
    </div>

    <!-- Roles List -->
    <div id="listOfrole">
        <table class="table table-striped mt-2">
            <thead>
                <tr>
                    <th>#</th>
                    <th>{{ __('roles.role_name') }}</th>
                    <th>{{ __('roles.description') }}</th>
                    <th>{{ __('roles.control') }}</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($roles as $role)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $role->name }}</td>
                    <td>{{ $role->brief }}</td>
                    <td>
                        <form action="{{ route('destroy-role-info', $role->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <a href="{{ route('display-role-info', $role->id) }}">
                                <i class="fa fa-display"></i>
                            </a>
                            <button class="btn btn-sm py-0"
                                onclick="if(!confirm('{{ __('roles.delete_confirmation') }}')){return false}"
                                title="{{ __('roles.delete') }}">
                                <i class="fa fa-trash text-danger"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7">{{ __('roles.no_roles_found') }}</td>
                </tr>
                @endforelse
                <form action="{{ route('store-role-info') }}" method="POST">
                    <tr>
                        @csrf
                        <td>{{ $roles->count() + 1 }}</td>
                        <td class="sm">
                            <input style="height:32px" type="text" class="form-control" name="name" id="name" required placeholder="{{ __('roles.role_name') }}">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </td>
                        <td class="sm">
                            <input style="height:32px" type="text" class="form-control" name="brief" id="brief" placeholder="{{ __('roles.new_role_description') }}">
                            @error('brief')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </td>
                        <td>
                            <button type="submit" class="btn btn-sm btn-outline-primary">
                                <i class="fa fa-save"></i>{{ __('roles.save_role') }}
                            </button>
                        </td>
                    </tr>
                </form>
            </tbody>
        </table>
    </div>
</div>
@endsection