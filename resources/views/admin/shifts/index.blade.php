@extends('layouts.admin')

@section('contents')
<div class="container-fluid">
  <div class="row">

    <div class="col-md-12">
      <div id="products-container">

        <h1 class="mt-3 pb-2" style="border-bottom: 1px solid #dedede"> sessions List
          <a class="ms-3 add-icon" data-bs-toggle="collapse" data-bs-target="#addShiftForm" aria-expanded="false"
            aria-controls="addShiftForm">
            <i data-bs-toggle="tooltip" title="Add New session" class="fa fa-plus"></i>
          </a>
        </h1>

        <!-- هنا سيتم اضافة الشفتات -->
        <div class="col col-12 collapse  pt-3" id="addShiftForm">
          <div class="row">
            <div class="col ">
              <div class="card card-body">
                <form action="/admin/sales-shifts/store" method="POST">
                  @csrf
                  <div class="input-group sm mb-2">
                    <label class="input-group-text" for="start_time">Start Time</label>
                    <input type="datetime" class="form-control sm" name="start_time" id="start_time" value="{{ date('Y-m-d') }}" placeholder="YYYY-MM-DD">
                    <!-- <label class="input-group-text" for="start_time">End Time</label>
                      <input type="date" class="form-control sm" name="end_time" id="end_time"> -->
                    <label class="input-group-text" for="admin_id"> Admins</label>
                    <select class="form-select form-control sm py-0" name="admin_id" id="admin_id" required>
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

                    <label class="input-group-text" for="opening_balance">Opening Balance</label>
                    <input type="number" class=" form-control sm " name="opening_balance" id="opening_balance">
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
                    <input type="text" class="form-control sm" name="notes" id="notes">
                    <!-- <div class="input-group-text">
                      <input class="form-check-input mt-0" name="status" type="checkbox" value="true"
                        aria-label="Checkbox for following text input">
                    </div>
                    <button type="button" class="input-group-text text-start">Active</button> -->
                  </div>
                  <div class="input-group d-flex sm mt-2 justify-content-end" style="border-top: 1px solid #aaa">
                    <button type="submit" class="py-0 btn btn-primary p-3 mt-2">Save Shift</button>
                    <button type="reset" class="py-0 btn btn-secondary p-3 mt-2" id="add-item">reset</button>
                  </div>
                </form>
              </div>
            </div>

          </div>
          <div class="py-2" style="border-bottom: 1px solid #dedede"></div>
        </div>
      </div>
      <!-- هنا سيتم عرض المنتجات -->
      <table class="table table-striped  mt-3">
        <thead>
          <tr>
            <th>#</th>
            <th>MonyBox</th>
            <th>Admin</th>
            <th>Opening Balance</th>
            <th>Status</th>
            <th>Start Time</th>
            <th>Actions</th>
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
                {{ $shift->status }}
              </span>
            </td>
            <td>{{ $shift->start_time->format('Y-m-d H:i') }}</td>
            <td>
              <a href="" class="btn btn-sm btn-info">
                <i class="fas fa-eye"></i>
              </a>
              <a href="{{ route('edit-shift-info',  $shift) }}" class="btn btn-sm btn-warning">
                <i class="fas fa-edit"></i>
              </a>
              <a href="{{ route('destroy-shift-info', $shift) }}" class="btn btn-sm btn-danger">
                <i class="fas  fa-trash"></i>
              </a>
              @if($shift->status == 'Active')
              <a href="{{ route('shifts.close', $shift->id) }}" class="btn btn-sm btn-secondary">

                <i class="fas fa-lock"></i> Close

                </form>
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