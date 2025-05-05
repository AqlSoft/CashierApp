@extends('layouts.admin')

@section('contents')
<h1 class="mt-3">Orders Home</h1>
<div class="row">
    <div class="col-9">
        <div class="card card-home my-3 mx-4">
            <div class="card-header py-2 px-3">
                General
            </div>
            <div class="card-body pt-0 pb-3">
                <div class="row ">
                    <a class="col col-4 setting-item text-secondary" href="/admin/orders/index">
                        <div class="row mt-3">
                            <div class="col item-text">
                                <p class="my-0"><i class="fa-solid fa-cubes  px-2"></i> All Orders</p>
                                <small>List of Available Orders</small>
                            </div>
                        </div>
                    </a>

                    <a class="col col-4 setting-item text-secondary" href="{{ route('display-product-all') }}">
                        <div class="row pt-3">
                            <div class="col item-text">
                                <p class="my-0"><i class="fa-solid fa-boxes-stacked  px-2"></i>All Products</p>
                                <small>Display All Products</small>
                            </div>
                        </div>
                    </a>

                    <a class="col col-4 setting-item text-secondary" href="/admin/clients/index">
                        <div class="row pt-3">
                            <div class="col item-text">
                                <p class="my-0"><i class="fa-solid fa-users px-2"></i> All Clients</p>
                                <small>Display All Clients</small>
                            </div>
                        </div>
                    </a>
                    <div class="py-2" style="border-bottom: 1px solid #dedede"></div>
                    <a class="col col-4 setting-item text-secondary" href="">
                        <div class="row pt-3">
                            <div class="col item-text">
                                <p class="my-0"><i class="fa-solid fa-tags  px-2"></i>Order Items</p>
                                <small>Display All Order Items</small>
                            </div>
                        </div>
                    </a>

                    <a class="col col-4 setting-item text-secondary" href="{{route('display-invoices-list')}}">
                        <div class="row pt-3">
                            <div class="col item-text">
                                <p class="my-0"> <i class="fa fa-user  px-2"></i>All Invoices</p>
                                <small>Display All Invoices</small>
                            </div>
                        </div>
                    </a>

                    <a class="col col-4 setting-item text-secondary" href="{{route('display-payments-list')}}">
                        <div class="row pt-3">
                            <div class="col item-text">
                                <p class="my-0"> <i class="fa fa-user  px-2"></i>All Payments</p>
                                <small>Display All Payments</small>
                            </div>
                        </div>
                    </a>

                </div>
            </div>
        </div>
    </div> {{-- End of cards --}}
    <div class="col-3" style=""> {{-- Start of wedgets --}}

    </div>
</div>
<div class="row">
    <div class="col-9">
        <div class="card card-home my-3 mx-4">
            <div class="card-header py-2 px-3">
                General
            </div>
            <div class="card-body pt-0 pb-3">
                <div class="row ">
                    <a class="col col-4 setting-item text-secondary" href="{{route('admin-list')}}">
                        <div class="row pt-3">
                            <div class="col item-text">
                                <p class="my-0"> <i class="fa fa-user  px-2"></i>All Admins</p>
                                <small>Display All Admins</small>
                            </div>
                        </div>
                    </a>

                    <a class="col col-4 setting-item text-secondary" href="{{route('roles-list')}}">
                        <div class="row pt-3">
                            <div class="col item-text">
                                <p class="my-0"><i class="fa-solid fa-credit-card  px-2"></i>Roles</p>
                                <small> Display Payment Methods</small>
                            </div>
                        </div>
                    </a>
                    <a class="col col-4 setting-item text-secondary" href="{{route('permissions-list')}}">
                        <div class="row pt-3">
                            <div class="col item-text">
                                <p class="my-0"><i class="fa-solid fa-tags  px-2"></i>Permission</p>
                                <small> Display Permission List</small>
                            </div>
                        </div>
                    </a>
                    <div class="py-2" style="border-bottom: 1px solid #dedede"></div>
                    <a class="col col-4 setting-item text-secondary" href="">
                        <div class="row pt-3">
                            <div class="col item-text">
                                <p class="my-0"><i class="fa-solid fa-gear  px-2"></i>Settings</p>
                                <small> Settings and Options</small>
                            </div>
                        </div>
                    </a>

                </div>
            </div>
        </div>
    </div> {{-- End of cards --}}
    <div class="col-3" style=""> {{-- Start of wedgets --}}

    </div>
</div>

@endsection