@extends('layouts.admin')
<!-- Push styles here -->
@section ('contents')

<div class="row">
    <div class="col-lg-12 col-sm-12">
        <h1 class="mt-3 pb-2" style="border-bottom: 1px solid #dedede">General Setting</h1>

        <form class="mt-3" action="{{route('update-branch-info')}}" method="POST">
            @csrf
            @method('PUT')

            <input type="hidden" name="id" value="{{ $branch->id }}">
            <div class="row">
                <div class="col col-12 col-md-6">
                    <div class="input-group sm mb-2">
                        <label for="code" class="input-group-text">{{__('branches.code')}}</label>
                        <input type="text" name="code" class="form-control" placeholder="{{__('branches.code-ph')}}" value="{{old('code', $branch)}}">
                    </div>
                </div>

                <div class="col col-12 col-md-6">
                    <div class="input-group sm mb-2">
                        <label for="branch_type" class="input-group-text">{{__('branches.branch_type')}}</label>
                        <select name="branch_type" class="form-select">
                            <option value="" hidden>{{__('branches.branch_type-ph')}}</option>
                            <option {{old('branch_type', $branch) == 'main' ? 'selected' : ''}} value="main">{{__('branches.main')}}</option>
                            <option {{old('branch_type', $branch) == 'sub' ? 'selected' : ''}} value="sub">{{__('branches.sub')}}</option>
                            <option {{old('branch_type', $branch) == 'virtual' ? 'selected' : ''}} value="virtual">{{__('branches.virtual')}}</option>
                        </select>
                    </div>
                </div>

                <div class="col col-12 col-md-6">
                    <div class="input-group sm mb-2">
                        <label for="name_ar" class="input-group-text">{{__('branches.name_ar')}}</label>
                        <input type="text" name="name_ar" class="form-control" placeholder="{{__('branches.name_ar-ph')}}" value="{{old('name_ar', $branch)}}">
                    </div>
                </div>

                <div class="col col-12 col-md-6">
                    <div class="input-group sm mb-2">
                        <label for="name_en" class="input-group-text">{{__('branches.name_en')}}</label>
                        <input type="text" name="name_en" class="form-control" placeholder="{{__('branches.name_en-ph')}}" value="{{old('name_en', $branch)}}">
                    </div>
                </div>

                <div class="col col-12 col-md-6">
                    <div class="input-group sm mb-2">
                        <label for="tax_number" class="input-group-text">{{__('branches.tax_number')}}</label>
                        <input type="text" name="tax_number" class="form-control" placeholder="{{__('branches.tax_number-ph')}}" value="{{old('tax_number', $branch)}}">
                    </div>
                </div>

                <div class="col col-12 col-md-6">
                    <div class="input-group sm mb-2">
                        <label for="commercial_record" class="input-group-text">{{__('branches.commercial_record')}}</label>
                        <input type="text" name="commercial_record" class="form-control" placeholder="{{__('branches.commercial_record-ph')}}" value="{{old('commercial_record', $branch)}}">
                    </div>
                </div>

                <div class="col col-12 col-md-6">
                    <div class="input-group sm mb-2">
                        <label for="phone" class="input-group-text">{{__('branches.phone')}}</label>
                        <input type="text" name="phone" class="form-control" placeholder="{{__('branches.phone-ph')}}" value="{{old('phone', $branch)}}">
                    </div>
                </div>

                <div class="col col-12 col-md-6">
                    <div class="input-group sm mb-2">
                        <label for="mobile" class="input-group-text">{{__('branches.mobile')}}</label>
                        <input type="text" name="mobile" class="form-control" placeholder="{{__('branches.mobile-ph')}}" value="{{ old('mobile', $branch->mobile) }}">
                    </div>
                </div>

                <div class="col col-12 col-md-6">
                    <div class="input-group sm mb-2">
                        <label for="email" class="input-group-text">{{__('branches.email')}}</label>
                        <input type="text" name="email" class="form-control" placeholder="{{__('branches.email-ph')}}" value="{{ old('email', $branch->email) }}">
                    </div>
                </div>

                <div class="col col-12 col-md-6">
                    <div class="input-group sm mb-2">
                        <label for="website" class="input-group-text">{{__('branches.website')}}</label>
                        <input type="text" name="website" class="form-control" placeholder="{{__('branches.website-ph')}}" value="{{ old('website', $branch->website) }}">
                    </div>
                </div>

                <div class="col col-12">
                    <div class="input-group sm mb-2">
                        <label for="country" class="input-group-text">{{__('branches.country')}}</label>
                        <select name="country_id" class="form-select">
                            @foreach($countries as $country)
                            <option value="{{ $country->id }}" @if(old('country_id', $branch->country_id) === $country->id) selected @endif>
                                {{ $country->id }} - {{ $country->name }}
                            </option>
                            @endforeach
                        </select>

                        <label for="region_id" class="input-group-text">{{__('branches.region')}}</label>
                        <select name="region_id" class="form-select">
                            @foreach($regions as $region)
                            <option value="{{ $region->id }}" @if(old('region_id', $branch->region_id) === $region->id) selected @endif>
                                {{ $region->id }} - {{ $region->name }}
                            </option>
                            @endforeach
                        </select>

                        <label for="city_id" class="input-group-text">{{__('branches.city')}}</label>
                        <select name="city_id" class="form-select">
                            @foreach($cities as $city)
                            <option value="{{ $city->id }}" @if(old('city_id', $branch->city_id) === $city->id) selected @endif>
                                {{ $city->id }} - {{ $city->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col col-12">
                    <div class="input-group sm mb-2">
                        <label for="address" class="input-group-text">{{__('branches.address')}}</label>
                        <input type="text" name="address" class="form-control" placeholder="address" value="{{old('address', $branch)}}">
                    </div>
                </div>

                <div class="col col-12 col-md-6">
                    <div class="input-group sm mb-2">
                        <label for="timezone" class="input-group-text">{{__('branches.timezone')}}</label>
                        <select name="timezone" class="form-select">
                            <option value="">{{__('branches.timezone-ph')}}</option>
                            @foreach($timezones as $group => $tzs)
                            <optgroup label="{{ $group }}">
                                @foreach($tzs as $tz)
                                <option value="{{$tz->id}}" {{old('timezone', $branch) == $tz->id ? 'selected' : ''}}>
                                    {{ $tz->name }} ({{$tz->tz_value}})
                                </option>
                                @endforeach
                            </optgroup>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col col-12 col-md-6">
                    <div class="input-group sm mb-2">
                        <label for="postal_code" class="input-group-text">{{__('branches.postal_code')}}</label>
                        <input type="text" name="postal_code" class="form-control" placeholder="postal_code" value="{{old('postal_code', $branch)}}">
                    </div>
                </div>

                <div class="col col-12">
                    <div class="input-group sm mb-2">
                        <label for="latitude" class="input-group-text">{{__('branches.latitude')}}</label>
                        <input type="text" name="latitude" class="form-control" placeholder="{{__('branches.latitude-ph')}}" value="{{old('latitude', $branch)}}">

                        <label for="longitude" class="input-group-text">{{__('branches.longitude')}}</label>
                        <input type="text" name="longitude" class="form-control" placeholder="{{__('branches.longitude-ph')}}" value="{{old('longitude', $branch)}}">

                        <button type="button" class="input-group-text" data-bs-toggle="modal" data-bs-target="#mapModal">
                            {{__('branches.select-on-map')}}
                        </button>
                    </div>
                </div>

                <div class="col col-12 col-md-6">
                    <div class="input-group sm mb-2">
                        <label for="currency_id" class="input-group-text">{{__('branches.currency')}}</label>
                        <input type="text" name="currency_id" class="form-control" placeholder="{{__('branches.currency-ph')}}" value="{{old('currency_id', $branch)}}">
                    </div>
                </div>

                <div class="col col-12 col-md-6">
                    <div class="input-group sm mb-2">
                        <label for="opening_date" class="input-group-text">{{__('branches.opening_date')}}</label>
                        <input class="form-control" type="date" name="opening_date" value="{{old('opening_date', $branch->opening_date ? $branch->opening_date->format('Y-m-d') : '')}}">
                    </div>
                </div>

                <div class="col col-12 col-md-6">
                    <div class="input-group sm mb-2">
                        <label for="fiscal_start_date" class="input-group-text">{{__('branches.fiscal_start_date')}}</label>
                        <input type="date" name="fiscal_start_date" class="form-control" placeholder="{{__('branches.fiscal_start_date-ph')}}" value="{{old('fiscal_start_date',  $branch->fiscal_start_date ? $branch->fiscal_start_date->format('Y-m-d') : '')}}">
                    </div>
                </div>

                <div class="col col-12 col-md-6">
                    <div class="input-group sm mb-2">
                        <label for="fiscal_end_date" class="input-group-text">{{__('branches.fiscal_end_date')}}</label>
                        <input type="date" name="fiscal_end_date" class="form-control" placeholder="{{__('branches.fiscal_end_date-ph')}}" value="{{old('fiscal_end_date', $branch->fiscal_end_date ? $branch->fiscal_end_date->format('Y-m-d') : '')}}">
                    </div>
                </div>

                <div class="col col-12 col-md-6">
                    <div class="input-group sm mb-2">
                        <label for="is_active" class="input-group-text">{{__('branches.is_active')}}</label>
                        <select name="is_active" class="form-select">
                            <option value="" hidden>{{__('branches.is_active-ph')}}</option>
                            <option value="1" @if(old('is_active', $branch->is_active) === true)selected @endif>{{__('branches.active')}}</option>
                            <option value="0" @if(old('is_active', $branch->is_active) === false)selected @endif>{{__('branches.inactive')}}</option>
                        </select>
                    </div>
                </div>

                Online: {{ $branch->is_online }}<br>
                Active: {{ $branch->is_active }}<br>

                <div class="col col-12 col-md-6">
                    <div class="input-group sm mb-2">
                        <label for="is_online" class="input-group-text">{{__('branches.is_online')}}</label>
                        <select name="is_online" class="form-select">
                            <option value="" hidden>{{__('branches.is_online-ph')}}</option>
                            <option value="1" @if(old('is_online', $branch->is_online) === true) selected @endif>{{__('branches.yes')}}</option>
                            <option value="0" @if(old('is_online', $branch->is_online) === false) selected @endif>{{__('branches.no')}}</option>
                        </select>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">{{__('branches.save')}}</button>
            <a href="{{route('display-branches-list')}}" class="btn btn-secondary">{{__('branches.back')}}</a>
        </form>
    </div>
</div>

<!-- مودال الخريطة -->
<div class="modal fade" id="mapModal" tabindex="-1" aria-labelledby="mapModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mapModalLabel">اختر الموقع</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="إغلاق"></button>
            </div>
            <div class="modal-body" style="height: 400px;">
                <div id="map" style="height: 100%; width: 100%;"></div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('extra-scripts')
<link rel="stylesheet" href="{{ asset('assets/admin/css/leaflet.css') }}">
<script src="{{ asset('assets/admin/js/leaflet.js') }}"></script>
<script>
    let map, marker;
    document.addEventListener('DOMContentLoaded', function() {
        var modal = document.getElementById('mapModal');
        modal.addEventListener('shown.bs.modal', function() {
            setTimeout(function() {
                if (!map) {
                    map = L.map('map').setView([24.7136, 46.6753], 6);
                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        maxZoom: 19
                    }).addTo(map);
                    map.on('click', function(e) {
                        if (marker) {
                            marker.setLatLng(e.latlng);
                        } else {
                            marker = L.marker(e.latlng).addTo(map);
                        }
                        document.querySelector('input[name="latitude"]').value = e.latlng.lat;
                        document.querySelector('input[name="longitude"]').value = e.latlng.lng;
                    });
                } else {
                    map.invalidateSize();
                }
            }, 200);
        });
    });
</script>

@endsection