@extends('layouts.admin')
@section('contents')

<div class="container-fluid">
    <div class="row">

        <div class="col-md-12">
            <div id="products-container">

                <h1 class="mt-3 pb-2" style="border-bottom: 1px solid #dedede">
                    <a href="{{ route('display-payments-list') }}" class="btn py-1 fw-bold btn-primary">Payments</a>
                    <a href="{{ route('display-payment-methods-list') }}" class="btn py-1 fw-bold btn-primary active">Payment Methods</a>
                </h1>

                <table class="table table-striped  mt-2">
                    <thead>
                        <tr>
                            <th> #</th>
                            <th>Name</th>
                            <th>Code</th>
                            <th>Status</th>
                            <th>Control</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($payments as $pm)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><i class="fa {{ $pm->icon }}"></i> {{ $pm->name }}</td>
                            <td>{{ $pm->code }}</td>
                            <td><span class="badge {{ $pm->is_active ? 'bg-success' : 'bg-danger' }}">{{ $pm->is_active ? 'Active' : 'Inactive' }}</span></td>
                            <td>
                                <a href="{{ route('view-payment-method-info', $pm->id) }}" class="btn py-0 btn-primary">View</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7">No Payments found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

@endsection