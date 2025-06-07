@extends('layouts.admin')

@section('title', 'تعديل مجموعة الضرائب: ' . $taxGroup->group_name_ar)

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">تعديل مجموعة الضرائب: {{ $taxGroup->group_name_ar }}</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.tax-groups.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-right"></i> رجوع للقائمة
                        </a>
                    </div>
                </div>
                <!-- /.card-header -->
                <form action="{{ route('admin.tax-groups.update', $taxGroup->id) }}" method="POST" id="tax-group-form">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="group_code">كود المجموعة <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('group_code') is-invalid @enderror" 
                                           id="group_code" name="group_code" value="{{ old('group_code', $taxGroup->group_code) }}" required>
                                    @error('group_code')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="custom-control custom-switch mt-4 pt-2">
                                        <input type="checkbox" class="custom-control-input" id="is_active" 
                                               name="is_active" value="1" {{ old('is_active', $taxGroup->is_active) ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="is_active">تفعيل المجموعة</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="group_name_ar">اسم المجموعة (عربي) <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('group_name_ar') is-invalid @enderror" 
                                           id="group_name_ar" name="group_name_ar" value="{{ old('group_name_ar', $taxGroup->group_name_ar) }}" required>
                                    @error('group_name_ar')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="group_name_en">اسم المجموعة (إنجليزي) <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('group_name_en') is-invalid @enderror" 
                                           id="group_name_en" name="group_name_en" value="{{ old('group_name_en', $taxGroup->group_name_en) }}" required>
                                    @error('group_name_en')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="description">الوصف</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" 
                                      id="description" name="description" rows="3">{{ old('description', $taxGroup->description) }}</textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>الضرائب المدرجة <span class="text-danger">*</span></label>
                            <div class="select2-primary">
                                <select class="select2 form-control @error('taxes') is-invalid @enderror" 
                                        name="taxes[]" multiple="multiple" data-placeholder="اختر الضرائب" 
                                        style="width: 100%;" required>
                                    @foreach($taxes as $tax)
                                        <option value="{{ $tax->id }}" {{ in_array($tax->id, old('taxes', $selectedTaxes)) ? 'selected' : '' }}>
                                            {{ $tax->tax_name_ar }} ({{ $tax->tax_rate }}%)
                                        </option>
                                    @endforeach
                                </select>
                                @error('taxes')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> حفظ التغييرات
                        </button>
                        <a href="{{ route('admin.tax-groups.index') }}" class="btn btn-secondary">
                            <i class="fas fa-times"></i> إلغاء
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
<style>
    .select2-container--default .select2-selection--multiple .select2-selection__choice {
        background-color: #007bff;
        border-color: #006fe6;
        color: #fff;
        padding: 0 10px;
        margin-top: 0.31rem;
    }
    .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
        color: rgba(255, 255, 255, 0.7);
        margin-right: 5px;
        border-right: 1px solid rgba(255, 255, 255, 0.3);
        padding-right: 5px;
    }
    .select2-container--default .select2-selection--multiple .select2-selection__choice__remove:hover {
        color: #fff;
    }
</style>
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
            dir: 'rtl',
            width: '100%',
            placeholder: 'اختر الضرائب',
            allowClear: true
        });

        // Form validation
        $('#tax-group-form').validate({
            rules: {
                group_code: {
                    required: true,
                    maxlength: 20,
                    remote: {
                        url: '{{ route("admin.tax-groups.check-code") }}',
                        type: 'post',
                        data: {
                            _token: '{{ csrf_token() }}',
                            group_code: function() {
                                return $('#group_code').val();
                            },
                            group_id: '{{ $taxGroup->id }}'
                        }
                    }
                },
                group_name_ar: {
                    required: true,
                    maxlength: 100
                },
                group_name_en: {
                    required: true,
                    maxlength: 100
                },
                'taxes[]': {
                    required: true,
                    minlength: 1
                }
            },
            messages: {
                group_code: {
                    required: 'يرجى إدخال كود المجموعة',
                    maxlength: 'يجب ألا يزيد كود المجموعة عن 20 حرفًا',
                    remote: 'كود المجموعة مستخدم مسبقًا'
                },
                group_name_ar: {
                    required: 'يرجى إدخال اسم المجموعة بالعربية',
                    maxlength: 'يجب ألا يزيد اسم المجموعة عن 100 حرف'
                },
                group_name_en: {
                    required: 'يرجى إدخال اسم المجموعة بالإنجليزية',
                    maxlength: 'يجب ألا يزيد اسم المجموعة عن 100 حرف'
                },
                'taxes[]': {
                    required: 'يجب اختيار ضريبة واحدة على الأقل',
                    minlength: 'يجب اختيار ضريبة واحدة على الأقل'
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
    });
</script>
@endpush
