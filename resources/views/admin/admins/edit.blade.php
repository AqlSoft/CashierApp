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
                    <!-- هنا سيتم اضافة العملاء -->
                    <div class="mt-3">
                        <form action="{{ route('update-admin-info') }}" method="POST">
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
                                <button type=submit class="input-group-text btn btn-sm btn-outline-primary"><i
                                        class="fa fa-save"></i>Save User</button>
                                <button type="button" data-bs-dismiss="modal"
                                    class="input-group-text btn btn-sm btn-outline-secondary"><i
                                        class="fa fa-times"></i>Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
