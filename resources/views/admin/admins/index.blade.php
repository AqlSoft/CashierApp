@extends('layouts.admin')
@section('contents')
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-12">
                <div id="products-container">

                    <h1 class="mt-3 pb-2" style="border-bottom: 1px solid #dedede">Client List
                        <a data-bs-toggle="modal" data-bs-target="#createNewAdmin"><span data-bs-toggle="tooltip"
                                data-bs-title="Create New Admin"></span><i class="fa fa-plus"></i></span></a>
                    </h1>
                    <!-- هنا سيتم اضافة العملاء -->
                    <div class="row">
                        <div class="col col col-12 pt-3">
                            <div class="card card-body">
                                <form action="{{ route('store-admin-info') }}" method="POST">
                                    @csrf
                                    <div class="input-group sm mb-2">
                                        <label class="input-group-text" for="vat_number">User Name</label>
                                        <input type="number" class="form-control sm" name="vat_number" id="vat_number">
                                        <label class="input-group-text" for="name">Id Number</label>
                                        <input type="text" class="form-control sm" name="name" id="name">
                                    </div>
                                    <div class="input-group sm mb-2">
                                        <label class="input-group-text" for="phone">Phone Number</label>
                                        <input type="number" class=" form-control sm " name="phone" id="phone">
                                        <label class="input-group-text" for="address">Country</label>
                                        <input type="text" class="form-control sm" name="address" id="address">
                                        <button type="reset" class="py-0 btn btn-secondary" id="add-item">reset</button>
                                    </div>

                                    <div class="input-group d-flex sm mt-2 justify-content-end">

                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="py-2" style="border-bottom: 1px solid #dedede"></div>

                    </div>
                    <!-- هنا سيتم عرض العملاء -->
                    <table class="table table-striped  mt-2">
                        <thead>
                            <tr>
                                <th> #</th>
                                <th>username</th>
                                <th>Name</th>
                                <th>email</th>
                                <th>position</th>
                                <th>Control</th>
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
                                        <form action="{{ route('destroy-admin-info', $admin->id) }}" method=post>
                                            @csrf
                                            @method('delete')
                                            <a class="btn btn-sm py-0"
                                                href="{{ route('display-admin-info', $admin->id) }}"><i
                                                    class="fas fa-eye text-success" title="View Details"></i></a>
                                            <a class="btn btn-sm py-0" href="{{ route('edit-admin-info', $admin->id) }}"><i
                                                    class="fa fa-edit text-primary"></i></a>
                                            <button class="btn btn-sm py-0"
                                                onclick="if(!confirm('You are about to delete a order, are you sure!?.')){return false}"
                                                title="Delete order and related Information"
                                                href="{{ route('destroy-admin-info', $admin->id) }}"><i
                                                    class="fa fa-trash text-danger"></i></a>
                                        </form>

                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7">No Admins has been added yet, Add your application .</td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>
    <!-- Modals -->
    <!-- Create new Admin modal -->

    <div class="modal fade mt-5 pt-5" id="createNewAdmin" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="createNewAdminLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="createNewAdminLabel">Create New Admin</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('store-admin-info') }}" method="POST">
                        @csrf
                        <div class="input-group sm mb-2">
                            <label class="input-group-text" for="first_name">First Name</label>
                            <input type="text" class="form-control sm" name="first_name" id="first_name">
                        </div>
                        @error('first_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="input-group sm mb-2">
                            <label class="input-group-text" for="last_name">Last Name</label>
                            <input type="text" class="form-control sm" name="last_name" id="last_name">
                        </div>
                        @error('last_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="input-group sm mb-2">
                            <label class="input-group-text" for="userName">User Name</label>
                            <input type="text" class=" form-control sm " name="userName" id="userName">
                        </div>
                        @error('userName')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="input-group sm mb-2">
                            <label class="input-group-text" for="email">Email</label>
                            <input type="email" class="form-control sm" name="email" id="email">
                        </div>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="input-group sm mb-2">
                            <label class="input-group-text" for="password">Password</label>
                            <input type="password" class=" form-control sm " name="password" id="password">
                        </div>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="input-group sm mb-2">
                            <label class="input-group-text" for="password_confirmation">Confirm Password</label>
                            <input type="password" class="form-control sm" name="password_confirmation"
                                id="password_confirmation">
                        </div>
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
@endsection
