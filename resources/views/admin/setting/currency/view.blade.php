@extends('layouts.admin')
@section('header-links')

    <li class="breadcrumb-item"><a href="{{route('home-setting')}}">{{__('setting.home')}}</a></li>
    <li class="breadcrumb-item"><a href="{{route('display-currencies-list')}}">{{__('currency.currencies')}}</a></li>
    <li class="breadcrumb-item active">{{__('currency.currency-info')}}</li>
@endsection
@section('title', 'إعدادات العملة')

@section('contents')
<div class="container-fluid px-4">
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-transparent py-3">
                    <div class="row">
                        <div class="col">
                            <h4 class="mb-0">{{__('currency.currency-settings')}}</h4>
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-bottom:2rem">
                    <form action="{{ route('update-currency-info', $currency->id) }}" method="POST" id="currency-form" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <input type="hidden" name="currency_id" value="{{ $currency->id }}">
                        <div class="row">
                            <!-- العمود الأول -->
                            <div class="col-md-6">
                                <!-- رمز العملة -->
                                <div class="input-group mb-2">
                                    <label for="code" class="input-group-text">{{__('currency.code')}} (ISO) <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('code') is-invalid @enderror"
                                        id="code" name="code" value="{{ old('code', $currency->code) }}"
                                        placeholder="{{__('currency.currncy-code-input-ph')}}" maxlength="3" required>
                                </div>
                                @error('code')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <small class="form-text text-muted">{{__('currency.currncy-code-input-hint')}}</small>

                                <!-- اسم العملة -->
                                <div class="input-group mb-2">
                                    <label for="name" class="input-group-text">{{__('currency.name')}} <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        id="name" name="name" value="{{ old('name', $currency->name) }}"
                                        placeholder="{{__('currency.currncy-name-input-ph')}}" required>
                                </div>
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror

                                <!-- رمز العملة -->
                                <div class="input-group mb-2">
                                    <label for="symbol" class="input-group-text">{{__('currency.symbol')}} </label>
                                    <input type="text" class="form-control @error('symbol') is-invalid @enderror"
                                        id="symbol" name="symbol" value="{{ old('symbol', $currency->symbol) }}"
                                        placeholder="{{__('currency.currncy-symbol-input-ph')}}">
                                </div>
                                @error('symbol')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror

                                <!-- موقع الرمز -->
                                <label for="symbol_position" class="form-label">{{__('currency.symbol-position')}} </label>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-check form-switch mb-2">
                                            <input type="radio" id="symbol_before" name="symbol_position"
                                                value="before" class="form-check-input"
                                                {{ old('symbol_position', $currency->symbol_position) == 'before' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="symbol_before">{{__('currency.symbol-position-before')}}</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-check form-switch mb-2">
                                            <input type="radio" id="symbol_after" name="symbol_position"
                                                value="after" class="form-check-input"
                                                {{ old('symbol_position', $currency->symbol_position) == 'after' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="symbol_after">{{__('currency.symbol-position-after')}}</label>
                                        </div>
                                    </div>
                                </div>

                                @error('symbol_position')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <hr>
                                
                                <!-- تفعيل العملة -->
                                <div class="row">
                                    <div class="col-6">
                                        <label class="form-label">{{__('currency.currency-status')}}</label>
                                        <div class="form-check form-switch mb-2">
                                            <input type="radio" id="is_active" name="is_active"
                                                value="1" class="form-check-input"
                                                {{ old('is_active', $currency->is_active) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="is_active">{{__('currency.active')}}</label>
                                        </div>
                                    
                                        <div class="form-check form-switch">
                                            <input type="radio" id="is_inactive" name="is_active"
                                                value="0" class="form-check-input"
                                                {{ old('is_active', !$currency->is_active) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="is_inactive">{{__('currency.inactive')}}</label>
                                        </div>
                                    </div>

                                    @error('is_active')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror

                                    <div class="col-6">
                                        <!-- أيقونة العملة -->
                                        <label class="form-label">{{__('currency.icon')}} </label>
                                        <div class="mb-2">
                                            <div class="mb-2 text-center">
                                                <label for="icon" style="cursor:pointer; display:inline-block;">
                                                    <img id="iconPreview" src="{{ $currency->icon ? asset('assets/admin/uploads/' . $currency->icon) : asset('assets/admin/images/default-currency.png') }}" alt="Currency Icon"
                                                        style="width: 60px; height: 60px; object-fit: contain; border: 1px solid #ddd; border-radius: 50%;">
                                                </label>
                                                <input type="file" id="icon" name="icon" accept="image/*" style="display:none;">
                                                <br>
                                                <small class="form-text text-muted">{{__('currency.icon-hint')}}</small>
                                                @error('icon')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- العمود الثاني -->
                            <div class="col-md-6">
                                <!-- عدد المنازل العشرية -->
                                <div class="input-group mb-2">
                                    <label for="decimal_places" class="input-group-text">{{__('currency.decimal-places')}} </label>
                                    <select class="form-control @error('decimal_places') is-invalid @enderror"
                                        id="decimal_places" name="decimal_places">
                                        @for($i = 0; $i <= 6; $i++)
                                            <option value="{{ $i }}" {{ old('decimal_places', 2) == $i ? 'selected' : '' }}>
                                            {{ $i }} {{__('currency.decimal-places-option')}}
                                            </option>
                                            @endfor
                                    </select>
                                </div>
                                @error('decimal_places')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror

                                <!-- فاصل الكسور -->
                                <div class="input-group mb-2">
                                    <label for="decimal_separator" class="input-group-text">{{__('currency.decimal-separator')}} </label>
                                    <input type="text" class="form-control @error('decimal_separator') is-invalid @enderror"
                                        id="decimal_separator" name="decimal_separator"
                                        value="{{ old('decimal_separator', '.') }}" maxlength="1">
                                </div>
                                @error('decimal_separator')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror

                                <!-- فاصل الآلاف -->
                                <div class="input-group mb-2">
                                    <label for="thousands_separator" class="input-group-text">{{__('currency.thousands-separator')}} </label>
                                    <input type="text" class="form-control @error('thousands_separator') is-invalid @enderror"
                                        id="thousands_separator" name="thousands_separator"
                                        value="{{ old('thousands_separator', ',') }}" maxlength="1">
                                </div>
                                @error('thousands_separator')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror

                                <!-- سعر الصرف -->
                                <div class="input-group mb-2">
                                    <label for="exchange_rate" class="input-group-text">{{__('currency.exchange-rate')}} </label>
                                    <input type="number" step="0.000001" class="form-control @error('exchange_rate') is-invalid @enderror"
                                        id="exchange_rate" name="exchange_rate"
                                        value="{{ old('exchange_rate', 1.0) }}">
                                </div>
                                @error('exchange_rate')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <small class="form-text text-muted">{{__('currency.exchange-rate-hint')}}</small>
                                <hr>

                                <!-- العملة الافتراضية -->
                                <div class="input-group mb-2">
                                    <div class="form-check form-switch">
                                        <input type="checkbox" class="form-check-input" id="is_default"
                                            name="is_default" value="1" {{ old('is_default', $currency->is_default) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="is_default">{{__('currency.default-currency')}}</label>
                                    </div>
                                </div>
                                <small class="form-text text-muted">{{__('currency.default-currency-hint')}}</small>
                                <hr>
                                
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="d-flex justify-content-end gap-2">
                                <button type="submit" class="btn btn-outline-primary py-1">
                                    <i class="fas fa-save"></i> {{__('currency.update-currency')}}
                                </button>
                                <button type="reset" class="btn btn-outline-secondary py-1">
                                    <i class="fas fa-undo"></i> {{__('currency.reset-form')}}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('extra-scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
<script>
    // تأكد من تحميل jQuery
        $(document).ready(function() {
            
            // فتح نافذة اختيار الصورة عند الضغط على الصورة نفسها
            $('#iconPreview').on('click', function() {
                
                $('#icon').trigger('click');
            });

            // معاينة صورة الأيقونة قبل الحفظ
            $('#icon').on('change', function(event) {
                
                const files = event.target.files;
                
                if (files && files[0]) {
                    
                    
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        
                        $('#iconPreview').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(files[0]);
                }
            });

            // تحويل رمز العملة إلى أحرف كبيرة تلقائياً
            $('#code').on('input', function() {
                this.value = this.value.toUpperCase();
            });

            // التحقق من صحة النموذج قبل الإرسال
            if ($.validator) {
                
                $('#currency-form').validate({
                    rules: {
                        code: {
                            required: true,
                            minlength: 3,
                            maxlength: 3
                        },
                        name: {
                            required: true,
                            minlength: 3
                        },
                        decimal_separator: {
                            required: true,
                            maxlength: 1
                        },
                        thousands_separator: {
                            required: true,
                            maxlength: 1
                        }
                    },
                    messages: {
                        code: {
                            required: "حقل رمز العملة مطلوب",
                            minlength: "يجب أن يتكون رمز العملة من 3 أحرف",
                            maxlength: "يجب أن يتكون رمز العملة من 3 أحرف"
                        },
                        name: {
                            required: "حقل اسم العملة مطلوب",
                            minlength: "يجب أن يكون اسم العملة على الأقل 3 أحرف"
                        }
                    }
                });

        });
</script>
@endsection