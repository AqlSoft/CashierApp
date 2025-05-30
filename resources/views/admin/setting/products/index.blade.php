@extends('layouts.admin')

@section('contents')

<div class="row">
    <div class="col-lg-12 col-sm-12">
        <div class="d-flex justify-content-start align-items-start setting-nav p-0">
            <div class="nav justify-content-start text-end" style="width:200px;" id="v-pills-tab" role="tablist" aria-orientation="vertical">

                <button class="nav-link {{ $tab == 'general' ? 'active' : '' }}" id="v-pills-general-setting-tab" data-bs-toggle="pill"
                    data-bs-target="#v-pills-general-setting" type="button" role="tab" aria-controls="v-pills-general-setting" aria-selected="{{ $tab == 'general' ? 'true' : 'false' }}">
                    <a href="{{route('product-setting-home')}}">{{__('settings.home')}}</a>
                </button>

                <button class="nav-link {{ $tab == 'categroies' ? 'active' : '' }}" id="v-pills-branches-tab" data-bs-toggle="pill"
                    data-bs-target="#v-pills-branches" type="button" role="tab" aria-controls="v-pills-branches" aria-selected="{{ $tab == 'branches' ? 'true' : 'false' }}">
                    <a href="{{route('display-categories-all')}}">{{__('settings.categroies')}}</a>
                </button>

                <button class="nav-link {{ $tab == 'units' ? 'active' : '' }}" id="v-pills-contacts-tab" data-bs-toggle="pill"
                    data-bs-target="#v-pills-contacts" type="button" role="tab" aria-controls="v-pills-contacts" aria-selected="{{ $tab == 'contacts' ? 'true' : 'false' }}">
                    <a href="{{route('display-units-all')}}">{{__('settings.units')}}</a>
                </button>

                <button class="nav-link {{ $tab == 'taxes' ? 'active' : '' }}" id="v-pills-orders-tab" data-bs-toggle="pill"
                    data-bs-target="#v-pills-orders" type="button" role="tab" aria-controls="v-pills-orders" aria-selected="{{ $tab == 'orders' ? 'true' : 'false' }}">
                    <a href="{{route('taxes.index')}}">{{__('settings.taxes')}}</a>
                </button>
                  <button class="nav-link {{ $tab == 'tax-groups' ? 'active' : '' }}" id="v-pills-orders-tab" data-bs-toggle="pill"
                    data-bs-target="#v-pills-orders" type="button" role="tab" aria-controls="v-pills-orders" aria-selected="{{ $tab == 'orders' ? 'true' : 'false' }}">
                    <a href="{{route('admin.tax-groups.index')}}">{{__('settings.taxes-groups')}}</a>
                </button>

            </div>
            <div class="tab-content p-3 m-0" id="v-pills-tabContent">
                <div class="tab-pane fade {{ $tab == 'general' ? 'show active' : '' }}" id="v-pills-general-setting" role="tabpanel"
                    aria-labelledby="v-pills-general-setting-tab" tabindex="0">
                    @if($tab == 'general') @include('admin.setting.products.partials.general') @endif
                </div>
                <div class="tab-pane fade {{ $tab == 'categroies' ? 'show active' : '' }}" id="v-pills-branches" role="tabpanel"
                    aria-labelledby="v-pills-branches-tab" tabindex="0">
                    @if($tab == 'categroies') @include('admin.setting.categroies.index') @endif
                </div>
                <div class="tab-pane fade {{ $tab == 'units' ? 'show active' : '' }}" id="v-pills-contacts" role="tabpanel"
                    aria-labelledby="v-pills-contacts-tab" tabindex="0">
                    @if($tab == 'units') @include('admin.setting.units.index') @endif
                </div>
                <div class="tab-pane fade {{ $tab == 'taxes' ? 'show active' : '' }}" id="v-pills-orders" role="tabpanel"
                    aria-labelledby="v-pills-orders-tab" tabindex="0">
                    @if($tab == 'taxes') @include('admin.taxes.index') @endif
                </div>
                  <div class="tab-pane fade {{ $tab == 'tax-groups' ? 'show active' : '' }}" id="v-pills-orders" role="tabpanel"
                    aria-labelledby="v-pills-orders-tab" tabindex="0">
                    @if($tab == 'tax-groups') @include('admin.tax-groups.index') @endif
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