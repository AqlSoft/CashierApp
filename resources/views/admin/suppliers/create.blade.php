@extends('admin.layouts.master')

@section('title', 'إضافة مورد جديد')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">إضافة مورد جديد</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.suppliers.index') }}" class="btn btn-default">
                            <i class="fas fa-arrow-right"></i> رجوع
                        </a>
                    </div>
                </div>
                <form action="{{ route('admin.suppliers.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">اسم المورد <span class="text-danger">*</span></label>
                                    <input type="text" 
                                           name="name" 
                                           id="name" 
                                           class="form-control @error('name') is-invalid @enderror" 
                                           value="{{ old('name') }}" 
                                           required>
                                    @error('name')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="company_name">اسم الشركة</label>
                                    <input type="text" 
                                           name="company_name" 
                                           id="company_name" 
                                           class="form-control @error('company_name') is-invalid @enderror" 
                                           value="{{ old('company_name') }}">
                                    @error('company_name')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone">رقم الهاتف <span class="text-danger">*</span></label>
                                    <input type="text" 
                                           name="phone" 
                                           id="phone" 
                                           class="form-control @error('phone') is-invalid @enderror" 
                                           value="{{ old('phone') }}" 
                                           required>
                                    @error('phone')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">البريد الإلكتروني</label>
                                    <input type="email" 
                                           name="email" 
                                           id="email" 
                                           class="form-control @error('email') is-invalid @enderror" 
                                           value="{{ old('email') }}">
                                    @error('email')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tax_number">الرقم الضريبي</label>
                                    <input type="text" 
                                           name="tax_number" 
                                           id="tax_number" 
                                           class="form-control @error('tax_number') is-invalid @enderror" 
                                           value="{{ old('tax_number') }}">
                                    @error('tax_number')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="commercial_record">السجل التجاري</label>
                                    <input type="text" 
                                           name="commercial_record" 
                                           id="commercial_record" 
                                           class="form-control @error('commercial_record') is-invalid @enderror" 
                                           value="{{ old('commercial_record') }}">
                                    @error('commercial_record')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="address">العنوان</label>
                            <textarea name="address" 
                                      id="address" 
                                      class="form-control @error('address') is-invalid @enderror" 
                                      rows="3">{{ old('address') }}</textarea>
                            @error('address')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="notes">ملاحظات</label>
                            <textarea name="notes" 
                                      id="notes" 
                                      class="form-control @error('notes') is-invalid @enderror" 
                                      rows="3">{{ old('notes') }}</textarea>
                            @error('notes')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> حفظ
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
