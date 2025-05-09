@extends('layouts.admin')

@section('contents')

<div class="row">
  <div class="col-lg-12 col-sm-12">
    <h1 class="mt-3 pb-2" style="border-bottom: 1px solid #dedede">{{__('settings.general-settings')}}</h1>




    <div class="d-flex justify-content-start align-items-start setting-nav p-0">
      <div class="nav flex-column justify-content-start text-end" style="width:180px;" id="v-pills-tab" role="tablist" aria-orientation="vertical">
        <button class="nav-link {{ $tab == 'general' ? 'active' : '' }}" id="v-pills-general-setting-tab" data-bs-toggle="pill"
          data-bs-target="#v-pills-general-setting" type="button" role="tab" aria-controls="v-pills-general-setting" aria-selected="true">
          <a href="{{route('home-setting')}}">{{__('settings.general')}}</a>
        </button>
        <button class="nav-link {{ $tab == 'branches' ? 'active' : '' }}" id="v-pills-branches-tab" data-bs-toggle="pill"
          data-bs-target="#v-pills-branches" type="button" role="tab" aria-controls="v-pills-branches" aria-selected="false">
          <a href="{{route('display-branches-list')}}">{{__('settings.branches')}}</a>
        </button>
        <button class="nav-link {{ $tab == 'contacts' ? 'active' : '' }}" id="v-pills-contacts-tab" data-bs-toggle="pill"
          data-bs-target="#v-pills-contacts" type="button" role="tab" aria-controls="v-pills-contacts" aria-selected="false" contacts>
          <a href="{{route('display-contacts-list')}}">{{__('settings.contacts')}}</a>
        </button>
        <button class="nav-link {{ $tab == 'orders' ? 'active' : '' }}" id="v-pills-orders-tab" data-bs-toggle="pill"
          data-bs-target="#v-pills-orders" type="button" role="tab" aria-controls="v-pills-orders" aria-selected="false">
          <a href="{{route('display-orders-list')}}">{{__('settings.orders')}}</a>
        </button>
        <button class="nav-link {{ $tab == 'invoices' ? 'active' : '' }}" id="v-pills-invoices-tab" data-bs-toggle="pill"
          data-bs-target="#v-pills-invoices" type="button" role="tab" aria-controls="v-pills-invoices" aria-selected="false">
          <a href="{{route('display-invoices-list')}}">{{__('settings.invoices')}}</a>
        </button>
        <button class="nav-link {{ $tab == 'currencies' ? 'active' : '' }}" id="v-pills-currencies-tab" data-bs-toggle="pill"
          data-bs-target="#v-pills-currencies" type="button" role="tab" aria-controls="v-pills-currencies" aria-selected="false">
          <a href="{{route('display-currencies-list')}}">{{__('settings.currencies')}}</a>
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
          @if($tab == 'contacts') @include('admin.setting.partials.contacts') @endif
        </div>
        <div class="tab-pane fade" id="v-pills-orders" role="tabpanel"
          aria-labelledby="v-pills-orders-tab" tabindex="0">
          @if($tab == 'orders') @include('admin.setting.partials.orders') @endif
        </div>
        <div class="tab-pane fade" id="v-pills-invoices" role="tabpanel"
          aria-labelledby="v-pills-invoices-tab" tabindex="0">
          @if($tab == 'invoices') @include('admin.setting.partials.invoices') @endif
        </div>
        <div class="tab-pane fade {{ $tab == 'currencies' ? 'show active' : '' }}" id="v-pills-currencies" role="tabpanel"
          aria-labelledby="v-pills-currencies-tab" tabindex="0">
          @if($tab == 'currencies') @include('admin.setting.partials.currencies') @endif
        </div>
      </div>
    </div>




    <script>
      function changeNavHeight() {
        const nav = document.querySelector('.nav');
        const activeTab = document.querySelector('.tab-pane.active.show');
        if (!nav || !activeTab) return;
        // Reset heights to auto to measure natural height
        nav.style.height = 'auto';
        activeTab.style.height = 'auto';
        // Get the tallest
        const maxHeight = Math.max(nav.scrollHeight, activeTab.scrollHeight);
        nav.style.height = maxHeight + 'px';
        activeTab.style.height = maxHeight + 'px';
      }
      document.addEventListener('DOMContentLoaded', function() {
        changeNavHeight();
        window.addEventListener('resize', changeNavHeight);
        const navBtns = document.querySelectorAll('.nav button.nav-link');
        navBtns.forEach(btn => {
          btn.addEventListener('click', function() {
            setTimeout(changeNavHeight, 100);
          });
        });
      });
    </script>
    @endsection