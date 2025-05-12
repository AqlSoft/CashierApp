<style>
  /* Hover effect for the profile picture */
  .position-relative:hover .btn-upload {
    opacity: 1;
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
        {{-- presonal Information --}}
        <div class="tab-pane fade show active" id="v-pills-basic-info" role="tabpanel" aria-labelledby="v-pills-basic-info-tab" tabindex="0">

          {{-- Profile Picture --}}
          <div class="m-auto text-center position-relative" style="width: 150px; height: 120px;">
            <form method="POST" action="" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <input type="file" id="profilePhoto" name="image" class="d-none">
              <label for="profilePhoto" class="position-absolute top-50 start-50 translate-middle btn btn-upload d-flex align-items-center justify-content-center" style="width: 100px; height: 100px; border-radius: 50%; background-color: rgba(0, 0, 0, 0.5); color: white; opacity: 0; transition: opacity 0.3s;">
                <i class="fas fa-camera"></i>
              </label>
            </form>
            <img src="{{ $admin->profile->image ? asset('assets/admin/uploads/images/avatar/' . $admin->profile->image) : asset('assets/admin/images/avatar/user-1.png') }}" alt="Profile Picture" style="width: 80px; height: 80px; border-radius: 50%; object-fit: cover;">
            <p> <strong>Welcome</strong>,{{ $admin->userName }} </p>
          </div>

          {{-- Basic Information --}}
          <div class="border p-3">
            <h4 class="mb-3 ">{{ __('profile.basic_information') }}</h4>
            <form method="POST" action="{{ route('admins.update', $admin->id) }}">
              @csrf
              <div class="row">
                {{-- user Name (Arabic) --}}
                <div class="col col-12 col-md-6">
                  <div class="input-group sm mb-2">
                    <label for="code" class="input-group-text">{{ __('profile.userName_ar') }}</label>
                    <input type="text" class="form-control" name="userName_ar" value="{{ old('userName_ar', $admin->profile->userName_ar ?? 'N/A') }}">

                  </div>
                </div>
                {{-- user Name (English) --}}
                <div class="col col-12 col-md-6">
                  <div class="input-group sm mb-2">
                    <label for="code" class="input-group-text">{{ __('profile.user_name_en') }}</label>
                    <input type="text" class="form-control" name="userName_en" value="{{ old('userName_en', $admin->profile->userName_en ?? 'N/A') }}">
                  </div>
                </div>
                {{-- first Name --}}
                <div class="col col-12 col-md-6">
                  <div class="input-group sm mb-2">
                    <label for="code" class="input-group-text">{{ __('profile.first_name') }}</label>
                    <input type="text" class="form-control" name="first_name" value="{{ old('first_name', $admin->profile->first_name ?? 'N/A') }}">

                  </div>
                </div>
                {{-- last_name  --}}
                <div class="col col-12 col-md-6">
                  <div class="input-group sm mb-2">
                    <label for="code" class="input-group-text">{{ __('profile.last_name') }}</label>
                    <input type="text" class="form-control" name="last_name" value="{{ old('last_name', $admin->profile->last_name ?? 'N/A') }}">
                  </div>
                </div>
                {{-- Job Title --}}
                <div class="col col-12 col-md-6">
                  <div class="input-group sm mb-2">
                    <label for="code" class="input-group-text">{{ __('profile.job_title') }}</label>
                    <input type="text" class="form-control" name="job_title" value="{{ old('job_title', $admin->job_title ?? 'N/A') }}">

                  </div>
                </div>
                {{-- branch --}}
                <div class="col col-12 col-md-6">
                  <div class="input-group sm mb-2">
                    <label for="code" class="input-group-text">{{ __('profile.branch') }}</label>
                    <input type="text" class="form-control" name="city" value="{{ old('city', $admin->profile->city ?? 'N/A') }}">
                  </div>
                </div>
                <h4 class="mb-3 mt-2 pt-2" style="border-top: 1px solid #aaa">{{ __('profile.address') }}</h4>

                {{-- address --}}
                <div class="col col-12 col-md-6">
                  <div class="input-group sm mb-2">
                    <label for="code" class="input-group-text">{{ __('profile.address') }}</label>
                    <input type="text" class="form-control" name="address" value="{{ old('address', $admin->profile->address ?? 'N/A') }}">
                  </div>
                </div>
                {{-- city --}}
                <div class="col col-12 col-md-6">
                  <div class="input-group sm mb-2">
                    <label for="code" class="input-group-text">{{ __('profile.city') }}</label>
                    <input type="text" class="form-control" name="city" value="{{ old('city', $admin->profile->city ?? 'N/A') }}">
                  </div>
                </div>
                {{-- country --}}
                <div class="col col-12 col-md-6">
                  <div class="input-group sm mb-2">
                    <label for="code" class="input-group-text">{{ __('profile.country') }}</label>
                    <input type="text" class="form-control" name="country" value="{{ old('country', $admin->profile->country ?? 'N/A') }}">
                  </div>
                </div>
              </div>


              <div class="input-group sm mt-2" style="border-top: 1px solid #aaa">

                <button type="submit" class="py-0 btn btn-outline-primary p-3 mt-2" style="margin-inline-start: auto;">{{__('products.action-save')}} </button>
              </div>

            </form>
          </div>
        </div>

        {{-- Contact Information --}}
        <div class="tab-pane fade" id="v-pills-contact-info" role="tabpanel" aria-labelledby="v-pills-contact-info-tab" tabindex="0">

          <div class="border p-3">
            <h4 class="mb-3 ">{{ __('profile.contact_information') }}</h4>
            <form method="POST" action="{{ route('admins.update', $admin->id) }}">
              @csrf

              {{-- user Name (Arabic) --}}
              <div class="col col-12 col-md-6">
                <div class="input-group sm mb-2">
                  <label for="code" class="input-group-text">{{ __('profile.userName_ar') }}</label>
                  <input type="text" class="form-control" name="name" value="{{ old('name', $contact->name  ?? 'N/A') }}">

                </div>
              </div>
              <div class="col col-12 col-md-6">
                <div class="input-group sm mb-2">
                  <label for="code" class="input-group-text">{{ __('profile.userName_ar') }}</label>
                  <input type="text" class="form-control" name="contact" value="{{ old('contact', $contact->contact  ?? 'N/A') }}">

                </div>
              </div>

              <div class="input-group sm mt-2" style="border-top: 1px solid #aaa">

                <button type="submit" class="py-0 btn btn-outline-primary p-3 mt-2" style="margin-inline-start: auto;">{{__('products.action-save')}} </button>
              </div>
          </div>
          </form>
        </div>

      </div>

    </div>
    
  </div>
</div>