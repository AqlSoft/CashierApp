@extends('layouts.admin')
@section('contents')

<div class="container-fluid">
    <div class="row">

        <div class="col-md-12">
            <div id="products-container">

                <h1 class="mt-3 pb-2" style="border-bottom: 1px solid #dedede">
                    <a href="{{ route('display-payments-list') }}" class="btn py-1 fw-bold btn-primary active">
                        {{ __('accounts.payments') }}
                    </a>
                    <a href="{{ route('display-payment-methods-list') }}" class="btn py-1 fw-bold btn-primary">
                        {{ __('accounts.payment_methods') }}
                    </a>
                </h1>

                <table class="table table-striped mt-2">
                    <thead>
                        <tr>
                            <th># / {{ __('accounts.number') }}</th>
                            <th>{{ __('accounts.name') }}</th>
                            <th>{{ __('accounts.parent') }}</th>
                            <th>{{ __('accounts.balance') }}</th>
                            <th>{{ __('accounts.created_at') }}</th>
                            <th>{{ __('accounts.control') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($accounts as $account)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $account->name }}</td>
                            <td>{{ $account->parent?->name }}</td>
                            <td>{{ $account->balance }}</td>
                            <td>{{ $account->created_at }}</td>
                            <td>
                                <a href="{{ route('view-account-info', $account->id) }}" class="btn py-0 btn-primary">
                                    {{ __('accounts.view') }}
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7">{{ __('accounts.no_payments_found') }}</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

@endsection