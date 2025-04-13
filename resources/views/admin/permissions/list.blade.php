@extends('layouts.admin')
@section ('title', 'Permissions List')
@section('header-links')
<li class="breadcrumb-item"><a href="#">Admins</a></li>
<li class="breadcrumb-item"><a href="#">Permissions</a></li>
<li class="breadcrumb-item active" aria-current="page">Permissions List</li>
@endsection
@section('contents')
<div class="container-fluid">
    <ul class="nav nav-tabs mt-3" id="myTab" role="tablist">

        <li class="nav-item">
            <button class="nav-link" id="role-admins-tab" data-bs-toggle="tab" data-bs-target="#role-admins"
                type="button" role="tab" aria-controls="role-admins" aria-selected="false"><a href="{{ route('admin-list')}}">Admins List</a></button>
        </li>

        <li class="nav-item" role="presentation">
            <button class="nav-link" id="roles-list-tab" data-bs-toggle="tab"
                data-bs-target="#roles-list" type="button" role="tab" aria-controls="roles-list"
                aria-selected="false"><a href="{{ route('roles-list')}}">Roles List</a></button>
        </li>

        <li class="nav-item">
            <button class="nav-link active" id="role-permissions-tab" data-bs-toggle="tab" data-bs-target="#role-permissions"
                type="button" role="tab" aria-controls="role-permissions" aria-selected="false">
                <a href="{{ route('permissions-list')}}">Permissions List</a> &nbsp;
                <a data-bs-toggle="collapse" data-bs-target="#createNewPermission" aria-expanded="false" aria-controls="createNewPermission"
                    class="fa fa-plus"></a></button>
        </li>

        <li class="nav-item p-0 w-50">
            <!-- هنا سيتم تصفية وبحث الصلاحيات -->
            <div class="input-group sm">
                <label class="input-group-text" for="name"><i class="fa fa-address-card"></i></label>
                <input type="text" class="form-control sm" name="name" id="name"
                    data-url="{{route('search-permissions-by-name')}}"
                    onkeyup="getData(this, '#listOfPermissions')">
            </div>

        </li>

    </ul>
    <div class="py-2">
        <div class="collapse show" id="createNewPermission">
            <form class="p-3 border bg-light" action="{{ route('store-permission-info') }}" method="POST">
                @csrf
                <div class="input-group sm mb-2">
                    <label class="input-group-text">{{__('Name')}}</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
                    <label class="input-group-text">{{__('Permission Group')}}</label>
                    <select class="form-select" name="module" id="module" required>
                        <option value="" hidden>Select</option>
                        @foreach ($modules as $module)
                        <option {{ old('module') == $module ? 'selected' : ''}} value="{{ $module }}">{{ ucfirst($module) }}</option>
                        @endforeach
                    </select>
                    @error('module')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="input-group sm mb-2">
                    <label class="input-group-text">{{__('Description')}}</label>
                    <input type="text" class="form-control" name="brief" id="brief" value="{{ old('brief') }}" placeholder="New Permission with no description">
                    <button type=submit class="btn btn-sm btn-outline-primary"><i
                            class="fa fa-save"></i> &nbsp; Save</button>
                    @error('brief')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
        </div>
        </form>
    </div>
</div>



<!-- هنا سيتم عرض قائمة الصلاحيات -->

<div id="listOfPermissions">


    <div class="accordion accordion-flush" id="permissionsAccordion">
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
                            <a class="btn w-100 btn-outline-secondary" href="{{ route('display-permission-info', $permission->id) }}">{{$permission->parseName()}}</a>
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

<!-- Modals -->
<!-- Create new role modal -->

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