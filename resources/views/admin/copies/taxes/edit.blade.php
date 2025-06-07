@extends('layouts.admin')

@section('title', 'تعديل ضريبة')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">تعديل ضريبة: {{ $tax->tax_name_ar }}</h3>
                </div>
                <!-- /.card-header -->
                <form action="{{ route('admin.taxes.update', $tax->id) }}" method="POST" id="tax-form">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tax_code">كود الضريبة <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('tax_code') is-invalid @enderror" 
                                           id="tax_code" name="tax_code" value="{{ old('tax_code', $tax->tax_code) }}" required>
                                    @error('tax_code')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tax_type">نوع الضريبة <span class="text-danger">*</span></label>
                                    <select class="form-control @error('tax_type') is-invalid @enderror" 
                                            id="tax_type" name="tax_type" required>
                                        <option value="">اختر نوع الضريبة</option>
                                        <option value="PERCENTAGE" {{ old('tax_type', $tax->tax_type) == 'PERCENTAGE' ? 'selected' : '' }}>نسبة مئوية</option>
                                        <option value="FIXED_AMOUNT" {{ old('tax_type', $tax->tax_type) == 'FIXED_AMOUNT' ? 'selected' : '' }}>قيمة ثابتة</option>
                                    </select>
                                    @error('tax_type')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tax_name_ar">اسم الضريبة (عربي) <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('tax_name_ar') is-invalid @enderror" 
                                           id="tax_name_ar" name="tax_name_ar" value="{{ old('tax_name_ar', $tax->tax_name_ar) }}" required>
                                    @error('tax_name_ar')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tax_name_en">اسم الضريبة (إنجليزي) <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('tax_name_en') is-invalid @enderror" 
                                           id="tax_name_en" name="tax_name_en" value="{{ old('tax_name_en', $tax->tax_name_en) }}" required>
                                    @error('tax_name_en')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tax_rate">قيمة الضريبة <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input type="number" step="0.01" min="0" 
                                               class="form-control @error('tax_rate') is-invalid @enderror" 
                                               id="tax_rate" name="tax_rate" value="{{ old('tax_rate', $tax->tax_rate) }}" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="rate_suffix">
                                                {{ $tax->tax_type === 'PERCENTAGE' ? '%' : config('settings.currency_symbol', 'ر.س') }}
                                            </span>
                                        </div>
                                        @error('tax_rate')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="gl_account_code">كود حساب دفتر الأستاذ</label>
                                    <input type="text" class="form-control @error('gl_account_code') is-invalid @enderror" 
                                           id="gl_account_code" name="gl_account_code" value="{{ old('gl_account_code', $tax->gl_account_code) }}">
                                    @error('gl_account_code')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="effective_from">تاريخ السريان من <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control @error('effective_from') is-invalid @enderror" 
                                           id="effective_from" name="effective_from" 
                                           value="{{ old('effective_from', $tax->effective_from ? $tax->effective_from->format('Y-m-d') : now()->format('Y-m-d')) }}" required>
                                    @error('effective_from')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="effective_to">تاريخ السريان إلى</label>
                                    <input type="date" class="form-control @error('effective_to') is-invalid @enderror" 
                                           id="effective_to" name="effective_to" 
                                           value="{{ old('effective_to', $tax->effective_to ? $tax->effective_to->format('Y-m-d') : '') }}">
                                    <small class="form-text text-muted">اتركه فارغًا إذا كانت الضريبة دائمة</small>
                                    @error('effective_to')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="is_active" 
                                               name="is_active" value="1" {{ old('is_active', $tax->is_active) ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="is_active">الحالة (نشط/غير نشط)</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="is_inclusive" 
                                               name="is_inclusive" value="1" {{ old('is_inclusive', $tax->is_inclusive) ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="is_inclusive">ضريبة شاملة للسعر</label>
                                        <small class="form-text text-muted d-block">
                                            إذا تم التفعيل، ستكون الضريبة مضمنة في سعر المنتج.
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>مجموعات الضرائب</label>
                            <select class="select2 form-control @error('tax_groups') is-invalid @enderror" 
                                    name="tax_groups[]" multiple="multiple" data-placeholder="اختر مجموعات الضرائب" 
                                    style="width: 100%;">
                                @foreach($taxGroups as $group)
                                    <option value="{{ $group->id }}" 
                                        {{ in_array($group->id, old('tax_groups', $tax->taxGroups->pluck('id')->toArray())) ? 'selected' : '' }}>
                                        {{ $group->group_name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('tax_groups')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> حفظ التغييرات
                        </button>
                        <a href="{{ route('admin.taxes.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-right"></i> رجوع
                        </a>
                    </div>
                </form>
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</div>
<!-- /.container -->
@endsection

@push('styles')
<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('adminlte/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endpush

@push('scripts')
<!-- Select2 -->
<script src="{{ asset('adminlte/plugins/select2/js/select2.full.min.js') }}"></script>
<!-- jquery-validation -->
<script src="{{ asset('adminlte/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/jquery-validation/additional-methods.min.js') }}"></script>

<script>
    $(document).ready(function() {
        // Initialize Select2
        $('.select2').select2({
            theme: 'bootstrap4',
            dir: 'rtl'
        });

        // Change rate suffix based on tax type
        $('#tax_type').on('change', function() {
            const type = $(this).val();
            if (type === 'PERCENTAGE') {
                $('#rate_suffix').text('%');
                $('#tax_rate').attr('step', '0.01').attr('max', '100');
            } else if (type === 'FIXED_AMOUNT') {
                $('#rate_suffix').text('{{ config('settings.currency_symbol', 'ر.س') }}');
                $('#tax_rate').removeAttr('max');
            }
        });

        // Trigger change on page load
        $('#tax_type').trigger('change');

        // Form validation
        $('#tax-form').validate({
            rules: {
                tax_code: {
                    required: true,
                    maxlength: 20
                },
                tax_name_ar: {
                    required: true,
                    maxlength: 100
                },
                tax_name_en: {
                    required: true,
                    maxlength: 100
                },
                tax_rate: {
                    required: true,
                    min: 0
                },
                effective_from: {
                    required: true,
                    date: true
                },
                effective_to: {
                    date: true,
                    greaterThan: '#effective_from'
                }
            },
            messages: {
                tax_code: {
                    required: 'يرجى إدخال كود الضريبة',
                    maxlength: 'يجب ألا يزيد كود الضريبة عن 20 حرفًا'
                },
                tax_name_ar: {
                    required: 'يرجى إدخال اسم الضريبة بالعربية',
                    maxlength: 'يجب ألا يزيد اسم الضريبة عن 100 حرف'
                },
                tax_name_en: {
                    required: 'يرجى إدخال اسم الضريبة بالإنجليزية',
                    maxlength: 'يجب ألا يزيد اسم الضريبة عن 100 حرف'
                },
                tax_rate: {
                    required: 'يرجى إدخال قيمة الضريبة',
                    min: 'يجب أن تكون قيمة الضريبة أكبر من أو تساوي صفر'
                },
                effective_from: {
                    required: 'يرجى تحديد تاريخ بدء السريان',
                    date: 'تاريخ غير صالح'
                },
                effective_to: {
                    date: 'تاريخ غير صالح',
                    greaterThan: 'يجب أن يكون تاريخ الانتهاء بعد تاريخ البداية'
                }
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });

        // Custom validation method for date comparison
        $.validator.addMethod("greaterThan", 
            function(value, element, params) {
                if (!value) return true; // Allow empty
                if (!/Invalid|NaN/.test(new Date(value))) {
                    return new Date(value) > new Date($(params).val());
                }
                return isNaN(value) && isNaN($(params).val()) 
                    || (Number(value) > Number($(params).val())); 
            },
            'يجب أن يكون التاريخ أكبر من تاريخ البداية'
        );
    });
</script>
@endpush
