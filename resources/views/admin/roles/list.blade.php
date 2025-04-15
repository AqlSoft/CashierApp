@extends('layouts.admin')

@section('title', 'Roles List')

@section('header-links')
<li class="breadcrumb-item"><a href="#">Admins</a></li>
<li class="breadcrumb-item active" aria-current="page">Roles List</li>
@endsection

@section('contents')
<div class="container-fluid">
    <ul class="nav nav-tabs mt-3" id="myTab" role="tablist">
        <li class="nav-item">
            <button class="nav-link" id="role-admins-tab" data-bs-toggle="tab" data-bs-target="#role-admins"
                type="button" role="tab" aria-controls="role-admins" aria-selected="false"><a href="{{ route('admin-list')}}">Admins List</a></button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="roles-list-tab" data-bs-toggle="tab"
                data-bs-target="#roles-list" type="button" role="tab" aria-controls="roles-list"
                aria-selected="false"><a href="{{ route('roles-list')}}">Roles List</a></button>
        </li>

        <li class="nav-item">
            <button class="nav-link" id="role-permissions-tab" data-bs-toggle="tab" data-bs-target="#role-permissions"
                type="button" role="tab" aria-controls="role-permissions" aria-selected="false"><a href="{{ route('permissions-list')}}">Permissions List</a></button>
        </li>

    </ul>

    <h4 class="btn btn-outline-secondary mt-2">Roles List</h4>

    <!-- هنا سيتم اضافة العملاء -->
    <div class="row">

        <div class="col col col-12 pt-3">
            <div class="card card-body">
                <div class="input-group sm mb-2">
                    <label class="input-group-text" for="name">Role Name</label>
                    <input type="text" class="form-control sm" name="name" id="name"
                        data-url="{{route('search-roles-by-name')}}"
                        onkeyup="getData(this, '#listOfAdmins')">

                </div>

            </div>
        </div>
    </div>

    <!-- هنا سيتم عرض العملاء -->
    <div id="listOfrole">
        <table class="table table-striped  mt-2">
            <thead>
                <tr>
                    <th> #</th>
                    <th>Role Name</th>
                    <th>Description</th>
                    <th>Control</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($roles as $role)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $role->name }}</td>
                    <td>{{ $role->brief }}</td>
                    <td>
                        <form action="{{ route('destroy-role-info', $role->id) }}" method=post>
                            @csrf
                            @method('delete')
                            <a href="{{route('display-role-info', $role->id)}}">
                                <i class="fa fa-display"></i>
                            </a>
                            <button class="btn btn-sm py-0"
                                onclick="if(!confirm('You are about to delete a order, are you sure!?.'))
                                            {return false}"
                                title="Delete order and related Information">
                                <i class="fa fa-trash text-danger"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7">No roles has been added yet, Add your application .</td>
                </tr>
                @endforelse
                <form action="{{ route('store-role-info') }}" method="POST">
                    <tr>
                        @csrf
                        <td>{{ $roles->count() + 1 }}</td>
                        <td class="sm">
                            <input style="height:32px" type="text" class="form-control" name="name" id="name" required placeholder="Role Name">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </td>
                        <td class="sm">
                            <input style="height:32px" type="text" class="form-control" name="brief" id="brief" placeholder="New Role with no description">
                            @error('brief')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </td>
                        <td class="">
                            <button type=submit class="btn btn-sm btn-outline-primary"><i
                                    class="fa fa-save"></i>Save Role</button>
                        </td>
                    </tr>
                </form>
            </tbody>
        </table>
    </div>
</div>

<!-- Modals -->
<!-- Create new role modal -->


@endsection