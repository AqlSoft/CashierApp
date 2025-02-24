@extends('layouts.admin')
@section('contents')
<div class="row">
  <div class="col col-8">
  <h2 class="mt-4 pb-2" style="border-bottom: 1px solid #dedede">Product Details</h2>
    <fieldset class="mt-2 ms-0 mb-0  shadow-sm">
      <div class="row mt-2">
        <div class="col-lg-12 col-sm-12">
          <div class="bulk border-dark p-0 m-1">
            <div class="row m-0 mb-1  border-bottom border-dark-50 pb-1 ">
              <div class="col col-3  "> Categery  : </div>
              <div class="col col-9  ">{{ $cat[$product->category] }}</div>
            </div>
            <div class="row m-0 mb-1  border-bottom border-dark-50 pb-1 ">
              <div class="col col-3  "> Product Name  : </div>
              <div class="col col-9 ">{{ $product->name }}</div>
            </div>
            <div class="row m-0 mb-1  border-bottom border-dark-50 pb-1">
              <div class="col col-3   "> Description  : </div>
              <div class="col col-9 ">{{ $product->description }} </div>
            </div>
            <div class="row m-0 mb-1  border-bottom border-dark-50 pb-1">
              <div class="col col-3  "> Cost Price  : </div>
              <div class="col col-9 ">{{ $product->cost_price }}</div>
            </div>
            <div class="row m-0 mb-1  border-bottom border-dark-50 pb-1">
              <div class="col col-3   "> quantity  : </div>
              <div class="col col-9 ">{{ $product->quantity }}</div>
            </div>
            <div class="row m-0 mb-1  border-bottom border-dark-50 pb-1">
              <div class="col col-3   "> Status  : </div>
              <div class="col col-9 "> {{ $status[$product->status] }} </div>
            </div>
        
            <div class="row m-0 mb-1  border-bottom border-dark-50 pb-1">
              <div class="col col-3   "> Created By  : </div>
              <div class="col col-9 "> {{ $product->creator->userName }}</div>
            </div>
            <div class="row m-0 mb-1  border-bottom border-dark-50 pb-1">
              <div class="col col-3   "> Date Created At  : </div>
              <div class="col col-9 ">{{ $product->created_at }}</div>
            </div>
            <div class="row m-0 mb-1  border-bottom border-dark-50 pb-1">
              <div class="col col-3   "> Edited By  : </div>
              <div class="col col-9 ">{{ $product->editor->userName }} </div>
            </div>
            <div class="row m-0 mb-1  border-bottom border-dark-50 pb-1">
              <div class="col col-3   "> Date Modified: </div>
              <div class="col col-9 text-start">{{ $product->updated_at }}</div>
            </div>
          </div>
        </div>

      </div>
  </div>
  </fieldset>
</div>
@endsection