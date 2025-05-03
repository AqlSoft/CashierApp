@extends('layouts.admin')

@section('contents')
<div class="container-fluid">
    <div class="row">

        <div class="col-md-12">
            <div id="products-container">

                <h1 class="mt-3 pb-2" style="border-bottom: 1px solid #dedede">Invoices List
                </h1>
                <!-- هنا سيتم عرض الفواتير -->

                <table class="table table-striped  mt-2">
                    <thead>
                        <tr>
                            <th> #</th>
                            <th>Number</th>
                            <th>Date</th>
                            <th>Client</th>
                            <th>Amount</th>
                            <th>Payment Method</th>
                            <th>Control</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($invoices as $invoice)
                        {{ $invoice }}
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $invoice->number }}</td>
                            <td>{{ $invoice->date }}</td>
                            <td>{{ $invoice->customer }}</td>
                            <td>{{ $invoice->amount }}</td>
                            <td>{{ $invoice->payment_method }}</td>
                            <td>
                                <a href="{{ route('view-invoice', $invoice->id) }}" class="btn btn-primary">View</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7">No invoices found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
@endsection