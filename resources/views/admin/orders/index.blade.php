@extends('layouts.admin')

@section('contents')
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-12">
                <div id="products-container">

                    <h1 class="mt-3 pb-2" style="border-bottom: 1px solid #dedede">{{ __('orders.orders-list') }}
                        <a class="ms-3 add-icon" data-bs-toggle="collapse" data-bs-target="#addOrderForm" aria-expanded="false"
                            aria-controls="addOrderForm">
                            <i data-bs-toggle="tooltip" title="{{ __('orders.add_new_order') }}" class="fa fa-plus"></i>
                        </a>
                    </h1>
                    <!-- add Client modal -->
                    <div class="modal fade" id="exampleModalToggle" aria-hidden="true"
                        aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered modal-sm ">
                            <form action="/admin/clients/store" method="POST">
                                @csrf
                                <div class="modal-content">
                                    <h1 class="modal-title fs-5 mt-2  ps-3" id="exampleModalToggleLabel"
                                        style="border-bottom: 1px solid #dedede">{{ __('orders.add_new_client') }}</h1>
                                    <div class="modal-body">
                                        <div class="input-group sm mb-2">
                                            <label class="input-group-text" for="vat_number">{{ __('orders.vat_number') }}</label>
                                            <input type="number" class="form-control sm" name="vat_number" id="vat_number" value="{{ old('vat_number') }}">
                                        </div>
                                        <div class="input-group sm mb-2">
                                            <label class="input-group-text" for="name">{{ __('orders.client_name') }}</label>
                                            <input type="text" class="form-control sm" name="name" id="name" value="{{ old('name') }}">
                                        </div>
                                        <div class="input-group sm mb-2">
                                            <label class="input-group-text" for="phone">{{ __('orders.phone_number') }}</label>
                                            <input type="number" class=" form-control sm " name="phone" id="phone" value="{{ old('phone') }}">
                                        </div>
                                        <div class="input-group sm mb-2">
                                            <label class="input-group-text" for="address">{{ __('orders.address') }}</label>
                                            <input type="text" class="form-control sm" name="address" id="address" value="{{ old('address') }}">
                                        </div>
                                         @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                        <div class="input-group pt-2 px-3 mt-2 justify-content-end "
                                            style="border-top: 1px solid #dedede">
                                            <button type="button" class="btn px-3 py-1 btn-outline-secondary btn-sm"
                                                data-bs-dismiss="modal">{{ __('orders.close') }}</button>
                                            <button type="submit" class="btn px-3 py-1 btn-primary btn-sm">{{ __('orders.save_client') }}</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- هنا سيتم اضافة الطلبات -->
                    <div class="row">
                        <div class="col col-12 collapse  pt-3" id="addOrderForm">
                            <div class="row">
                                <div class="col ">
                                    <div class="card card-body">
                                        <form action="/admin/orders/store" method="POST">
                                            @csrf
                                            <div class="input-group sm mb-2">
                                                <label class="input-group-text" for="order_sn">{{ __('orders.order_sn') }}</label>
                                                <input type="number" class="form-control sm" name="order_sn" id="order_sn"
                                                    value="{{ $order_SN }}">
                                                <label class="input-group-text" for="customer_id"> {{ __('orders.client') }}</label>
                                                <select class="form-select  form-control sm py-0" name="customer_id"
                                                    id="customer_id">
                                                    @foreach ($customers as $customer)
                                                        <option value="{{ $customer->id }}"
                                                            {{ $defaultCustomer && $customer->id == $defaultCustomer->id ? 'selected' : '' }}>
                                                            {{ $customer->name }}</option>
                                                        <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                                    @endforeach
                                                </select>
                                                <label class="input-group-text" for="customer_id">
                                                    <a class="btn btn-sm py-0" href="#"
                                                        data-bs-target="#exampleModalToggle" data-bs-toggle="modal">
                                                        <i class="fa-solid fa-user-plus" title="{{ __('orders.view_details') }}"></i></a>
                                                </label>
                                                <label class="input-group-text" for="order_date">{{ __('orders.order_date') }}</label>
                                                <input type="text" value="{{ date('Y-m-d') }}" placeholder="YYYY-MM-DD"
                                                    class="fc-datepicker form-control sm " name="order_date"
                                                    id="order_date">
                                            </div>
                                            <div class="input-group sm mt-2">
                                                <label class="input-group-text" for="notes">{{ __('orders.notes') }}</label>
                                                <input type="text" class="form-control sm" name="notes"
                                                    id="notes">
                                                <div class="input-group-text">
                                                    <input class="form-check-input mt-0" name="status" type="checkbox"
                                                        value="1" aria-label="Checkbox for following text input">
                                                </div>
                                                <button type="button" class="input-group-text text-start">{{ __('orders.active') }}</button>
                                            </div>
                                            @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                            <div class="input-group d-flex sm mt-2 justify-content-end"
                                                style="border-top: 1px solid #aaa">
                                                <button type="submit" class="py-0 btn btn-primary p-3 mt-2">{{ __('orders.save_order') }}</button>
                                                <button type="reset" class="py-0 btn btn-secondary p-3 mt-2"
                                                    id="add-item">{{ __('orders.reset') }}</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                            <div class="py-2" style="border-bottom: 1px solid #dedede"></div>
                        </div>
                    </div>
                    <!-- هنا سيتم عرض المنتجات -->
                    <table class="table table-striped  mt-3">
                        <thead>
                            <tr>
                                <th> #</th>
                                <th>{{ __('orders.order_sn') }}</th>
                                <th>{{ __('orders.client_name') }}</th>
                                <th>{{ __('orders.order_date') }}</th>
                                <th>{{ __('orders.status') }}</th>
                                <th>{{ __('orders.control') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $counter = 0;
                            @endphp
                            @if (count($orders))
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ ++$counter }}</td>
                                        <td>{{ $order->order_sn }}</td>
                                        <td>{{ @$order->customer->name }}</td>
                                        <td>{{ $order->order_date }}</td>
                                        <td>
                                            @if ($order->status == 1)
                                                <span class="badge bg-primary">{{ $status[$order->status] }}</span>
                                            @elseif($order->status == 2)
                                                <span class="badge bg-warning">{{ $status[$order->status] }}</span>
                                            @elseif($order->status == 3)
                                                <span class="badge bg-secondary">{{ $status[$order->status] }}</span>
                                            @elseif($order->status == 4)
                                                <span class="badge bg-info">{{ $status[$order->status] }}</span>
                                            @elseif($order->status == 5)
                                                <span class="badge bg-success">{{ $status[$order->status] }}</span>
                                            @else
                                                <span class="badge bg-danger">{{ $status[$order->status] }}</span>
                                            @endif
                                        </td>

                                        <td>
                                            @if ($order->status == 1 || $order->status == 2)
                                                <a class="btn btn-sm py-0 p-0" data-bs-toggle="tooltip"
                                                    title="{{ __('orders.add_order_item') }}"
                                                    href="{{ route('add-orderitem', [$order->id]) }}"><i
                                                        class="fa fa-square-plus text-success"></i></a>
                                                <a class="btn btn-sm py-0"
                                                    href="{{ route('edit-order-info', $order->id) }}"><i
                                                        class="fa fa-edit text-primary"></i></a>
                                                <a class="btn btn-sm py-0"
                                                    onclick="if(!confirm('{{ __('orders.confirm_archive') }}')){return false}"
                                                    title="{{ __('orders.archive_order') }}"
                                                    href="{{ route('destroy-order-info', $order->id) }}">
                                                    <i class="fa fa-trash text-danger"></i></a>
                                            @endif
                                            <a class="btn btn-sm py-0"
                                                href="{{ route('view-order-info', $order->id) }}"><i
                                                    class="fas fa-eye text-success" title="{{ __('orders.view_details') }}"></i></a>
                                            @if ($order->status == 5)
                                                <a class="btn btn-sm py-0 p-0" data-bs-toggle="tooltip"
                                                    title="{{ __('orders.print_order') }}" href="#"><i
                                                        class="fa fa-print text-secondary"></i></a>
                                            @endif
                                            @if ($order->status == 0)
                                                <a class="btn btn-sm py-0"
                                                    onclick="if(!confirm('{{ __('orders.confirm_archive') }}')){return false}"
                                                    title="{{ __('orders.archive_order') }}"
                                                    href="{{ route('destroy-order-info', $order->id) }}"><i
                                                        class="fa fa-trash text-danger"></i></a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="7">{{ __('orders.no_orders_yet') }}</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <script>
        var date = $('.fc-datepicker').datepicker({
            dateFormat: 'yy-mm-dd'
        }).val();
    </script>
@endsection