@foreach ($settings as $setting)
<form class="" method="POST" action="{{ route('admin.settings.update', $setting->id) }}">
    @csrf
    @method('PUT')
    <div class="input-group sm mb-2">
        <label class="input-group-text" for="timezone">{{ __('الإعدادات المنطقة الزمنية') }}</label>
        <select class="form-select" name="timezone" id="timezone" onchange="this.form.submit()">
            <option value="">{{ __('اختر المنطقة الزمنية') }}</option>
            @foreach ($timezones as $group => $tzs)
                <optgroup label="{{ $group }}">
                    @foreach ($tzs as $tz)
                        <option value="{{ $tz->tz_value }}" {{ old('timezone', $setting->timezone) == $tz->tz_value ? 'selected' : '' }}>
                            {{ app()->getLocale() == 'ar' ? $tz->name_ar : $tz->name_en }} ({{ $tz->tz_value }})
                        </option>
                    @endforeach
                </optgroup>
            @endforeach
        </select>
    </div>
</form>
<form class="" method="POST" action="{{ route('admin.settings.update', $setting->id) }}">
    @csrf
    @method('PUT')

    <div class="input-group sm mb-2">
        <label class="input-group-text" for="company_name">Company Name:</label>
        <input class="form-control" id="company_name" type="text" name="company_name" value="{{ old('company_name', $setting->company_name) }}"
            onchange="this.form.submit()">
    </div>
</form>

<form class="" method="POST" action="{{ route('admin.settings.update', $setting->id) }}">
    @csrf
    @method('PUT')

    <div class="input-group sm mb-2">
        <label class="input-group-text" for="tax_number">Tax Number:</label>
        <input class="form-control" type="text" name="tax_number" value="{{ old('tax_number', $setting->tax_number) }}"
            onchange="this.form.submit()">
    </div>
</form>

<form class="" method="POST" action="{{ route('admin.settings.update', $setting->id) }}">
    @csrf
    @method('PUT')

    <div class="input-group sm mb-2">
        <label class="input-group-text" for="commercial_registration">Commercial Registration:</label>
        <input class="form-control" type="text" name="commercial_registration" value="{{ old('commercial_registration', $setting->commercial_registration) }}"
            onchange="this.form.submit()">
    </div>
</form>

<form class="" method="POST" action="{{ route('admin.settings.update', $setting->id) }}">
    @csrf
    @method('PUT')

    <div class="input-group sm mb-2">
        <label class="input-group-text" for="phone">Phone:</label>
        <input class="form-control" type="text" name="phone" value="{{ old('phone', $setting->phone) }}"
            onchange="this.form.submit()">
    </div>
    <div class="input-group sm">
        <label class="input-group-text" for="logo">Logo:</label>
        <img src="{{ asset('assets/admin/uploads/images/' . $setting->logo) }}">
    </div>
</form>

@endforeach