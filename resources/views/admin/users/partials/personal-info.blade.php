<style>
  /* Hover effect for the profile picture */
  .position-relative:hover .btn-upload {
    opacity: 1;
    z-index: 20;
  }
</style>

<div class="row">
  <div class="col-lg-12 col-sm-12">
    <h1 class="mt-2 pb-2" style="border-bottom: 1px solid #dedede">{{ __('profile.presonal_information') }}</h1>

    <div class="d-flex justify-content-start align-items-start setting-nav p-0">
      {{-- Sidebar Navigation --}}
      <div class="nav flex-column justify-content-start text-end" style="width:180px;" id="v-pills-tab" role="tablist" aria-orientation="vertical">
        <button class="nav-link active " id="v-pills-basic-info-tab" data-bs-toggle="pill" data-bs-target="#v-pills-basic-info" type="button" role="tab" aria-controls="v-pills-basic-info" aria-selected="true">
          {{ __('profile.basic_information') }}
        </button>
        <button class="nav-link" id="v-pills-contact-info-tab" data-bs-toggle="pill" data-bs-target="#v-pills-contact-info" type="button" role="tab" aria-controls="v-pills-contact-info" aria-selected="false">
          {{ __('profile.contact_information') }}
        </button>
      </div>

      {{-- Tab Content --}}
      <div class="tab-content p-3 m-0" id="v-pills-tabContent">
        {{-- Personal Information --}}
        <div class="tab-pane fade show active" id="v-pills-basic-info" role="tabpanel" aria-labelledby="v-pills-basic-info-tab" tabindex="0">
          <form method="POST" enctype="multipart/form-data" action="{{ route('admins.update', $admin->id) }}">
            @csrf
            @method('PUT') <!-- إضافة الطريقة الصحيحة -->

            {{-- Profile Picture --}}
            <div class="m-auto text-center position-relative" style="width: 120px; height: 120px;">
              <input type="file" id="profilePhoto" name="image" class="d-none" accept="image/*"> <!-- تحديد نوع الملف -->
              <label for="profilePhoto" class="position-absolute top-50 start-50 translate-middle btn btn-upload d-flex align-items-center justify-content-center" style="width: 120px; height: 100px; border-radius: 50%; background-color: rgba(0, 0, 0, 0.5); color: white; opacity: 0; transition: opacity 0.3s; cursor: pointer;">
                <i class="fas fa-camera"></i>
              </label>

              <img src="{{ $admin->profile->image ? asset('assets/admin/uploads/images/avatar/' . $admin->profile->image) : asset('assets/admin/images/avatar/user-1.png') }}" alt="Profile Picture" style="width: 80px; height: 80px; border-radius: 50%; object-fit: cover;">
              <p><strong>Welcome</strong>, {{ $admin->userName }}</p>
            </div>

            {{-- Basic Information --}}
            <div class="border p-3">
              <h4 class="mb-3">{{ __('profile.basic_information') }}</h4>

              <div class="row">
                {{-- First Name --}}
                <div class="col col-12 col-md-6">
                  <div class="input-group sm mb-2">
                    <label for="first_name" class="input-group-text">{{ __('profile.first_name') }}</label>
                    <input type="text" id="first_name" class="form-control" name="first_name" value="{{ old('first_name', $admin->profile->first_name ?? '') }}">
                    @error('first_name')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                {{-- Last Name --}}
                <div class="col col-12 col-md-6">
                  <div class="input-group sm mb-2">
                    <label for="last_name" class="input-group-text">{{ __('profile.last_name') }}</label>
                    <input type="text" id="last_name" class="form-control" name="last_name" value="{{ old('last_name', $admin->profile->last_name ?? '') }}">
                    @error('last_name')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                {{-- Phone --}}
                <div class="col col-12 col-md-6">
                  <div class="input-group sm mb-2">
                    <label for="phone" class="input-group-text">{{ __('profile.phone') }}</label>
                    <input type="text" id="phone" class="form-control" name="phone" value="{{ old('phone', $admin->profile->phone ?? '') }}">
                    @error('phone')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                {{-- Branch --}}
                <div class="col col-12 col-md-6">
                  <div class="input-group sm mb-2">
                    <label for="branch_id" class="input-group-text">{{ __('profile.branch') }}</label>
                    <input type="text" id="branch_id" class="form-control" name="branch_id" value="{{ old('branch_id', $admin->profile->branch->name ?? '') }}">
                    @error('branch_id')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                <h4 class="mb-3 mt-2 pt-2" style="border-top: 1px solid #aaa"></h4>

                {{-- Country --}}
                <div class="col col-12 col-md-6">
                  <div class="input-group sm mb-2">
                    <label for="country" class="input-group-text">{{ __('profile.country') }}</label>
                    <input type="text" id="country" class="form-control" name="country" value="{{ old('country', $admin->profile->country->name ?? '') }}">
                    @error('country')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>

                {{-- City --}}
                <div class="col col-12 col-md-6">
                  <div class="input-group sm mb-2">
                    <label for="city" class="input-group-text">{{ __('profile.city') }}</label>
                    <input type="text" id="city" class="form-control" name="city" value="{{ old('city', $admin->profile->city ?? '') }}">
                    @error('city')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                {{-- Address --}}
                <div class="col col-12 col-md-12">
                  <div class="input-group sm mb-2">
                    <label for="address" class="input-group-text">{{ __('profile.address') }}</label>
                    <input type="text" id="address" class="form-control" name="address" value="{{ old('address', $admin->profile->address ?? '') }}">
                    @error('address')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
              </div>

              <div class="input-group sm mt-2" style="border-top: 1px solid #aaa">
                <button type="submit" class="py-0 btn btn-outline-primary p-3 mt-2" style="margin-inline-start: auto;">{{ __('profile.action-update') }}</button>
              </div>
            </div>
          </form>
        </div>

        {{-- Contact Information --}}
        <div class="tab-pane fade" id="v-pills-contact-info" role="tabpanel" aria-labelledby="v-pills-contact-info-tab" tabindex="0">
          <div class="border p-3">
            <h4 class="mb-3">{{ __('profile.contact_information') }}</h4>
            <form method="POST" action="{{ route('admins.update', $admin->id) }}">
              @csrf
              @method('PUT') <!-- إضافة الطريقة الصحيحة -->
              @forelse ($contacts as $contact)
                <div class="row">
                  <div class="col col-12 col-md-6">
                    <div class="input-group sm mb-2">
                      <label for="category_name" class="input-group-text">{{ __('profile.category_name') }}</label>
                      <input type="text" id="category_name" class="form-control" name="category_name" value="{{ old('category_name', $contact->category_name ?? '') }}">
                      @error('category_name')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="col col-12 col-md-6">
                    <div class="input-group sm mb-2">
                      <label for="name" class="input-group-text">{{ __('profile.name') }}</label>
                      <input type="text" id="name" class="form-control" name="name" value="{{ old('name', $contact->name ?? '') }}">
                      @error('name')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="col col-12 col-md-12">
                    <div class="input-group sm mb-2">
                      <label for="contact" class="input-group-text">{{ __('profile.contact') }}</label>
                      <input type="text" id="contact" class="form-control" name="contact" value="{{ old('contact', $contact->contact ?? '') }}">
                      @error('contact')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                </div>
              @empty
                <p class="text-muted">{{ __('profile.no_contacts_found') }}</p>
              @endforelse
              <div class="input-group sm mt-2" style="border-top: 1px solid #aaa">
                <button type="submit" class="py-0 btn btn-outline-primary p-3 mt-2" style="margin-inline-start: auto;">{{ __('profile.action-update') }}</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>