@extends('layouts.admin')
@section('contents')

<div class="container-fluid">
    <div class="row">

        <div class="col-md-12">
            <div id="products-container">

                <h1 class="mt-3 pb-2" style="border-bottom: 1px solid #dedede">
                    <a href="{{ route('display-payments-list') }}" class="btn py-1 fw-bold btn-primary active">
                        {{ __('payments.payments') }}
                    </a>
                    <a href="{{ route('display-payment-methods-list') }}" class="btn py-1 fw-bold btn-primary">
                        {{ __('payments.payment_methods') }}
                    </a>
                </h1>

                <table class="table table-striped mt-2">
                    <thead>
                        <tr>
                            <th># / {{ __('payments.number') }}</th>
                            <th>{{ __('payments.invoice') }}</th>
                            <th>{{ __('payments.date') }}</th>
                            <th>{{ __('payments.client') }}</th>
                            <th>{{ __('payments.amount') }}</th>
                            <th>{{ __('payments.payment_method') }}</th>
                            <th>{{ __('payments.control') }}</th>
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
                                <a href="{{ route('view-payment-info', $payment->id) }}" class="btn py-0 btn-primary">
                                    {{ __('payments.view') }}
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7">{{ __('payments.no_payments_found') }}</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

@endsection