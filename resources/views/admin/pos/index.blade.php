@extends('layouts.admin')
@section ('contents')
<div class="container-fluid">
    <div class="row">

        <div class="col-md-12">
            <div id="products-container">

                <h1 class="mt-3 pb-2" style="border-bottom: 1px solid #dedede">{{__('pos.index-main-title')}}
                    <a class="ms-3 add-icon" data-bs-toggle="modal" data-bs-target="#createPosModal" aria-expanded="false"
                        aria-controls="addProductForm">
                        <i data-bs-toggle="tooltip" title="Add New pos" class="fa fa-plus"></i>
                    </a>
                </h1>
                <!-- هنا سيتم اضافة المنتجات -->
                <div class="row">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modals -->
<div class="modal fade" id="createPosModal" aria-hidden="true" aria-labelledby="createPosModalLabel"
    tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="padding: 0.5rem 1rem; border-bottom: 1px solid #dedede;">
                <h1 class="modal-title fs-5" id="createPosModalLabel">{{__('pos.new-pos-modal-title')}}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="p-3" method="POST" action="{{ route('store-pos-info') }}">
                @csrf

                <div class="mb-2 input-group">
                    <label class="input-group-text">{{__('pos.name')}}</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <div class="mb-2 input-group">
                    <label class="input-group-text">{{__('pos.code')}}</label>
                    <input type="text" name="code" class="form-control" required>
                </div>
                <small>{{__('pos.code-must-be-unique')}} (مثال: POS-001)</small>

                <div class="mb-2 input-group">
                    <label class="input-group-text">{{__('pos.location')}}</label>
                    <select name="location" class="form-control" required>
                        <option value="main_hall">{{__('pos.main-hall')}}</option>
                        <option value="terrace">{{__('pos.terrace')}}</option>
                        <option value="first_floor">{{__('pos.first-floor')}}</option>
                    </select>
                </div>

                <div class="mb-2 input-group">
                    <label class="input-group-text">{{__('pos.branch')}}</label>
                    <select name="branch_id" class="form-control" required>
                        @foreach($branches as $branch)
                        <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-2 input-group">
                    <label class="input-group-text">{{__('pos.printer-settings')}}</label>
                    <input type="text" name="printer_name" placeholder="{{__('pos.printer-name')}}" class="form-control">
                    <input type="text" name="printer_ip" placeholder="{{__('pos.printer-ip')}}" class="form-control">
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-outline-primary py-1">{{__('pos.save-pos')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection