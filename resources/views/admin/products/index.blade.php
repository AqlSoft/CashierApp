@extends('layouts.admin')

@section('contents')
<div class="container-fluid">
  <div class="row">

    <div class="col-md-12">
      <div id="products-container">
        
        <h1 class="mt-3 pb-2" style="border-bottom: 1px solid #dedede">Display Products List
          <a class="ms-3 add-icon" data-bs-toggle="collapse" data-bs-target="#addProductForm" aria-expanded="false"
            aria-controls="addProductForm">
            <i data-bs-toggle="tooltip" title="Add New product" class="fa fa-plus"></i>
          </a>
        </h1>
          <!-- هنا سيتم اضافة المنتجات -->
        <div class="row">
          <div class="col col-12 collapse  pt-3" id="addProductForm">
            <div class="row">
              <div
                class="col ">
                <div class="card card-body">
                  <form action="/admin/products/store" method="POST">
                    @csrf
                    <div class="input-group sm mb-2">
                      <label class="input-group-text" for="quantity">Categery</label>
                      <select class="form-select form-control sm py-0" name="category" id="category">
                        <option readonly>All Categery Types</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->cat_name }}</option>
                        @endforeach
                      </select>
                      <label class="input-group-text" for="name">Product Name</label>
                      <input type="text" class="form-control sm" name="name" id="name" value="">
                      <label class="input-group-text" for="cost_price">Cost Price</label>
                      <input type="number" class="form-control sm" name="cost_price" id="cost_price">

                    </div>
                    <div class="input-group sm mt-2">

                      <label class="input-group-text" for="admin_id">Person</label>
                      <select class="form-select  form-control sm py-0" name="admin_id" id="admin_id">
                        <option readonly>All Persons</option>
                        @foreach ($admins as $admin)
                        <option value="{{ $admin->id }}">{{ $admin->userName }}</option>
                        @endforeach
                      </select>
                      <label class="input-group-text" for="sale_price">Sale Price</label>
                      <input type="number" class="form-control sm" name="sale_price" id="sale_price">

                    </div>
                    <div class="input-group sm mt-2">
                      <label class="input-group-text" for="brief">Description</label>
                      <input type="text" class="form-control sm" name="brief" id="brief">
                      <div class="input-group-text">
                        <input class="form-check-input mt-0" name="status" type="checkbox" value="1"
                          aria-label="Checkbox for following text input">
                      </div>
                      <button type="button" class="input-group-text text-start">Active</button>
                    </div>
                    <div class="input-group sm mt-2" style="border-top: 1px solid #aaa">
                      
                      <button type="submit" class="py-0 btn btn-primary p-3 mt-2" style="margin-left:850px;">Save product</button>
                    </div>
                  </form>
                </div>
              </div>

            </div>
            <div class="py-2" style="border-bottom: 1px solid #dedede"></div>
          </div>
        </div>
        <!-- هنا سيتم عرض المنتجات -->
        <table class="table table-striped  mt-3 ">
          <thead>
            <tr>
              <th>
                #
              </th>
              <th>Name</th>
              <th>Cost Price</th>
              <th>Sale Price</th>
              <th>Admin</th>
              <th>Status</th>
              <th>Control</th>
            </tr>
          </thead>
          <tbody class="table-group-divider">
            @php
            $counter = 0;
            @endphp
            @if (count($products))
            @foreach ($products as $product)

            <tr>

              <td>{{ ++$counter }}</td>
              <td>{{ $product->name }}</td>
              <td>{{ $product->cost_price }}</td>
              <td>{{ $product->sale_price }}</td>
              <td>{{ $product->creator->userName }}</td>
              <td>  
                @if ($product->status === 1)
              <span
                class=" text-success">{{ $status[$product->status] }}</span>
            @else
              <span class=" text-danger">{{ $status[$product->status] }}</span>
              @endif
              
              <td>
              <a class="btn btn-sm py-0" href="{{ route('view-product-info', $product->id) }}"><i
              class="fas fa-eye text-success"></i></a>
                <a class="btn btn-sm py-0" href="{{ route('edit-product-info', $product->id) }}"><i
                    class="fa fa-edit text-primary"></i></a>

                <a class="btn btn-sm py-0" onclick="if(!confirm('You are about to delete a product, are you sure!?.')){return false}"
                  title="Delete Product and related Information" href="{{ route('destroy-product-info', $product->id) }}"><i
                    class="fa fa-trash text-danger"></i></a>

              </td>
            </tr>
            @endforeach
            @else
            <tr>
              <td colspan="7">No product has been added yet, Add your .</td>
            </tr>
            @endif
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>



@endsection