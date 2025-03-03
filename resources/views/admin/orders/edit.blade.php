@extends('layouts.admin')
@section('contents')
<h2 class="mt-4 pb-2" style="border-bottom: 1px solid #dedede"><i class="fa fa-edit px-1"></i> Update Order Status  </h2>
<fieldset class="mt-2 mb-4 mx-0 mb-0 shadow-sm">

  <div class="row">
    <div
      class=" card-body ">
      <form action="{{ route('update-order-info') }}" method="POST">
        <input type="hidden" name="id" value="{{ $order->id }}">
        @csrf
        <div class="input-group  mb-2">
        <label class="input-group-text" for="serial_number">Serial Number</label>
          <input type="number" class="form-control sm" name="serial_number" id="serial_number" value="{{$order->serial_number}}" disabled>
          <label class="input-group-text" for="admin_id">Status</label>
            <select class="form-select form-control sm py-0" name="status" id="status">
            @foreach ($status as $key => $value)
            <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
          </select>
        
          <button type="reset" class="input-group-text btn py-0 btn-outline-secondary"
            data-bs-toggle="tooltip" data-bs-placement="top" title="Reset form to original values">
            <i class="fas fa-undo me-1"></i> Reset
          </button>
          <button type="submit" class="input-group-text btn py-0 btn-primary" data-bs-toggle="tooltip"
            data-bs-placement="top" title="Save order Info changes">
            <i class="fas fa-save me-1"></i> Update
          </button>
        </div>
      
      
    </div>

  


    </form>
  </div>

  </div>
</fieldset>
@endsection