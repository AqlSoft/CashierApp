
@extends('layouts.admin')
@section('title', __('admins.admins_list'))
@section('header-links')
<li class="breadcrumb-item"><a href="#">{{ __('admins.admins') }}</a></li>
<li class="breadcrumb-item active" aria-current="page">{{ __('admins.admins_list') }}</li>
@endsection
@section('contents')
<div class="container-fluid">
    <ul class="nav nav-tabs mt-3" id="myTab" role="tablist">
        <li class="nav-item d-flex">
            <button class="nav-link active my-0 py-0" id="role-admins-tab" data-bs-toggle="tab" data-bs-target="#role-admins"
                type="button" role="tab" aria-controls="role-admins" aria-selected="false">
                <a href="{{ route('admin-list') }}">{{ __('admins.admins_list') }}</a>
                <a class="btn text-secondary my-0 py-0" data-bs-toggle="modal" data-bs-target="#createNewAdmin">
                    <span data-bs-toggle="tooltip" data-bs-title="{{ __('admins.create_new_admin') }}"></span>
                    <i class="fa fa-plus"></i>
                </a>
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="roles-list-tab" data-bs-toggle="tab" data-bs-target="#roles-list"
                type="button" role="tab" aria-controls="roles-list" aria-selected="false">
                <a href="{{ route('roles-list') }}">{{ __('admins.roles_list') }}</a>
            </button>
        </li>

        <li class="nav-item">
            <button class="nav-link" id="role-permissions-tab" data-bs-toggle="tab" data-bs-target="#role-permissions"
                type="button" role="tab" aria-controls="role-permissions" aria-selected="false">
                <a href="{{ route('permissions-list') }}">{{ __('admins.permissions_list') }}</a>
            </button>
        </li>
    </ul>

    <!-- Search Section -->
    <div class="row">
        <div class="col col-12 pt-2">
            <div class="card card-body">
                <div class="input-group sm mb-2">
                    <label class="input-group-text" for="username">{{ __('admins.username') }}</label>
                    <input type="text" class="form-control sm" name="username" id="username"
                        data-url="{{ route('search-admins-by-username') }}"
                        onkeyup="getData(this, '#listOfAdmins')">
                    <label class="input-group-text" for="email">{{ __('admins.email') }}</label>
                    <input type="text" class="form-control sm" name="email" id="email"
                        data-url="{{ route('search-admins-by-email') }}"
                        onkeyup="getData(this, '#listOfAdmins')">
                </div>
                <div class="input-group sm mb-2">
                    <label class="input-group-text" for="phone">{{ __('admins.phone_number') }}</label>
                    <input type="number" class="form-control sm" name="phone" id="phone"
                        data-url="{{ route('search-admins-by-phone') }}"
                        onkeyup="getData(this, '#listOfAdmins')">
                    <label class="input-group-text" for="id_number">{{ __('admins.id_number') }}</label>
                    <input type="number" class="form-control sm" name="id_number" id="id_number"
                        data-url="{{ route('search-admins-by-id-number') }}"
                        onkeyup="getData(this, '#listOfAdmins')">
                    <button type="reset" class="py-0 btn btn-secondary" id="add-item">{{ __('admins.reset') }}</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Admins List -->
    <div id="listOfAdmins">
        <table class="table table-striped mt-2">
            <thead>
                <tr>
                    <th>#</th>
                    <th>{{ __('admins.username') }}</th>
                    <th>{{ __('admins.name') }}</th>
                    <th>{{ __('admins.email') }}</th>
                    <th>{{ __('admins.position') }}</th>
                    <th>{{ __('admins.control') }}</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($admins as $admin)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $admin->userName }}</td>
                    <td>{{ $admin->profile->full_name() }}</td>
                    <td>{{ $admin->email }}</td>
                    <td>{{ $admin->role() }}</td>
                    <td>
                        <form action="{{ route('destroy-admin-info', $admin->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <a class="btn btn-sm py-0" href="{{ route('display-admin-info', $admin->id) }}">
                                <i class="fas fa-eye text-success" title="{{ __('admins.view_details') }}"></i>
                            </a>
                            <a class="btn btn-sm py-0" href="{{ route('edit-admin-info', $admin->id) }}">
                                <i class="fa fa-edit text-primary"></i>
                            </a>
                            <button class="btn btn-sm py-0"
                                onclick="if(!confirm('{{ __('admins.delete_confirmation') }}')){return false}"
                                title="{{ __('admins.delete') }}">
                                <i class="fa fa-trash text-danger"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7">{{ __('admins.no_admins_added') }}</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Create New Admin Modal -->
<div class="modal fade mt-5 pt-5" id="createNewAdmin" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="createNewAdminLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="createNewAdminLabel">{{ __('admins.create_new_admin') }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('store-admin-info') }}" method="POST">
                    @csrf
                    <div class="input-group sm mb-2">
                        <label class="input-group-text" for="first_name">{{ __('admins.first_name') }}</label>
                        <input type="text" class="form-control sm" name="first_name" id="first_name">
                    </div>
                    <div class="input-group sm mb-2">
                        <label class="input-group-text" for="last_name">{{ __('admins.last_name') }}</label>
                        <input type="text" class="form-control sm" name="last_name" id="last_name">
                    </div>
                    <div class="input-group sm mb-2">
                        <label class="input-group-text" for="userName">{{ __('admins.username') }}</label>
                        <input type="text" class="form-control sm" name="userName" id="userName">
                    </div>
                    <div class="input-group sm mb-2">
                        <label class="input-group-text" for="email">{{ __('admins.email') }}</label>
                        <input type="email" class="form-control sm" name="email" id="email">
                    </div>
                    <div class="input-group sm mb-2">
                        <label class="input-group-text" for="password">{{ __('admins.password') }}</label>
                        <input type="password" class="form-control sm" name="password" id="password">
                    </div>
                    <div class="input-group sm mb-2">
                        <label class="input-group-text" for="password_confirmation">{{ __('admins.confirm_password') }}</label>
                        <input type="password" class="form-control sm" name="password_confirmation"
                            id="password_confirmation">
                    </div>
                    <div class="d-flex justify-content-end sm mb-2 gap-1">
                        <button type="submit" class="btn btn-sm btn-outline-primary">
                            <i class="fa fa-save"></i> {{ __('admins.save') }}
                        </button>
                        <button type="button" data-bs-dismiss="modal" class="btn btn-sm btn-outline-secondary">
                            <i class="fa fa-times"></i> {{ __('admins.cancel') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    const getData = async (el, id) => {
        const search_query = el.value.length !== 0 && el.value !== '' ? el.value : null;
        if (search_query) {
            $.ajax({
                url: el.dataset.url,
                type: 'GET',
                data: {
                    search_query: el.value
                },
                success: (users) => {
                    console.log(users)
                    $(id).html(users);
                },
                error: (xhr, status, error) => {
                    console.log(error);
                }
            })
        }
    }
</script>
@endsection