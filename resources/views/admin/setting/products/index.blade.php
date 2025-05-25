@extends('layouts.admin')
@section('contents')

<div class="container-fluid">
  <div class="row">

    <div class="col-md-12">
      <div id="products-container">

        <h1 class="mt-3 pb-2" style="border-bottom: 1px solid #dedede">
          <a href="{{ route('product-setting-home') }}" class="btn py-1 fw-bold btn-primary active">Home</a>
          <a href="{{ route('display-units-all') }}" class="btn py-1 fw-bold btn-primary">Units</a>
          <a href="{{ route('display-categories-all') }}" class="btn py-1 fw-bold btn-primary ">Categories</a>
        </h1>
      <div class="row">
            {{--  tax --}}
                            <div class="col col-6 mb-3 p-1">
                                <div class="card w-100 mt-3">
                                    <div class="card-header">
                                        <h5 class="card-title py-2">{{ __('products.product_tax') }}</h5>
                                    </div>
                                    <form action="" method="POST">
                                        @csrf
                                        <div class="card-body">
                                            <div class="input-group sm mb-2">
                                                <label class="input-group-text" for="tax">{{ __('products.tax') }}</label>
                                                <input type="number" class="form-control sm" name="tax" id="tax" value="">
                                            </div>
                                            
                                        </div>
                                        <div class="card-footer">
                                            <div class="d-flex justify-content-end">
                                                <button class="btn btn-outline-primary py-0" type="submit">{{ __('products.update_tax') }}</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

        </div>




      </div>
    </div>
  </div>
</div>

@endsection