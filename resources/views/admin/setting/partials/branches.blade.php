
{{--
    // نتوقع أن يتم تمرير قائمة الفروع إلى هذا الملف باسم $branches
--}}
<h1>{{__('branches.branches-list')}}</h1>
<div class="row mb-4">
    @if(isset($branches) && count($branches) > 0)
        @foreach($branches as $branch)
            <div class="col-auto mb-2">
                <div class="card shadow-sm border-primary" style="min-width: 180px;">
                    <div class="card-body p-2 text-center">
                        <h6 class="card-title mb-1">{{ $branch->name_ar ?? $branch->name_en }}</h6>
                        <small class="text-muted">{{ $branch->code }}</small>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <div class="col-12">
            <div class="alert alert-info text-center mb-0">
                لا يوجد فروع حالياً
            </div>
        </div>
    @endif
</div>

<form action="{{route('store-branch-info')}}" method="POST">
    @csrf
    @method('POST')
    <div class="row">
        <div class="col col-12 col-md-6">
            <div class="input-group sm mb-2">
                <label for="code" class="input-group-text">{{__('branches.code')}}</label>
                <input type="text" name="code" class="form-control" placeholder="{{__('branches.code-ph')}}" value="{{old('code')}}">
            </div>
        </div>
        <div class="col col-12 col-md-6">
            <div class="input-group sm mb-2">
                <label for="branch_type" class="input-group-text">{{__('branches.branch_type')}}</label>
                <select name="branch_type" class="form-select">
                    <option value="" hidden>{{__('branches.branch_type-ph')}}</option>
                    <option value="main">{{__('branches.main')}}</option>
                    <option value="sub">{{__('branches.sub')}}</option>
                    <option value="virtual">{{__('branches.virtual')}}</option>
                </select>
            </div>
        </div>
        <div class="col col-12 col-md-6">
            <div class="input-group sm mb-2">
                <label for="name_ar" class="input-group-text">{{__('branches.name_ar')}}</label>
                <input type="text" name="name_ar" class="form-control" placeholder="{{__('branches.name_ar-ph')}}" value="{{old('name_ar')}}">
            </div>
        </div>
        <div class="col col-12 col-md-6">
            <div class="input-group sm mb-2">
                <label for="name_en" class="input-group-text">{{__('branches.name_en')}}</label>
                <input type="text" name="name_en" class="form-control" placeholder="{{__('branches.name_en-ph')}}" value="{{old('name_en')}}">
            </div>
        </div>

        <div class="col col-12 col-md-6">
            <div class="input-group sm mb-2">
                <label for="tax_number" class="input-group-text">{{__('branches.tax_number')}}</label>
                <input type="text" name="tax_number" class="form-control" placeholder="{{__('branches.tax_number-ph')}}" value="{{old('tax_number')}}">
            </div>
        </div>
        <div class="col col-12 col-md-6">
            <div class="input-group sm mb-2">
                <label for="commercial_record" class="input-group-text">{{__('branches.commercial_record')}}</label>
                <input type="text" name="commercial_record" class="form-control" placeholder="{{__('branches.commercial_record-ph')}}" value="{{old('commercial_record')}}">
            </div>
        </div>
        <div class="col col-12 col-md-6">
            <div class="input-group sm mb-2">
                <label for="phone" class="input-group-text">{{__('branches.phone')}}</label>
                <input type="text" name="phone" class="form-control" placeholder="{{__('branches.phone-ph')}}" value="{{old('phone')}}">
            </div>
        </div>
        <div class="col col-12 col-md-6">
            <div class="input-group sm mb-2">
                <label for="mobile" class="input-group-text">{{__('branches.mobile')}}</label>
                <input type="text" name="mobile" class="form-control" placeholder="{{__('branches.mobile-ph')}}" value="{{old('mobile')}}">
            </div>
        </div>
        <div class="col col-12 col-md-6">
            <div class="input-group sm mb-2">
                <label for="email" class="input-group-text">{{__('branches.email')}}</label>
                <input type="text" name="email" class="form-control" placeholder="{{__('branches.email-ph')}}" value="{{old('email')}}">
            </div>
        </div>
        <div class="col col-12 col-md-6">
            <div class="input-group sm mb-2">
                <label for="website" class="input-group-text">{{__('branches.website')}}</label>
                <input type="text" name="website" class="form-control" placeholder="{{__('branches.website-ph')}}" value="{{old('website')}}">
            </div>
        </div>
        <div class="col col-12">
            <div class="input-group sm mb-2">
                <label for="country" class="input-group-text">{{__('branches.country')}}</label>
                <select name="country_id" class="form-select">
                    <option value="">{{__('branches.country_id-ph')}}</option>
                    @foreach($countries as $country)
                    <option value="{{$country->id}}" {{old('country_id') == $country->id ? 'selected' : ''}}>
                        {{$country->iso2 . ' ' . $country->name}}
                    </option>
                    @endforeach
                </select>

                <label for="region_id" class="input-group-text">{{__('branches.region')}}</label>
                <select name="region_id" class="form-select">
                    <option value="">{{__('branches.region-ph')}}</option>
                    @foreach($regions as $region)
                    <option value="{{$region->id}}" {{old('region_id') == $region->id ? 'selected' : ''}}>
                        {{$region->name}}
                    </option>
                    @endforeach
                </select>

                <label for="city_id" class="input-group-text">{{__('branches.city')}}</label>
                <select name="city_id" class="form-select">
                    <option value="">{{__('branches.city_id-ph')}}</option>
                    @foreach($cities as $city)
                    <option value="{{$city->id}}" {{old('city_id') == $city->id ? 'selected' : ''}}>
                        {{$city->name}}
                    </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col col-12">
            <div class="input-group sm mb-2">
                <label for="address" class="input-group-text">{{__('branches.address')}}</label>
                <input type="text" name="address" class="form-control" placeholder="address" value="{{old('address')}}">
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
                        <option value="{{$tz->id}}" {{old('timezone') == $tz->id ? 'selected' : ''}}>
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
                <input type="text" name="postal_code" class="form-control" placeholder="postal_code" value="{{old('postal_code')}}">
            </div>
        </div>
        <div class="col col-12 col-md-6">
            <div class="input-group sm mb-2">
                <label for="latitude" class="input-group-text">{{__('branches.latitude')}}</label>
                <input type="text" name="latitude" class="form-control" placeholder="{{__('branches.latitude-ph')}}" value="{{old('latitude')}}">
            </div>
        </div>
        <div class="col col-12 col-md-6">
            <div class="input-group sm mb-2">
                <label for="longitude" class="input-group-text">{{__('branches.longitude')}}</label>
                <input type="text" name="longitude" class="form-control" placeholder="{{__('branches.longitude-ph')}}" value="{{old('longitude')}}">
            </div>
        </div>
        <div class="col col-12 col-md-6">
            <div class="input-group sm mb-2">
                <label for="currency_id" class="input-group-text">{{__('branches.currency')}}</label>
                <input type="text" name="currency_id" class="form-control" placeholder="{{__('branches.currency-ph')}}" value="{{old('currency_id')}}">
            </div>
        </div>
        <div class="col col-12 col-md-6">
            <div class="input-group sm mb-2">
                <label for="opening_date" class="input-group-text">{{__('branches.opening_date')}}</label>
                <input class="form-control" type="date" name="opening_date" value="{{old('opening_date')}}">
            </div>
        </div>
        <div class="col col-12 col-md-6">
            <div class="input-group sm mb-2">
                <label for="fiscal_start_date" class="input-group-text">{{__('branches.fiscal_start_date')}}</label>
                <input type="date" name="fiscal_start_date" class="form-control" placeholder="{{__('branches.fiscal_start_date-ph')}}" value="{{old('fiscal_start_date')}}">
            </div>
        </div>
        <div class="col col-12 col-md-6">
            <div class="input-group sm mb-2">
                <label for="fiscal_end_date" class="input-group-text">{{__('branches.fiscal_end_date')}}</label>
                <input type="date" name="fiscal_end_date" class="form-control" placeholder="{{__('branches.fiscal_end_date-ph')}}" value="{{old('fiscal_end_date')}}">
            </div>
        </div>
        <div class="col col-12 col-md-6">

            <div class="input-group sm mb-2">
                <label for="is_active" class="input-group-text">{{__('branches.is_active')}}</label>
                <select name="is_active" class="form-select">
                    <option value="" hidden>{{__('branches.is_active-ph')}}</option>
                    <option value="active" {{old('is_active') == 'active' ? 'selected' : ''}}>{{__('branches.yes')}}</option>
                    <option value="inactive" {{old('is_active') == 'inactive' ? 'selected' : ''}}>{{__('branches.no')}}</option>
                </select>
            </div>
        </div>

        <div class="col col-12 col-md-6">
            <div class="input-group sm mb-2">
                <label for="is_online" class="input-group-text">{{__('branches.is_online')}}</label>
                <select name="is_online" class="form-select">
                    <option value="" hidden>{{__('branches.is_online-ph')}}</option>
                    <option value="online" {{old('is_online') == 'online' ? 'selected' : ''}}>{{__('branches.yes')}}</option>
                    <option value="offline" {{old('is_online') == 'offline' ? 'selected' : ''}}>{{__('branches.no')}}</option>
                </select>
            </div>
        </div>
        
    </div>

    <button type="submit" class="btn btn-primary">{{__('branches.save')}}</button>
</form>