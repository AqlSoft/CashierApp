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
            <td colspan="7">No Admins maches your query .</td>
        </tr>
        @endforelse
    </tbody>
</table>