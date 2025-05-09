@extends('layouts.admin')
@section ('title', __('pos.index-main-title'))
@section ('header-links')
    <li class="breadcrumb-item"><a href="{{route('home-setting')}}">{{__('setting.home')}}</a></li>
    <li class="breadcrumb-item"><a href="{{route('display-pos-list')}}">{{__('pos.pos')}}</a></li>
@endsection
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
                <div class="row items-list mt-3">
                    @forelse ($posList as $pos)
                        <div class="col-4 mb-2">
                            <div class="card mb-3 w-100">
                                <div class="row g-0">
                                    <div class="text-center" style="width: 100px">
                                        <div class="d-flex justify-content-center align-items-center h-100">
                                            <img width="100" height="100" src="{{ $pos->icon ? asset('assets/admin/uploads/' . $pos->icon) : asset('assets/admin/images/pos-default.png') }}" class="img-fluid rounded px-3" alt="...">
                                        </div>
                                    </div>
                                    <div class="" style="width: calc(100% - 100px)">
                                        <div class="card-body pb-0">
                                            <h5 class="card-title">{{ $pos->name }}</h5>
                                            <p class="card-text mt-0 mb-3">{{ $pos->code }} <br>
                                            @if ($pos->is_default)
                                                <span class="badge bg-success" style="padding: 2px 8px;">Default</span>
                                            @endif
                                            @if ($pos->is_active)
                                                <span class="badge bg-success" style="padding: 2px 8px;">Active</span>
                                            @else
                                                <span class="badge bg-danger" style="padding: 2px 8px;">Inactive</span>
                                            @endif
                                            </p>
                                            <p class="card-text py-0 my-0"><small class="text-body-secondary">{{ $pos->updated_at->diffForHumans() }}</small></p>
                                            <div class="actions position-absolute top-0">
                                                <a href="{{ route('view-pos-info', $pos->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-display"></i></a>
                                                <a href="{{ route('destroy-pos-info', $pos->id) }}" class="btn btn-danger btn-sm">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12 mb-2">
                            <p>No pos found.</p>
                        </div>
                    @endforelse
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
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                </div>

                <div class="mb-2 input-group">
                    <label class="input-group-text">{{__('pos.code')}}</label>
                    <input type="text" name="code" class="form-control" value="{{ old('code') }}" required>
                </div>
                <small>{{__('pos.code-must-be-unique')}} (مثال: POS-001)</small>

                <div class="mb-2 input-group">
                    <label class="input-group-text">{{__('pos.location')}}</label>
                    <select name="location" class="form-control" required>
                        <option {{ old('location', 'main_hall') ? 'selected' : '' }} value="main_hall">{{__('pos.main-hall')}}</option>
                        <option {{ old('location', 'terrace') ? 'selected' : '' }} value="terrace">{{__('pos.terrace')}}</option>
                        <option {{ old('location', 'first_floor') ? 'selected' : '' }} value="first_floor">{{__('pos.first-floor')}}</option>
                    </select>
                </div>

                <div class="mb-2 input-group">
                    <label class="input-group-text">{{__('pos.branch')}}</label>
                    <select name="branch_id" class="form-control" required>
                        @foreach($branches as $branch)
                        <option {{ old('branch_id') == $branch->id ? 'selected' : '' }} value="{{ $branch->id }}">{{ $branch->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-2 input-group">
                    <label class="input-group-text">{{__('pos.printer-settings')}}</label>
                    <input type="text" name="printer_name" placeholder="{{__('pos.printer-name')}}" class="form-control" value="{{ old('printer_name') }}">
                    <input type="text" name="printer_ip" placeholder="{{__('pos.printer-ip')}}" class="form-control" value="{{ old('printer_ip') }}">
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-outline-primary py-1">{{__('pos.save-pos')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection