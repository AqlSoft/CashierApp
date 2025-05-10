<div class="container-fluid">
    <div class="row">

        <div class="col-md-12">
            <div id="products-container">
                <h1 class="mt-3 pb-2" style="border-bottom: 1px solid #dedede">{{__('contact.contacts-list')}}
                    <a class="ms-3 add-icon" data-bs-toggle="modal" data-bs-target="#createPosModal" aria-expanded="false"
                        aria-controls="addProductForm">
                        <i data-bs-toggle="tooltip" title="Add New pos" class="fa fa-plus"></i>
                    </a>
                </h1>
                <!-- هنا سيتم اضافة المنتجات -->
                <div class="row items-list mt-3">
                    @forelse ($contacts as $contact)
                    <div class="col col-md-6 col-lg-4 mb-2">
                        <div class="card mb-3 w-100">
                            <div class="row g-0">
                                <div class="text-center" style="width: 100px">
                                    <div class="d-flex justify-content-center align-items-center h-100">
                                        <i class="{{ $contact->parseIcon() }} fa-4x"></i>
                                    </div>
                                </div>
                                <div class="" style="width: calc(100% - 100px)">
                                    <div class="card-body pb-0">
                                        <h5 class="card-title">{{ $contact->name }}</h5>
                                        <p class="card-text mt-0 mb-1">{{ $contact->contact }} </p>
                                        <p class="card-text mt-0 mb-1">{{ $contact->person->profile->full_name() }}</p>


                                        <p class="card-text py-0 my-0"><small class="text-body-secondary">{{ $contact->updated_at->diffForHumans() }}</small></p>
                                        <div class="actions position-absolute top-0">
                                            <a href="{{ route('view-pos-info', $contact->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-display"></i></a>
                                            <a href="{{ route('destroy-pos-info', $contact->id) }}" class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-12 mb-2">
                        <p>{{__('contact.no-contacts-found')}}</p>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modals -->
<div class="modal fade" id="createPosModal" aria-hidden="true" aria-labelledby="createPosModalLabel"
    tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="padding: 0.5rem 1rem; border-bottom: 1px solid #dedede;">
                <h1 class="modal-title fs-5" id="createPosModalLabel">{{__('pos.new-pos-modal-title')}}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="p-3" method="POST" action="{{ route('store-contact-info') }}">
                @csrf

                <div class="mb-2 input-group sm">
                    <label class="input-group-text">{{__('contact.name')}}</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                </div>
                @error('name')
                <div class="text-danger">{{ $message }}</div>
                @enderror

                <div class="mb-2 input-group sm">
                    <label class="input-group-text">{{__('contact.contact')}}</label>
                    <input type="text" name="contact" class="form-control" value="{{ old('contact') }}" required>
                </div>
                @error('contact')
                <div class="text-danger">{{ $message }}</div>
                @enderror

                <div class="mb-2 input-group sm">
                    <label class="input-group-text">{{__('contact.category')}}</label>
                    <select name="category_name" class="form-select" required>
                        <option {{ old('category_name') == 'phone'      ? 'selected' : '' }} value="phone">{{__('contact.phone')}}</option>
                        <option {{ old('category_name') == 'email'      ? 'selected' : '' }} value="email">{{__('contact.email')}}</option>
                        <option {{ old('category_name') == 'whatsapp'   ? 'selected' : '' }} value="whatsapp">{{__('contact.whatsapp')}}</option>
                        <option {{ old('category_name') == 'mobile'     ? 'selected' : '' }} value="mobile">{{__('contact.mobile')}}</option>
                        <option {{ old('category_name') == 'fax'        ? 'selected' : '' }} value="fax">{{__('contact.fax')}}</option>
                    </select>
                </div>
                @error('category_name')
                <div class="text-danger">{{ $message }}</div>
                @enderror

                <div class="mb-2 input-group sm">
                    <label class="input-group-text">{{__('contact.person-id')}}</label>
                    <select name="person_id" class="form-select" required>
                        <option value="">{{__('contact.select-person')}}</option>
                        @foreach ($admins as $admin)
                        <option value="{{ $admin->id }}">{{ $admin->profile->full_name() }}</option>
                        @endforeach
                    </select>
                </div>
                @error('person_id')
                <div class="text-danger">{{ $message }}</div>
                @enderror

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-outline-primary py-1">{{__('contact.save-contact')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>