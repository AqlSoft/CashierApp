@extends('layouts.admin')

@section('contents')
<div class="container-fluid">
  <div class="row">

    <div class="col-md-12">
      <div id="">
        <h1 class="mt-3 pb-2 header-border">{{ __('monyBoxes.list') }}
          <a class="ms-3 add-icon" data-bs-toggle="collapse" data-bs-target="#addMonyBoxForm" aria-expanded="false"
            aria-controls="addMonyBoxForm">
            <i data-bs-toggle="tooltip" title="{{ __('monyBoxes.add_new') }}" class="fa fa-plus"></i>
          </a>
        </h1>
       
        <!-- هنا سيتم اضافة الخزن -->
        <div class="row">
          <div class="col col-12 collapse pt-3" id="addMonyBoxForm">
            <div class="row">
              <div class="col ">
                <div class="card card-body">
                  <form action="{{route('store-Mony-box')}}" method="POST">
                    @csrf
                    <div class="input-group sm mb-2">
                      <label class="input-group-text" for="name">{{ __('monyBoxes.name') }}</label>
                      <input type="text" class="form-control sm" name="name" id="name" value="">
                      <label class="input-group-text" for="date">{{ __('monyBoxes.date') }}</label>
                      <input type="datetime-local" value="{{ date('Y-m-d') }}" placeholder="YYYY-MM-DD" class="fc-datepicker form-control sm" name="date" id="date">
                    </div>
                    <div class="input-group sm mt-2">
                      <label class="input-group-text" for="last_isal_exhcange">{{ __('monyBoxes.last_exchange') }}</label>
                      <input type="text" class="form-control sm" name="last_isal_exhcange" id="last_isal_exhcange">
                      <label class="input-group-text" for="last_isal_collect">{{ __('monyBoxes.last_collection') }}</label>
                      <input type="text" class="form-control sm" name="last_isal_collect" id="last_isal_collect">
                      <div class="input-group-text">
                        <input class="form-check-input mt-0" name="status" type="checkbox" value="true"
                          aria-label="Checkbox for following text input">
                      </div>
                      <button type="button" class="input-group-text text-start">{{ __('monyBoxes.active') }}</button>
                    </div>
                    <div class="input-group d-flex sm mt-2 justify-content-end" style="border-top: 1px solid #aaa">
                      <button type="submit" class="py-0 btn btn-primary p-3 mt-2">{{ __('monyBoxes.save') }}</button>
                      <button type="reset" class="py-0 btn btn-secondary p-3 mt-2" id="add-item">{{ __('monyBoxes.reset') }}</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="py-2" style="border-bottom: 1px solid #dedede"></div>
          </div>
        </div>
        <!-- هنا سيتم عرض الخزن -->
        <table class="table table-striped mt-3">
          <thead class="table-light">
            <tr>
              <th>#</th>
              <th>{{ __('monyBoxes.name') }}</th>
              <th>{{ __('monyBoxes.date') }}</th>
              <th>{{ __('monyBoxes.last_exchange') }}</th>
              <th>{{ __('monyBoxes.last_collection') }}</th>
              <th>{{ __('monyBoxes.status') }}</th>
              <th>{{ __('monyBoxes.actions') }}</th>
            </tr>
          </thead>
          <tbody>
            @if (count($m_boxes))
            @foreach ($m_boxes as $m_box)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $m_box->name }}</td>
              <td>{{ $m_box->date }}</td>
              <td>{{ $m_box->last_isal_exhcange }}</td>
              <td>{{ $m_box->last_isal_collect }}</td>
              <td>
                <span class="badge bg-{{ $m_box->status == 'Active' ? 'success' : 'danger' }}">{{ $m_box->status }}</span>
              </td>
              <td>
                <a class="btn btn-sm btn-info py-0" href="#"><i class="fas fa-eye" title="{{ __('monyBoxes.view_details') }}"></i></a>
                <a class="btn btn-sm btn-warning py-0" href="{{ route('edit-monyBox-info', $m_box->id) }}">
                  <i class="fa fa-edit"></i>
                </a>
                <a class="btn btn-sm py-0 btn-danger" onclick="if(!confirm('{{ __('monyBoxes.confirm_delete') }}')){return false}"
                  title="{{ __('monyBoxes.delete_box') }}" href="{{ route('destroy-monyBox-info', $m_box->id) }}">
                  <i class="fa fa-trash"></i>
                </a>
              </td>
            </tr>
            @endforeach
            @else
            <tr>
              <td colspan="7">{{ __('monyBoxes.no_boxes_yet') }}</td>
            </tr>
            @endif
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection