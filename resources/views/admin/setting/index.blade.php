@extends('layouts.admin')

@section('contents')

<div class="row">
  <div class="col-lg-12 col-sm-12">
    <h1 class="mt-3 pb-2" style="border-bottom: 1px solid #dedede">General Setting</h1>
    @foreach ($settings as $setting)
    <form method="POST" action="{{ route('admin.settings.update', $setting->id) }}">
      @csrf
      @method('PUT')
      
      <div class="row">
        <div class="col col-3">Company Name:</div>
        <div class="col col-9">
          <input type="text" name="company_name" value="{{ old('company_name', $setting->company_name) }}" 
                 onchange="this.form.submit()" style="width: 100%;border: 1px solid #dedede">
        </div>
      </div>
    </form>

    <form method="POST" action="{{ route('admin.settings.update', $setting->id) }}">
      @csrf
      @method('PUT')
      
      <div class="row">
        <div class="col col-3">Tax Number:</div>
        <div class="col col-9">
          <input type="text" name="tax_number" value="{{ old('tax_number', $setting->tax_number) }}" 
                 onchange="this.form.submit()" style="width: 100%;border: 1px solid #dedede">
        </div>
      </div>
    </form>

    <form method="POST" action="{{ route('admin.settings.update', $setting->id) }}">
      @csrf
      @method('PUT')
      
      <div class="row">
        <div class="col col-3">Commercial Registration:</div>
        <div class="col col-9">
          <input type="text" name="commercial_registration" value="{{ old('commercial_registration', $setting->commercial_registration) }}" 
                 onchange="this.form.submit()" style="width: 100%;border: 1px solid #dedede">
        </div>
      </div>
    </form>

    <form method="POST" action="{{ route('admin.settings.update', $setting->id) }}">
      @csrf
      @method('PUT')
      
      <div class="row">
        <div class="col col-3">Phone:</div>
        <div class="col col-9">
          <input type="text" name="phone" value="{{ old('phone', $setting->phone) }}" 
                 onchange="this.form.submit()" style="width: 100%;border: 1px solid #dedede">
        </div>
      </div>
    </form>

    <div class="row">
      <div class="col col-3">Logo:</div>
      <div class="col col-9">
        <img src="{{ asset('assets/admin/uploads/images/' . $setting->logo) }}">
      </div>
    </div>
    @endforeach
  </div>
</div>

@endsection