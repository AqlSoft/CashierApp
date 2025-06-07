


@section('title', __('taxes.tax-management'))

<div class="row">
    <div class="col-12">
        <div class="w-100">
            <h1 class="mt-3 pb-2" style="border-bottom: 1px solid #dedede">
                {{ __('taxes.tax-list') }}
                <a class="ms-3 add-icon" href="{{ route('taxes.create') }}">
                    <i data-bs-toggle="tooltip" title="{{ __('taxes.add-tax') }}" class="fa fa-plus"></i>
                </a>
            </h1>
            <div>
                <table id="taxes-table" class="table table-striped mt-2 table-sm w-100">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ __('taxes.tax-code') }}</th>
                            <th>{{ __('taxes.tax-name') }}</th>
                            <th>{{ __('taxes.tax-type') }}</th>
                            <th>{{ __('taxes.tax-rate') }}</th>
                            <th>{{ __('taxes.status') }}</th>
                            <th>{{ __('taxes.effective-date') }}</th>
                            <th>{{ __('taxes.actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($taxes as $tax)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $tax->tax_code }}</td>
                            <td>{{ $tax->tax_name }}</td>
                            <td>
                                @if($tax->tax_type === 'PERCENTAGE')
                                    <span class="badge bg-info">{{ __('taxes.percentage') }}</span>
                                @else
                                    <span class="badge bg-secondary">{{ __('taxes.fixed') }}</span>
                                @endif
                            </td>
                            <td>{{ $tax->formatted_tax_rate }}</td>
                            <td>
                                @if($tax->is_active)
                                    <span class="badge bg-success">{{ __('taxes.active') }}</span>
                                @else
                                    <span class="badge bg-danger">{{ __('taxes.inactive') }}</span>
                                @endif
                            </td>
                            <td>
                                {{ $tax->effective_from->format('Y-m-d') }}
                                @if($tax->effective_to)
                                    <br>{{ __('taxes.to') }} {{ $tax->effective_to->format('Y-m-d') }}
                                @endif
                            </td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('admin.taxes.show', $tax) }}" class="btn btn-sm btn-info" title="{{ __('taxes.show') }}">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.taxes.edit', $tax) }}" class="btn btn-sm btn-primary" title="{{ __('taxes.edit') }}">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button type="button" class="btn btn-sm btn-danger delete-tax" data-id="{{ $tax->id }}" title="{{ __('taxes.delete') }}">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                {{ $taxes->links() }}
            </div>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">{{ __('taxes.delete') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('taxes.cancel') }}">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>{{ __('taxes.delete_confirm') }}</p>
                <p class="text-danger">{{ __('taxes.delete_warning') }}</p>
            </div>
            <div class="modal-footer">
                <form id="deleteForm" method="POST" action="">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('taxes.cancel') }}</button>
                    <button type="submit" class="btn btn-danger">{{ __('taxes.delete') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    $(document).ready(function() {
        // Initialize DataTable
        $('#taxes-table').DataTable({
            "paging": false,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": false,
            "autoWidth": false,
            "responsive": true,
            "language": {
                "url": "{{ asset('adminlte/plugins/datatables/arabic.json') }}"
            }
        });

        // Delete button click handler
        $('.delete-tax').on('click', function() {
            const taxId = $(this).data('id');
            const form = $('#deleteForm');
            form.attr('action', `/admin/taxes/${taxId}`);
            $('#deleteModal').modal('show');
        });
    });
</script>
@endpush