@extends('layouts.admin')
@section('contents')
<div class="row">
  <div class="col col-8">
  <h2 class="mt-4 pb-2" style="border-bottom: 1px solid #dedede"><i class="fas fa-info-circle px-1"></i>Client Details</h2>
    <fieldset class="mt-2 ms-0 mb-0  shadow-sm">
      <div class="row mt-2">
        <div class="col-lg-12 col-sm-12">
          <div class="bulk border-dark p-0 m-1">
            <div class="row m-0 mb-1  border-bottom border-dark-50  ">
              <div class="col col-3  "> Vat Number  : </div>
              <div class="col col-9  ">{{ @$client->vat_number }}</div>
            </div>
            <div class="row m-0 mb-1  border-bottom border-dark-50 pb-1 ">
              <div class="col col-3  ">client Name   : </div>
              <div class="col col-9 ">{{ $client->name }}</div>
            </div>
            <div class="row m-0 mb-1  border-bottom border-dark-50 pb-1">
              <div class="col col-3   "> Phone  : </div>
              <div class="col col-9 ">{{ $client->phone }} </div>
            </div>
            <div class="row m-0 mb-1  border-bottom border-dark-50 pb-1">
              <div class="col col-3  "> Email  : </div>
              <div class="col col-9 ">{{ $client->email }}</div>
            </div>
            <div class="row m-0 mb-1  border-bottom border-dark-50 pb-1">
              <div class="col col-3   "> Address  : </div>
              <div class="col col-9 ">{{ $client->address }}</div>
            </div>
      
        
            <div class="row m-0 mb-1  border-bottom border-dark-50 pb-1">
              <div class="col col-3   "> Created By  : </div>
              <div class="col col-9 "> {{ @$client->creator->userName }}</div>
            </div>
            <div class="row m-0 mb-1  border-bottom border-dark-50 pb-1">
              <div class="col col-3   "> Date Created At  : </div>
              <div class="col col-9 ">{{ $client->created_at }}</div>
            </div>
            <div class="row m-0 mb-1  border-bottom border-dark-50 pb-1">
              <div class="col col-3   "> Edited By  : </div>
              <div class="col col-9 ">{{ @$client->editor->userName }} </div>
            </div>
            <div class="row m-0 mb-1  border-bottom border-dark-50 pb-1">
              <div class="col col-3   "> Date Modified: </div>
              <div class="col col-9 text-start">{{ $client->updated_at }}</div>
            </div>
          </div>
        </div>

      </div>
  </div>
  </fieldset>
</div>
@endsection