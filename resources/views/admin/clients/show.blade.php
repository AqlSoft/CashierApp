@extends('layouts.admin')
@section('contents')
<div class="row">
  <div class="col col-8">
    <h2 class="mt-4 pb-2" style="border-bottom: 1px solid #dedede">
      <i class="fas fa-info-circle px-1"></i>{{ __('clients.client_details') }}
    </h2>
    <fieldset class="mt-2 ms-0 mb-0 shadow-sm">
      <div class="row mt-2">
        <div class="col-lg-8 col-sm-8">
          <div class="bulk border-dark p-0 m-1">
            <div class="row m-0 mb-1 border-bottom border-dark-50">
              <div class="col col-4">{{ __('clients.vat_number') }} :</div>
              <div class="col col-8">{{ @$client->vat_number }}</div>
            </div>
            <div class="row m-0 mb-1 border-bottom border-dark-50 pb-1">
              <div class="col col-4">{{ __('clients.client_name') }} :</div>
              <div class="col col-8">{{ $client->name }}</div>
            </div>
            <div class="row m-0 mb-1 border-bottom border-dark-50 pb-1">
              <div class="col col-4">{{ __('clients.phone_number') }} :</div>
              <div class="col col-8">{{ $client->phone }}</div>
            </div>
            <div class="row m-0 mb-1 border-bottom border-dark-50 pb-1">
              <div class="col col-4">{{ __('clients.email') }} :</div>
              <div class="col col-8">{{ $client->email }}</div>
            </div>
            <div class="row m-0 mb-1 border-bottom border-dark-50 pb-1">
              <div class="col col-4">{{ __('clients.address') }} :</div>
              <div class="col col-8">{{ $client->address }}</div>
            </div>
            <div class="row m-0 mb-1 border-bottom border-dark-50 pb-1">
              <div class="col col-4">{{ __('clients.created_by') }} :</div>
              <div class="col col-8">{{ @$client->creator->userName }}</div>
            </div>
            <div class="row m-0 mb-1 border-bottom border-dark-50 pb-1">
              <div class="col col-4">{{ __('clients.created_at') }} :</div>
              <div class="col col-8">{{ $client->created_at }}</div>
            </div>
            <div class="row m-0 mb-1 border-bottom border-dark-50 pb-1">
              <div class="col col-4">{{ __('clients.edited_by') }} :</div>
              <div class="col col-8">{{ @$client->editor->userName }}</div>
            </div>
            <div class="row m-0 mb-1 border-bottom border-dark-50 pb-1">
              <div class="col col-4">{{ __('clients.updated_at') }} :</div>
              <div class="col col-8 text-start">{{ $client->updated_at }}</div>
            </div>
          </div>
        </div>
      </div>
    </fieldset>
  </div>
</div>
@endsection