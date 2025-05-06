@extends('layouts.admin')

@section('contents')

<div class="row">
  <div class="col-lg-12 col-sm-12">
    <h1 class="mt-3 pb-2" style="border-bottom: 1px solid #dedede">General Setting</h1>




    <div class="d-flex justify-content-start align-items-start setting-nav p-0">
      <div class="nav flex-column justify-content-start text-end" style="width:180px;" id="v-pills-tab" role="tablist" aria-orientation="vertical">
        <button class="nav-link active" id="v-pills-general-setting-tab" data-bs-toggle="pill"
          data-bs-target="#v-pills-general-setting" type="button" role="tab" aria-controls="v-pills-general-setting" aria-selected="true">
          {{__('settings.general')}}
        </button>
        <button class="nav-link" id="v-pills-branches-tab" data-bs-toggle="pill"
          data-bs-target="#v-pills-branches" type="button" role="tab" aria-controls="v-pills-branches" aria-selected="false">
          {{__('settings.branches')}}
        </button>
        <button class="nav-link" id="v-pills-contacts-tab" data-bs-toggle="pill"
          data-bs-target="#v-pills-contacts" type="button" role="tab" aria-controls="v-pills-contacts" aria-selected="false" contacts>
          {{__('settings.contacts')}}
        </button>
        <button class="nav-link" id="v-pills-orders-tab" data-bs-toggle="pill"
          data-bs-target="#v-pills-orders" type="button" role="tab" aria-controls="v-pills-orders" aria-selected="false">
          {{__('settings.orders')}}
        </button>
        <button class="nav-link" id="v-pills-invoices-tab" data-bs-toggle="pill"
          data-bs-target="#v-pills-invoices" type="button" role="tab" aria-controls="v-pills-invoices" aria-selected="false">
          {{__('settings.invoices')}}
        </button>
      </div>
      <div class="tab-content p-3 m-0" id="v-pills-tabContent">
        <div class="tab-pane fade show active" id="v-pills-general-setting" role="tabpanel"
          aria-labelledby="v-pills-general-setting-tab" tabindex="0">
          @include('admin.setting.partials.general')
        </div>
        <div class="tab-pane fade" id="v-pills-branches" role="tabpanel"
          aria-labelledby="v-pills-branches-tab" tabindex="0">
          @include('admin.setting.partials.branches')
        </div>
        <div class="tab-pane fade" id="v-pills-contacts" role="tabpanel"
          aria-labelledby="v-pills-contacts-tab" tabindex="0">
          @include('admin.setting.partials.contacts')
        </div>
        <div class="tab-pane fade" id="v-pills-orders" role="tabpanel"
          aria-labelledby="v-pills-orders-tab" tabindex="0">
          @include('admin.setting.partials.orders')
        </div>
        <div class="tab-pane fade" id="v-pills-invoices" role="tabpanel"
          aria-labelledby="v-pills-invoices-tab" tabindex="0">
          @include('admin.setting.partials.invoices')
        </div>
      </div>
    </div>

    {{count($timezones)}}


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