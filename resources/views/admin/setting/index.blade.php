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
                        
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

@endsection