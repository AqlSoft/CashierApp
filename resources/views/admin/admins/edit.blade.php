@extends('layouts.admin')
@section('contents')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div id="products-container">

                <ul class="nav nav-tabs my-2" id="myTab" role="tablist">
                    <li class="nav-item">
                        <button class="nav-link" id="role-admins-tab" data-bs-toggle="tab" data-bs-target="#role-admins"
                            type="button" role="tab" aria-controls="role-admins" aria-selected="false">
                            <a href="{{ route('admin-list') }}">{{ __('admins.admins_list') }}</a>
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="edit-admin-info-tab" data-bs-toggle="tab"
                            data-bs-target="#edit-admin-info" type="button" role="tab" aria-controls="edit-admin-info"
                            aria-selected="true">{{ __('admins.edit_admin_info') }}</button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" id="admin-permissions-tab" data-bs-toggle="tab" data-bs-target="#admin-permissions"
                            type="button" role="tab" aria-controls="admin-permissions" aria-selected="false">{{ __('admins.permissions') }}</button>
                    </li>
                </ul>

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="edit-admin-info" role="tabpanel" aria-labelledby="edit-admin-info" tabindex="0">
                        <div class="row">
                            <div class="col col-8 mb-3 p-1">
                                <div class="card w-100">
                                    <div class="card-header">
                                        <h5 class="card-title py-2">
                                            {{ __('admins.account_basic_info') }}
                                        </h5>
                                    </div>
                                    <form action="{{ route('update-admin-info') }}" method="POST">
                                        <div class="card-body">
                                            @csrf
                                            @method('put')

                                            <div class="input-group sm mb-2">
                                                <label class="input-group-text" for="userName">{{ __('admins.username') }}</label>
                                                <input type="text" class="form-control sm" name="userName" id="userName"
                                                    value="{{ old('userName', $admin->profile) }}">
                                            </div>
                                            @error('userName')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                            <div class="input-group sm mb-2">
                                                <label class="input-group-text" for="email">{{ __('admins.email') }}</label>
                                                <input type="email" class="form-control sm" name="email" id="email"
                                                    value="{{ old('email', $admin->profile) }}">
                                            </div>
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror

                                            <div class="input-group sm mb-2">
                                                <label class="input-group-text" for="role_name">{{ __('admins.role') }}</label>
                                                <select class="form-select sm" name="role_name" id="role_name"
                                                    value="{{ old('role_name', $admin->profile) }}">
                                                    <option hidden>{{ __('admins.select_role') }}</option>
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
                                            <button type="submit" class="btn py-0 btn-outline-primary">
                                                <i class="fa fa-save me-2"></i>{{ __('admins.update') }}
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            {{-- Change Password --}}
                            <div class="col col-4 mb-3 p-1">
                                <div class="card w-100">
                                    <div class="card-header">
                                        <h5 class="card-title py-2">{{ __('admins.change_password') }}</h5>
                                    </div>
                                    <form action="{{ route('update-admin-password') }}" method="POST">
                                        @csrf
                                        <div class="card-body">
                                            <div class="input-group sm mb-2">
                                                <label class="input-group-text" for="current_password">{{ __('admins.current_password') }}</label>
                                                <input type="password" class="form-control sm" name="current_password" id="current_password">
                                            </div>
                                            <div class="input-group sm mb-2">
                                                <label class="input-group-text" for="new_password">{{ __('admins.new_password') }}</label>
                                                <input type="password" class="form-control sm" name="password" id="new_password">
                                            </div>
                                            <div class="input-group sm mb-2">
                                                <label class="input-group-text" for="password_confirmation">{{ __('admins.confirm_password') }}</label>
                                                <input type="password" class="form-control sm" name="password_confirmation" id="password_confirmation">
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="d-flex justify-content-end">
                                                <button class="btn btn-outline-primary py-0" type="submit">{{ __('admins.update_password') }}</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            {{-- Profile Legal Info --}}
                            <div class="col col-6 mb-3 p-1">
                                <div class="card w-100">
                                    <div class="card-header">
                                        <h5 class="card-title py-2">{{ __('admins.profile_identity') }}</h5>
                                    </div>
                                    <form action="{{ route('update-admin-info') }}" method="POST">
                                        @csrf
                                        @method('put')

                                        <div class="input-group sm mb-2">
                                            <label class="input-group-text" for="first_name">{{ __('admins.first_name') }}</label>
                                            <input type="text" class="form-control sm" name="first_name" id="first_name" value="{{ old('first_name', $admin->profile) }}">
                                        </div>
                                        @error('first_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        <div class="input-group sm mb-2">
                                            <label class="input-group-text" for="last_name">{{ __('admins.last_name') }}</label>
                                            <input type="text" class="form-control sm" name="last_name" id="last_name" value="{{ old('last_name', $admin->profile) }}">
                                        </div>
                                        @error('last_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="card-footer">
                                        <div class="d-flex justify-content-end">
                                            <button type="submit" class="btn py-0 btn-outline-primary">
                                                <i class="fa fa-save me-2"></i>{{ __('admins.update') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        {{-- Admin Roles Assignment --}}
                        <div class="col col-12 mb-3 p-1">
                            <div class="card w-100">
                                <div class="card-header">
                                    <h5 class="card-title py-2">{{ __('admins.admin_roles_assignment') }}</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <input type="hidden" name="admin_id" id="admin_id" value="{{ $admin->id }}">
                                        @forelse($roles as $role)
                                        <div class="col col-md-6">
                                            <div class="form-check form-switch">
                                                <input class="admin-role form-check-input" {{ $admin->roles->contains($role->id) ? 'checked' : '' }} type="checkbox" role="switch" id="switch_{{ $role->id }}" name="roles[]" value="{{ $role->id }}">
                                                <label class="form-check-label" for="switch_{{ $role->id }}">{{ $role->name }}</label>
                                            </div>
                                        </div>
                                        @empty
                                        <p>{{ __('admins.no_roles_found') }}</p>
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Admin Permissions --}}
                    <div class="tab-pane fade" id="admin-permissions" role="tabpanel" aria-labelledby="admin-permissions" tabindex="0">
                        <h5>{{ __('admins.admin_permissions') }}</h5>
                        <div class="row">
                            @forelse($admin->permissions as $ap)
                            <div class="mb-2">
                                <div class="border rounded px-3 py-2">
                                    <div class="fw-bold" {{ $admin->hasPermission($ap->id) ? 'checked' : '' }}>
                                        {{ $ap->permission->parseName() }} [ <span class="text-success">{{ ucfirst($ap->permission->module) }}</span> ]
                                    </div>
                                    <div class="permissionBrief">
                                        {{ $ap->permission->brief }}
                                    </div>
                                </div>
                            </div>
                            @empty
                            <p>{{ __('admins.no_permissions_found') }}</p>
                            @endforelse
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div id="message" class="alert" style="display: none;"></div>
</div>
<script>
    $(document).ready(function() {
        const adminId = $('#admin_id').val();
        $('.admin-role.form-check-input').change(function() {
            let url = '';
            if ($(this).is(':checked')) {
                url = "{{ route('attach-role-to-admin', ['000']) }}".replace('000', adminId);
            } else {
                url = "{{ route('detach-role-from-admin', ['000']) }}".replace('000', adminId);
            }
            $.ajax({
                url: url,
                type: 'POST',
                data: {
                    role_id: $(this).val(),
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    $('#message').removeClass('alert-danger').addClass('alert-success').text(response.message).show();
                    setTimeout(() => {
                        $('#message').slideUp(300);
                    }, 2000);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });
    });
</script>
@endsection