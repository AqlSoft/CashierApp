@extends('layouts.admin')
@section('contents')

<div class="container-fluid">
    <div class="row">

        <div class="col-md-12">
            <div id="products-container">

                <h1 class="mt-3 pb-2" style="border-bottom: 1px solid #dedede">
                    <a href="{{ route('display-payments-list') }}" class="btn py-1 fw-bold btn-primary active">Payments</a>
                    <a href="{{ route('display-payment-methods-list') }}" class="btn py-1 fw-bold btn-primary">Payment Methods</a>
                </h1>

                <table class="table table-striped  mt-2">
                    <thead>
                        <tr>
                            <th> #</th>
                            <th>Invoice</th>
                            <th>Date</th>
                            <th>Client</th>
                            <th>Amount</th>
                            <th>Payment Method</th>
                            <th>Control</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($payments as $payment)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $payment->invoice->invoice_number }}</td>
                            <td>{{ $payment->created_at }}</td>
                            <td>{{ $payment->order->customer->name }}</td>
                            <td>{{ $payment->invoice->total_amount }}</td>
                            <td>{{ $payment->pymtMethod->name }}</td>
                            <td>
                                <a href="{{ route('view-payment-info', $payment->id) }}" class="btn py-0 btn-primary">View</a>
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