@extends('layouts.admin')
@section('contents')

<div class="container-fluid">
    <div class="row">

        <div class="col-md-12">
            <div id="products-container">

                <h1 class="mt-3 pb-2" style="border-bottom: 1px solid #dedede">
                    <a href="{{ route('display-payments-list') }}" class="btn py-1 fw-bold btn-primary">
                        {{ __('payment-meth.payments') }}
                    </a>
                    <a href="{{ route('display-payment-methods-list') }}" class="btn py-1 fw-bold btn-primary active">
                        {{ __('payment-meth.payment_methods') }}
                    </a>
                </h1>

                <table class="table table-striped mt-2">
                    <thead>
                        <tr>
                            <th># / {{ __('payment-meth.number') }}</th>
                            <th>{{ __('payment-meth.name') }}</th>
                            <th>{{ __('payment-meth.code') }}</th>
                            <th>{{ __('payment-meth.status') }}</th>
                            <th>{{ __('payment-meth.control') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($payments as $pm)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><i class="fa {{ $pm->icon }}"></i> {{ $pm->name }}</td>
                            <td>{{ $pm->code }}</td>
                            <td>
                                <span class="badge {{ $pm->is_active ? 'bg-success' : 'bg-danger' }}">
                                    {{ $pm->is_active ? __('payment-meth.active') : __('payment-meth.inactive') }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('view-payment-method-info', $pm->id) }}" class="btn py-0 btn-primary">
                                    {{ __('payment-meth.view') }}
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7">{{ __('payment-meth.no_payments_found') }}</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

@endsection