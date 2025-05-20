
@extends('layouts.admin')
@section('contents')
<h2 class="mt-4 pb-2" style="border-bottom: 1px solid #dedede">
  <i class="fa fa-edit px-1"></i> {{ __('sessions.update_shift') }}
</h2>
<fieldset class="mt-2 mb-4 mx-0 mb-0 shadow-sm">

  <div class="row">
    <div class="card-body">
      <form action="{{ route('update-shift-info') }}" method="POST">
        <input type="hidden" name="id" value="{{ $shift->id }}">
        @csrf
        <div class="input-group sm mb-2">
          <label class="input-group-text" for="start_time">{{ __('sessions.start_time') }}</label>
          <input type="text" class="form-control sm" name="start_time" id="start_time" value="{{ old('start_time', $shift->start_time) }}">
          <!-- <label class="input-group-text" for="end_time">{{ __('sessions.end_time') }}</label>
          <input type="date" class="form-control sm" name="end_time" id="end_time"> -->
          <label class="input-group-text" for="admin_id">{{ __('sessions.admins') }}</label>
          <select class="form-select form-control sm py-0" name="admin_id" id="admin_id">
            @forelse ($admins as $admin)
            <option value="{{ $admin->id }}" {{ $shift->admin_id == $admin->id ? 'selected' : '' }}>
              {{ $admin->userName }}
              @if($admin->activeShift)
                {{ __('sessions.has_active_shift') }}
              @endif
            </option>
            @empty
            <option value="" disabled>{{ __('sessions.no_admins') }}</option>
            @endforelse
          </select>
        </div>
        <div class="input-group sm mt-2">
          <label class="input-group-text" for="monybox_id">{{ __('sessions.monyboxes') }}</label>
          <select class="form-select form-control sm py-0" name="monybox_id" id="monybox_id" required>
            @foreach ($monyBoxes as $monyBox)
            <option value="{{ $monyBox->id }}" {{ $shift->monybox_id == $monyBox->id ? 'selected' : '' }}>
              {{ $monyBox->name }}
              @if($monyBox->activeShift)
                {{ __('sessions.box_has_active_shift') }}
              @endif
            </option>
            @endforeach
          </select>
          <label class="input-group-text" for="notes">{{ __('sessions.notes') }}</label>
          <input type="text" class="form-control sm" name="notes" id="notes" value="{{ old('notes', $shift->notes) }}">

          <label class="input-group-text" for="opening_balance">{{ __('sessions.opening_balance') }}</label>
          <input type="number" class="form-control sm" name="opening_balance" id="opening_balance" value="{{ old('opening_balance', $shift->opening_balance) }}">

          <button type="reset" class="input-group-text btn py-0 btn-outline-secondary"
            data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __('sessions.reset_form') }}">
            <i class="fas fa-undo me-1"></i> {{ __('sessions.reset') }}
          </button>
          <button type="submit" class="input-group-text btn py-0 btn-primary" data-bs-toggle="tooltip"
            data-bs-placement="top" title="{{ __('sessions.save_shift_changes') }}">
            <i class="fas fa-save me-1"></i> {{ __('sessions.update') }}
          </button>
        </div>
      </form>
    </div>
  </div>
</fieldset>
@endsection