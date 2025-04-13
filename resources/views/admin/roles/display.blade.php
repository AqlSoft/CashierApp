@extends('layouts.admin')
@section ('title', 'Users Roles')
@section('header-links')
<li class="breadcrumb-item"><a href="#">Admins</a></li>
<li class="breadcrumb-item"><a href="#">Roles</a></li>
<li class="breadcrumb-item active" aria-current="page">Role Details</li>
@endsection
@section('contents')
<div class="container-fluid">




    <!-- تبويبات التنقل -->
    <ul class="nav nav-tabs mt-3" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="roles-list-tab" data-bs-toggle="tab"
                data-bs-target="#roles-list" type="button" role="tab" aria-controls="roles-list"
                aria-selected="false"><a href="{{ route('roles-list')}}">Roles List</a></button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="basic-info-tab" data-bs-toggle="tab"
                data-bs-target="#basic-info" type="button" role="tab" aria-controls="basic-info"
                aria-selected="true">Basic Info</button>
        </li>
        <li class="nav-item">
            <button class="nav-link" id="role-admins-tab" data-bs-toggle="tab" data-bs-target="#role-admins"
                type="button" role="tab" aria-controls="role-admins" aria-selected="false">Attached To:</button>
        </li>
        <li class="nav-item">
            <button class="nav-link" id="role-permissions-tab" data-bs-toggle="tab" data-bs-target="#role-permissions"
                type="button" role="tab" aria-controls="role-permissions" aria-selected="false">Role Permissions</button>
        </li>

    </ul>

    <div class="tab-content" id="roleInfo">
        <div class="tab-pane fade show active" id="basic-info" role="tabpanel" aria-labelledby="basic-info-tab">
            <div class="row">
                <div class="col col-12 mb-3 p-1">
                    <h4 class="btn btn-outline-secondary mb-3">Edit Role Basic Info</h4>
                    <form action="{{ route('update-role-info') }}" method="POST">
                        <div class="card-body">
                            @csrf
                            @method('put')
                            <input type="hidden" name="id" value="{{ $role->id }}">
                            <div class="input-group sm mb-2">
                                <label class="input-group-text" for="name">Role Name</label>
                                <input type="text" class=" form-control sm " name="name" id="name"
                                    value="{{ old('name', $role) }}">
                            </div>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <div class="input-group sm mb-2">
                                <label class="input-group-text" for="brief">{{ __('Brief')}}</label>
                                <input type="brief" class="form-control sm" name="brief" id="brief"
                                    value="{{ old('brief', $role) }}">
                            </div>
                            @error('brief')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                            <div class="input-group sm mb-2">
                                <label class="input-group-text" for="status">{{ __('Status') }}</label>
                                <select class="form-select sm" name="status" id="status">
                                    <option {{$role->status}} {{ $role->status ? 'selected' : ''}} value="1"> {{ __('Active') }} </option>
                                    <option {{ !$role->status ? 'selected' : ''}} value="0"> {{ __('In-Active') }} </option>
                                </select>
                            </div>
                            @error('status')
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

                    <h4 class="btn btn-outline-secondary mb-3">Edit Role Basic Info</h4>
                    <form action="{{route('destroy-role-info', $role->id)}}" method="POST">
                        @csrf
                        @method('delete')

                        <div class="input-group sm mb-2">
                            <input type="text" class="form-control" name="name" id="name" required placeholder="Role Name">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="role-admins" role="tabpanel" aria-labelledby="role-admins-tab">
            <div class="row">
                <div class="col col-12 mb-3 p-1">
                    <h4 class="btn btn-outline-secondary mb-3">Attached To</h4>
                    <ul>
                        @foreach($role->admins as $admin)
                        {{$loop->iteration}}
                        <li>{{ $admin->profile->full_name()}}</li>
                        @endforeach
                    </ul>

                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="role-permissions" role="tabpanel" aria-labelledby="role-permissions-tab">
            <div class="row">
                <div class="col col-12 mb-3 p-1">
                    <h4 class="btn btn-outline-secondary mb-3">Role Permissions</h4>
                    <div class="accordion accordion-flush" id="permissionsAccordion">
                        <input type="hidden" id="role_id" value="{{ $role->id }}">
                        @forelse ($permissions as $module => $group)
                        <div class="accordion-item shadow-sm rounded ">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed py-2 fw-bold {{$loop->first ? 'rounded-top' : ''}} {{$loop->last ? 'rounded-bottom' : ''}}" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse{{$module}}" aria-expanded="false" aria-controls="flush-collapse{{$module}}">
                                    {{ ucwords(str_replace('-', ' ', $module)) }}
                                </button>
                            </h2>
                            <div id="flush-collapse{{$module}}" class="accordion-collapse collapse" data-bs-parent="#permissionsAccordion">
                                <div class="accordion-body">
                                    <div class="row gap-0">
                                        @foreach ($group as $permission)
                                        <div class="col col-md-4 mb-2 px-1">
                                            <div class="permission btn w-100 btn-{{ $role->permissions->contains($permission->id) ? 'success' : 'outline-secondary' }}"
                                                data-permission_id="{{ $permission->id }}"
                                                data-is-role-permission="{{ $role->permissions->contains($permission->id) ? 1 : 0 }}">
                                                {{$permission->parseName()}}
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div>No permissions has been added yet, Add your application .</div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
        <div id="message" class="alert" style="display: none;"></div>
    </div>
    <script>
        $(document).ready(function() {
            const role_id = $('#role_id').val();
            $('.permission').click(function() {
                let url = '';
                const button = $(this); // حفظ المرجع للزر الحالي
                const rp = button.data('is-role-permission');

                if (!rp) {
                    url = "{{ route('attach-permission-to-role', ['000']) }}".replace('000', role_id);
                } else {
                    url = "{{ route('detach-permission-from-role', ['000']) }}".replace('000', role_id);
                }
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: {
                        role_id: role_id,
                        permission_id: button.data('permission_id'),
                        _token: '{{ csrf_token() }}'
                    },
                    success:  function(response) {
                        setTimeout(() => {
                            if (response.action == 'attach') {
                                $('#message').attr('class', 'alert alert-success').text(response.message).show();
                                button.removeClass('btn-outline-secondary').addClass('btn-success');
                                button.data('is-role-permission', 1); // تحديث حالة البيانات
                            } else if (response.action == 'detach') {
                                console.log(response)
                                $('#message').attr('class', 'alert alert-info').text(response.message).show();
                                button.removeClass('btn-success').addClass('btn-outline-secondary');
                                button.data('is-role-permission', 0); // تحديث حالة البيانات
                            }
                        }, 100);
                        setTimeout(() => {
                            $('#message').slideUp(300);
                        }, 2000);
                    },
                    error: function(error) {
                        $('#message').removeClass('alert-success').addClass('alert-danger').text(error.message).show();
                    }
                });
            });
        });
    </script>
    @endsection