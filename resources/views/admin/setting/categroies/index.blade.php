@section('toast-title-success')
  <i class="icon fas fa-check"></i> تم بنجاح! 
  @endsection

  @section('toast-title-error')
    <i class="icon fas fa-ban"></i> خطأ!
  @endsection
<div class="row">
  <div class="col-md-12">
    <div id="units-container">
      <h1 class="mt-3 pb-2" style="border-bottom: 1px solid #dedede">{{__('categories.categories-list')}}
        <a class="ms-3 add-icon" data-bs-toggle="modal" data-bs-target="#createPosModal" aria-expanded="false"
          aria-controls="addProductForm">
          <i data-bs-toggle="tooltip" title="Add New pos" class="fa fa-plus"></i>
        </a>
      </h1>
      <!-- Modals -->
      <!-- Create Modal -->
      <div class="modal fade" id="createPosModal" aria-hidden="true" aria-labelledby="createPosModalLabel"
        tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
          <div class="modal-content">
            <div class="modal-header" style="padding: 0.5rem 1rem; border-bottom: 1px solid #dedede;">
              <h1 class="modal-title fs-5" id="createPosModalLabel">{{__('categories.new-category-modal-title')}}</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="p-3" method="POST" action="{{ route('store-new-category') }}">
              @csrf

              <div class="mb-2 input-group sm">
                <label class="input-group-text">{{__('categories.name')}}</label>
                <input type="text" name="cat_name" class="form-control" value="{{ old('cat_name') }}" required>
              </div>
              @error('cat_name')
              <div class="text-danger">{{ $message }}</div>
              @enderror

              <div class="mb-2 input-group sm">
                <label class="input-group-text">{{__('categories.brief')}}</label>
                <input type="text" name="cat_brief" class="form-control" value="{{ old('cat_brief') }}">
              </div>
              @error('cat_brief')
              <div class="text-danger">{{ $message }}</div>
              @enderror

              <div class="mb-2 input-group sm">
                <label class="input-group-text">{{__('categories.status')}}</label>
                <select name="status" class="form-select" required>
                  <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>{{__('categories.active')}}</option>
                  <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>{{__('categories.inactive')}}</option>
                </select>
              </div>
              @error('status')
              <div class="text-danger">{{ $message }}</div>
              @enderror

              <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-outline-primary py-1">{{__('categories.save-category')}}</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- Edit Modal -->
      @if(isset($categoryToEdit))
      <div class="modal fade show" id="editCategoryModal" tabindex="-1" aria-labelledby="editCategoryModalLabel" style="display:block;" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg">
          <div class="modal-content">
            <div class="modal-header" style="padding: 0.5rem 1rem; border-bottom: 1px solid #dedede;">
              <h1 class="modal-title fs-5" id="editCategoryModalLabel">{{__('categories.edit-category-modal-title')}}</h1>
              <a href="{{ route('display-categories-all') }}" class="btn-close"></a>
            </div>
            <form class="p-3" method="POST" action="{{ route('update-category-info', $categoryToEdit->id) }}">
              @csrf
              @method('PUT')

              <div class="mb-2 input-group sm">
                <label class="input-group-text">{{__('categories.name')}}</label>
                <input type="text" name="cat_name" class="form-control" value="{{ old('cat_name', $categoryToEdit->cat_name) }}" required>
              </div>
              @error('cat_name')
              <div class="text-danger">{{ $message }}</div>
              @enderror

              <div class="mb-2 input-group sm">
                <label class="input-group-text">{{__('categories.cat_brief')}}</label>
                <input type="text" name="cat_brief" class="form-control" value="{{ old('cat_brief', $categoryToEdit->cat_brief) }}">
              </div>
              @error('cat_brief')
              <div class="text-danger">{{ $message }}</div>
              @enderror

              <div class="mb-2 input-group sm">
                <label class="input-group-text">{{__('categories.status')}}</label>
                <select name="status" class="form-select" required>
                  <option value="1" {{ old('status', $categoryToEdit->status) == '1' ? 'selected' : '' }}>{{__('categories.active')}}</option>
                  <option value="0" {{ old('status', $categoryToEdit->status) == '0' ? 'selected' : '' }}>{{__('categories.inactive')}}</option>
                </select>
              </div>
              @error('status')
              <div class="text-danger">{{ $message }}</div>
              @enderror

              <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-outline-primary py-1">{{__('categories.update-category')}}</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      @endif
      <table class="table table-striped mt-2 table-sm w-100">
        <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Brief</th>
            <th>Status</th>
            <th>Control</th>
          </tr>
        </thead>
        <tbody>
          @foreach($categories as $index => $category)
          <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $category->cat_name }}</td>
            <td>{{ $category->cat_brief }}</td>

            <td>
              @if($category->status)
              <span class="badge bg-success">Active</span>
              @else
              <span class="badge bg-secondary">Inactive</span>
              @endif
            </td>
            <td>
              <a href="{{ route('edit-category-info', $category->id) }}" class="btn btn-sm btn-outline-primary" title="Edit category"> <i class="fas fa-edit"></i></a>
              <a href="{{ route('destroy-category-info', $category->id) }}" onclick="return confirm('Delete this category?')" title="Delete category" class="btn btn-outline-danger btn-sm">
                <i class="fa fa-trash"></i>
              </a>

            </td>
          </tr>
          @endforeach
          @if($categories->isEmpty())
          <tr>
            <td colspan="6" class="text-center">No categories found.</td>
          </tr>
          @endif
        </tbody>
      </table>
    </div>
  </div>
</div>