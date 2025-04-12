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
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="roles-list-tab" data-bs-toggle="tab"
                data-bs-target="#roles-list" type="button" role="tab" aria-controls="roles-list"
                aria-selected="false"><a href="{{ route('roles-list')}}">Roles List</a></button>
        </li>

        <li class="nav-item">
            <button class="nav-link" id="role-admins-tab" data-bs-toggle="tab" data-bs-target="#role-admins"
                type="button" role="tab" aria-controls="role-admins" aria-selected="false"><a href="{{ route('admin-list')}}">Admins List</a></button>
        </li>
        <li class="nav-item">
            <button class="nav-link active" id="role-permissions-tab" data-bs-toggle="tab" data-bs-target="#role-permissions"
                type="button" role="tab" aria-controls="role-permissions" aria-selected="false"><a href="{{ route('permissions-list')}}">Permissions List</a> &nbsp; <a class="fa fa-plus"></a></button>
        </li>

    </ul>

    <form action="{{ route('store-permission-info') }}" method="POST">
        <div class="row">
            @csrf
            <div class="col col-md-1">{{ $permissions->count() + 1 }}</div>
            <div class="col col-md-3">
                <input style="height:32px" type="text" class="form-control" name="name" id="name" required placeholder="Permission Name">
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="col col-md-5">
                <input style="height:32px" type="text" class="form-control" name="brief" id="brief" placeholder="New Permission with no description">
                @error('brief')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="col col-md-1">
                <select style="height:32px" class="form-select" name="module" id="module" required>
                    <option hidden>Select</option>
                    @foreach ($modules as $module)
                    <option {{ old('module') == $module ? 'selected' : ''}} value="{{ $module }}">{{ ucfirst($module) }}</option>
                    @endforeach
                </select>
                @error('module')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="col col-md-1">
                <button type=submit class="btn btn-sm btn-outline-primary"><i
                        class="fa fa-save"></i> &nbsp; Save</button>
            </div>
        </div>
    </form>

    <!-- هنا سيتم تصفية وبحث الصلاحيات -->
    <div class="row">
        <div class="col col col-12 pt-2">
            <div class="input-group sm mb-2">
                <label class="input-group-text" for="name">Permission Name</label>
                <input type="text" class="form-control sm" name="name" id="name"
                    data-url="{{route('search-permissions-by-name')}}"
                    onkeyup="getData(this, '#listOfPermissions')">
            </div>
        </div>
    </div>

    <!-- هنا سيتم عرض قائمة الصلاحيات -->

    <div id="listOfPermissions">


        <div class="accordion accordion-flush" id="permissionsAccordion">
            @forelse ($permissions as $module => $group)
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed py-2" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse{{$module}}" aria-expanded="false" aria-controls="flush-collapse{{$module}}">
                        {{ ucfirst($module) }}
                    </button>
                </h2>
                <div id="flush-collapse{{$module}}" class="accordion-collapse collapse" data-bs-parent="#permissionsAccordion">
                    <div class="accordion-body">
                        <div class="row">
                            @foreach ($group as $permission)
                            <a class="col col-md-4" href="{{ route('display-permission-info', $permission->id) }}">{{$permission->parseName()}}</a>
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