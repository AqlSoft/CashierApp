
  <div class="row">
    <div class="col-md-12">
      <div id="units-container">
        <h1 class="mt-3 pb-2" style="border-bottom: 1px solid #dedede">{{__('units.units-list')}}
          <a class="ms-3 add-icon" data-bs-toggle="modal" data-bs-target="#createUnitModal" aria-expanded="false"
            aria-controls="addUnitForm">
            <i data-bs-toggle="tooltip" title="Add New Unit" class="fa fa-plus"></i>
          </a>
        </h1>
        <!-- Modals -->
        <!-- Create Modal -->
        <div class="modal fade" id="createUnitModal" aria-hidden="true" aria-labelledby="createUnitModalLabel"
          tabindex="-1">
          <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
              <div class="modal-header" style="padding: 0.5rem 1rem; border-bottom: 1px solid #dedede;">
                <h1 class="modal-title fs-5" id="createUnitModalLabel">{{__('units.new-unit-modal-title')}}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form class="p-3" method="POST" action="{{ route('store-new-unit') }}">
                @csrf

                <div class="mb-2 input-group sm">
                  <label class="input-group-text">{{__('units.name')}}</label>
                  <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                </div>
                @error('name')
                <div class="text-danger">{{ $message }}</div>
                @enderror

                <div class="mb-2 input-group sm">
                  <label class="input-group-text">{{__('units.brief')}}</label>
                  <input type="text" name="breif" class="form-control" value="{{ old('breif') }}">
                </div>
                @error('breif')
                <div class="text-danger">{{ $message }}</div>
                @enderror

                <div class="mb-2 input-group sm">
                  <label class="input-group-text">{{__('units.status')}}</label>
                  <select name="status" class="form-select" required>
                    <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>{{__('units.active')}}</option>
                    <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>{{__('units.inactive')}}</option>
                  </select>
                </div>
                @error('status')
                <div class="text-danger">{{ $message }}</div>
                @enderror

                <div class="d-flex justify-content-end">
                  <button type="submit" class="btn btn-outline-primary py-1">{{__('units.save-unit')}}</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- Edit Modal -->
        @if(isset($unitToEdit))
        <div class="modal fade show" id="editUnitModal" tabindex="-1" aria-labelledby="editUnitModalLabel" style="display:block;" aria-modal="true" role="dialog">
          <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
              <div class="modal-header" style="padding: 0.5rem 1rem; border-bottom: 1px solid #dedede;">
                <h1 class="modal-title fs-5" id="editUnitModalLabel">{{__('units.edit-unit-modal-title')}}</h1>
                <a href="{{ route('display-units-all') }}" class="btn-close"></a>
              </div>
              <form class="p-3" method="POST" action="{{ route('update-unit-info', $unitToEdit->id) }}">
                @csrf
                @method('PUT')

                <div class="mb-2 input-group sm">
                  <label class="input-group-text">{{__('units.name')}}</label>
                  <input type="text" name="name" class="form-control" value="{{ old('name', $unitToEdit->name) }}" required>
                </div>
                @error('name')
                <div class="text-danger">{{ $message }}</div>
                @enderror

                <div class="mb-2 input-group sm">
                  <label class="input-group-text">{{__('units.brief')}}</label>
                  <input type="text" name="brief" class="form-control" value="{{ old('brief', $unitToEdit->brief) }}">
                </div>
                @error('brief')
                <div class="text-danger">{{ $message }}</div>
                @enderror

                <div class="mb-2 input-group sm">
                  <label class="input-group-text">{{__('units.status')}}</label>
                  <select name="status" class="form-select" required>
                    <option value="1" {{ old('status', $unitToEdit->status) == '1' ? 'selected' : '' }}>{{__('units.active')}}</option>
                    <option value="0" {{ old('status', $unitToEdit->status) == '0' ? 'selected' : '' }}>{{__('units.inactive')}}</option>
                  </select>
                </div>
                @error('status')
                <div class="text-danger">{{ $message }}</div>
                @enderror

                <div class="d-flex justify-content-end">
                  <button type="submit" class="btn btn-outline-primary py-1">{{__('units.save-unit')}}</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        @endif
        <table class="table table-striped mt-2 w-100">
          <thead>
            <tr>
              <th>#</th>
              <th>{{__('units.name')}}</th>
              <th>{{__('units.brief')}}</th>
              <th>{{__('units.status')}}</th>
              <th>{{__('units.control')}}</th>
            </tr>
          </thead>
          <tbody>
            @foreach($units as $index => $unit)
            <tr>
              <td>{{ $index + 1 }}</td>
              <td>{{ $unit->name }}</td>
              <td>{{ $unit->brief }}</td>
              <td>
                @if($unit->status)
                <span class="badge bg-success">{{__('units.active')}}</span>
                @else
                <span class="badge bg-secondary">{{__('units.inactive')}}</span>
                @endif
              </td>
              <td>
                <a href="{{ route('edit-unit-info', $unit->id) }}" class="btn btn-sm btn-primary">{{__('units.edit')}}</a>
                <form action="{{ route('destroy-unit-info', $unit->id) }}" method="POST" style="display:inline-block;">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('{{__('units.delete-confirm')}}')">{{__('units.delete')}}</button>
                </form>
              </td>
            </tr>
            @endforeach
            @if($units->isEmpty())
            <tr>
              <td colspan="6" class="text-center">{{__('units.no-units-found')}}</td>
            </tr>
            @endif
          </tbody>
        </table>
      </div>
    </div>
  </div>

