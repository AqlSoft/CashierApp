@extends('layouts.admin')

@section('contents')

<div class="row">
    <div class="col-lg-12 col-sm-12">
        <div class="d-flex justify-content-start align-items-start setting-nav p-0">
            <div class="nav justify-content-start text-end" style="width:200px;" id="v-pills-tab" role="tablist" aria-orientation="vertical">

                <button class="nav-link {{ $tab == 'general' ? 'active' : '' }}" id="v-pills-general-setting-tab" data-bs-toggle="pill"
                    data-bs-target="#v-pills-general-setting" type="button" role="tab" aria-controls="v-pills-general-setting" aria-selected="{{ $tab == 'general' ? 'true' : 'false' }}">
                    <a href="{{route('home-setting')}}">{{__('settings.general')}}</a>
                </button>

                <button class="nav-link {{ $tab == 'branches' ? 'active' : '' }}" id="v-pills-branches-tab" data-bs-toggle="pill"
                    data-bs-target="#v-pills-branches" type="button" role="tab" aria-controls="v-pills-branches" aria-selected="{{ $tab == 'branches' ? 'true' : 'false' }}">
                    <a href="{{route('display-branches-list')}}">{{__('settings.branches')}}</a>
                </button>

                <button class="nav-link {{ $tab == 'contacts' ? 'active' : '' }}" id="v-pills-contacts-tab" data-bs-toggle="pill"
                    data-bs-target="#v-pills-contacts" type="button" role="tab" aria-controls="v-pills-contacts" aria-selected="{{ $tab == 'contacts' ? 'true' : 'false' }}">
                    <a href="{{route('display-contacts-list')}}">{{__('settings.contacts')}}</a>
                </button>

                <button class="nav-link {{ $tab == 'orders' ? 'active' : '' }}" id="v-pills-orders-tab" data-bs-toggle="pill"
                    data-bs-target="#v-pills-orders" type="button" role="tab" aria-controls="v-pills-orders" aria-selected="{{ $tab == 'orders' ? 'true' : 'false' }}">
                    <a href="{{route('display-orders-list')}}">{{__('settings.orders')}}</a>
                </button>

                <button class="nav-link {{ $tab == 'invoices' ? 'active' : '' }}" id="v-pills-invoices-tab" data-bs-toggle="pill"
                    data-bs-target="#v-pills-invoices" type="button" role="tab" aria-controls="v-pills-invoices" aria-selected="{{ $tab == 'invoices' ? 'true' : 'false' }}">
                    <a href="{{route('display-invoices-list')}}">{{__('settings.invoices')}}</a>
                </button>

                <button class="nav-link {{ $tab == 'currencies' ? 'active' : '' }}" id="v-pills-currencies-tab" data-bs-toggle="pill"
                    data-bs-target="#v-pills-currencies" type="button" role="tab" aria-controls="v-pills-currencies" aria-selected="{{ $tab == 'currencies' ? 'true' : 'false' }}">
                    <a href="{{route('display-currencies-list')}}">{{__('settings.currencies')}}</a>
                </button>

                <button class="nav-link {{ $tab == 'displays' ? 'active' : '' }}" id="v-pills-displays-tab" data-bs-toggle="pill"
                    data-bs-target="#v-pills-displays" type="button" role="tab" aria-controls="v-pills-displays" aria-selected="{{ $tab == 'displays' ? 'true' : 'false' }}">
                    <a href="">{{__('settings.displays')}}</a>
                </button>
            </div>
            <div class="tab-content p-3 m-0" id="v-pills-tabContent">
                <div class="tab-pane fade {{ $tab == 'general' ? 'show active' : '' }}" id="v-pills-general-setting" role="tabpanel"
                    aria-labelledby="v-pills-general-setting-tab" tabindex="0">
                    @if($tab == 'general') @include('admin.setting.partials.general') @endif
                </div>
                <div class="tab-pane fade {{ $tab == 'branches' ? 'show active' : '' }}" id="v-pills-branches" role="tabpanel"
                    aria-labelledby="v-pills-branches-tab" tabindex="0">
                    @if($tab == 'branches') @include('admin.setting.partials.branches') @endif
                </div>
                <div class="tab-pane fade {{ $tab == 'contacts' ? 'show active' : '' }}" id="v-pills-contacts" role="tabpanel"
                    aria-labelledby="v-pills-contacts-tab" tabindex="0">
                    @if($tab == 'contacts') @include('admin.setting.contacts.index') @endif
                </div>
                <div class="tab-pane fade {{ $tab == 'orders' ? 'show active' : '' }}" id="v-pills-orders" role="tabpanel"
                    aria-labelledby="v-pills-orders-tab" tabindex="0">
                    @if($tab == 'orders') @include('admin.setting.orders.index') @endif
                </div>
                <div class="tab-pane fade {{ $tab == 'invoices' ? 'show active' : '' }}" id="v-pills-invoices" role="tabpanel"
                    aria-labelledby="v-pills-invoices-tab" tabindex="0">
                    @if($tab == 'invoices') @include('admin.setting.partials.invoices') @endif
                </div>
                <div class="tab-pane fade {{ $tab == 'currencies' ? 'show active' : '' }}" id="v-pills-currencies" role="tabpanel"
                    aria-labelledby="v-pills-currencies-tab" tabindex="0">
                    @if($tab == 'currencies') @include('admin.setting.currency.index') @endif
                </div>
            </div>
        </div>

        <script>
            function adjustActiveTabHeight() {
                const navHeight = document.querySelector('.nav').clientHeight;
                const activeTab = document.querySelector('.tab-pane.active.show');
                const maxHeight = Math.max(navHeight, activeTab.clientHeight);
                if (!activeTab) return;
                activeTab.style.height = maxHeight + 'px';
            }
            document.addEventListener('DOMContentLoaded', function() {
                adjustActiveTabHeight();
                window.addEventListener('resize', adjustActiveTabHeight);
                const navBtns = document.querySelectorAll('.nav button.nav-link');
                navBtns.forEach(btn => {
                    btn.addEventListener('click', function() {
                        setTimeout(adjustActiveTabHeight, 100);
                    });
                });
            });
        </script>
        @endsection