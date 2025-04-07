@extends('layouts.admin')
@section('contents')
<h2 class="mt-4 pb-2" style="border-bottom: 1px solid #dedede"><i class="fa fa-edit px-1"></i> Update Shift </h2>
<fieldset class="mt-2 mb-4 mx-0 mb-0 shadow-sm">

  <div class="row">
    <div
      class=" card-body ">
      <form action="{{ route('update-shift-info') }}" method="POST">
        <input type="hidden" name="id" value="{{ $shift->id }}">
        @csrf
        <div class="input-group sm mb-2">
        <label class="input-group-text" for="start_time">Start Time</label>
        <input type="text" class="form-control sm" name="start_time" id="start_time" value="{{ old('start_time', $shift) }}">
        <!-- <label class="input-group-text" for="start_time">End Time</label>
                      <input type="date" class="form-control sm" name="end_time" id="end_time"> -->
        <label class="input-group-text" for="admin_id"> Admins</label>
        <select class="form-select form-control sm py-0" name="admin_id" id="admin_id">
          @forelse ($admins as $admin)
          <option value="{{ $admin->id }}">
            {{ $admin->userName }}
            @if($admin->activeShift)
            (لديه شفت نشط حالياً)
            @endif
          </option>
          @empty
          <option value="" disabled>لا يوجد مستخدمين متاحين</option>
          @endforelse
        </select>
</div>
        <div class="input-group sm mt-2">
          <label class="input-group-text" for="monybox_id"> MonyBoxes</label>
          <select class="form-select form-control sm py-0" name="monybox_id" id="monybox_id" required>
            @foreach ($monyBoxes as $monyBox)
            <option value="{{ $monyBox->id }}">
              {{ $monyBox->name }}
              @if($monyBox->activeShift)
              (يوجد شفت نشط حالياً)
              @endif
            </option>
            @endforeach
          </select>
          <label class="input-group-text" for="notes">Notes</label>
          <input type="text" class="form-control sm" name="notes" id="notes" value="{{ old('notes', $shift) }}">

      
        <label class="input-group-text" for="opening_balance">Opening Balance</label>
        <input type="number" class=" form-control sm " name="opening_balance" id="opening_balance" value="{{ old('opening_balance', $shift) }}">

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