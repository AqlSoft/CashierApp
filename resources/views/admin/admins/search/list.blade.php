<?php
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
            <td colspan="7">{{ __('admins.no_admins_found') }}</td>
        </tr>
        @endforelse
    </tbody>
</table>