@extends('layouts.admin')

@section('contents')
<div class="container-fluid">
  <div class="row">

    <div class="col-md-12">
      <div id="products-container">

        <h1 class="mt-3 pb-2" style="border-bottom: 1px solid #dedede">{{ __('sessions.list') }}
          <a class="ms-3 add-icon" data-bs-toggle="collapse" data-bs-target="#addShiftForm" aria-expanded="false"
            aria-controls="addShiftForm">
            <i data-bs-toggle="tooltip" title="{{ __('sessions.add_new') }}" class="fa fa-plus"></i>
          </a>
        </h1>

        <!-- هنا سيتم اضافة الشفتات -->
        <div class="col col-12 collapse pt-3" id="addShiftForm">
          <div class="row">
            <div class="col ">
              <div class="card card-body">
                <form action="/admin/sales-shifts/store" method="POST">
                  @csrf
                  <div class="input-group sm mb-2">
                    <label class="input-group-text" for="start_time">{{ __('sessions.start_time') }}</label>
                    <input type="datetime-local" class="form-control sm" name="start_time" id="start_time" value="{{ date('Y-m-d') }}" placeholder="YYYY-MM-DD">
                    <!-- <label class="input-group-text" for="end_time">{{ __('sessions.end_time') }}</label>
                      <input type="date" class="form-control sm" name="end_time" id="end_time"> -->
                    <label class="input-group-text" for="admin_id">{{ __('sessions.admins') }}</label>
                    <select class="form-select form-control sm py-0" name="admin_id" id="admin_id" required>
                      @forelse ($admins as $admin)
                      <option value="{{ $admin->id }}">
                        {{ $admin->userName }}
                        @if($admin->activeShift)
                        {{ __('sessions.has_active_shift') }}
                        @endif
                      </option>
                      @empty
                      <option value="" disabled>{{ __('sessions.no_admins') }}</option>
                      @endforelse
                    </select>

                    <label class="input-group-text" for="opening_balance">{{ __('sessions.opening_balance') }}</label>
                    <input type="number" class="form-control sm" name="opening_balance" id="opening_balance">
                  </div>
                  <div class="input-group sm mt-2">
                    <label class="input-group-text" for="monybox_id">{{ __('sessions.monyboxes') }}</label>
                    <select class="form-select form-control sm py-0" name="monybox_id" id="monybox_id" required>
                      @foreach ($monyBoxes as $monyBox)
                      <option value="{{ $monyBox->id }}">
                        {{ $monyBox->name }}
                        @if($monyBox->activeShift)
                        {{ __('sessions.box_has_active_shift') }}
                        @endif
                      </option>
                      @endforeach
                    </select>
                    <label class="input-group-text" for="notes">{{ __('sessions.notes') }}</label>
                    <input type="text" class="form-control sm" name="notes" id="notes">
                  </div>
                  <div class="input-group d-flex sm mt-2 justify-content-end" style="border-top: 1px solid #aaa">
                    <button type="submit" class="py-0 btn btn-primary p-3 mt-2">{{ __('sessions.save') }}</button>
                    <button type="reset" class="py-0 btn btn-secondary p-3 mt-2" id="add-item">{{ __('sessions.reset') }}</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="py-2" style="border-bottom: 1px solid #dedede"></div>
        </div>
      </div>
      <!-- هنا سيتم عرض المنتجات -->
      <table class="table table-striped mt-3">
        <thead>
          <tr>
            <th>#</th>
            <th>{{ __('sessions.monybox') }}</th>
            <th>{{ __('sessions.admin') }}</th>
            <th>{{ __('sessions.opening_balance') }}</th>
            <th>{{ __('sessions.status') }}</th>
            <th>{{ __('sessions.start_time') }}</th>
            <th>{{ __('sessions.actions') }}</th>
          </tr>
        </thead>
        <tbody>
          @foreach($shifts as $shift)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $shift->monybox->name }}</td>
            <td>{{ $shift->admin->userName }}</td>
            <td>{{ $shift->opening_balance }}</td>
            <td>
              <span class="badge bg-{{ $shift->status == 'Active' ? 'success' : 'danger' }}">
                {{ $shift->status == 'Active' ? __('sessions.active') : __('sessions.inactive') }}
              </span>
            </td>
            <td>{{ $shift->start_time->format('Y-m-d H:i') }}</td>
            <td>
              <a href="" class="btn btn-sm btn-info" title="{{ __('sessions.view_details') }}">
                <i class="fas fa-eye"></i>
              </a>
              <a href="{{ route('edit-shift-info',  $shift) }}" class="btn btn-sm btn-warning" title="{{ __('sessions.edit') }}">
                <i class="fas fa-edit"></i>
              </a>
              <a href="{{ route('destroy-shift-info', $shift) }}" class="btn btn-sm btn-danger" title="{{ __('sessions.delete') }}">
                <i class="fas fa-trash"></i>
              </a>
              @if($shift->status == 'Active')
              <a href="{{ route('shifts.close', $shift->id) }}" class="btn btn-sm btn-secondary" title="{{ __('sessions.close_session') }}">
                <i class="fas fa-lock"></i> {{ __('sessions.close') }}
              </a>
              @endif
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

</div>
<script>
  // var date = $('.fc-datepicker').datepicker({
  //   dateFormat: 'yy-mm-dd'
  // }).val();
</script>
@endsection