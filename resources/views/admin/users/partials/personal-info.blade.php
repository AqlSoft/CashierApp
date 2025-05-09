<div class="row">
  <div class="col-lg-12 col-sm-12">
    <h1 class="mt-3 pb-2" style="border-bottom: 1px solid #dedede">{{ __('profile.admin_profile') }}</h1>

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
        {{-- Basic Information --}}
        <div class="tab-pane fade show active" id="v-pills-basic-info" role="tabpanel" aria-labelledby="v-pills-basic-info-tab" tabindex="0">
          <h4 class="mb-3 ">{{ __('profile.basic_information') }}</h4>
          {{-- Profile Picture --}}
          <div>
            <p>{{ __('profile.profile_picture') }}:</p>
            <form method="POST" action="" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <input type="file" id="profilePhoto" name="image" class="d-none" onchange="this.form.submit()">
              <label for="profilePhoto" class="btn btn-upload">
                <i class="fas fa-camera me-2"></i>{{ __('profile.change_photo') }}
              </label>
            </form>
            <img src="{{ asset($admin->profile->image ?? 'default-profile.png') }}" alt="Profile Picture" style="width: 150px; height: 150px; border-radius: 50%;">
          </div>
          {{-- Name (Arabic) --}}
          <form method="POST" action="{{ route('admins.update', $admin->id) }}">
            @csrf
            @method('PUT')
            <div class="row mb-3">
              <div class="col col-5 fw-bold text-end">{{ __('profile.name_arabic') }}:</div>
              <div class="col col-7">
                <input type="text" class="form-control" name="first_name" value="{{ old('first_name', $admin->profile->first_name ?? 'N/A') }}" onchange="this.form.submit()" style="border:none;background-color:transparent;">
              </div>
            </div>
          </form>

          {{-- Name (English) --}}
          <form method="POST" action="{{ route('admins.update', $admin->id) }}">
            @csrf
            @method('PUT')
            <div class="row mb-3">
              <div class="col col-5 fw-bold text-end">{{ __('profile.name_english') }}:</div>
              <div class="col col-7">
                <input type="text" class="form-control" name="last_name" value="{{ old('last_name', $admin->profile->last_name ?? 'N/A') }}" onchange="this.form.submit()" style="border:none;background-color:transparent;">
              </div>
            </div>
          </form>

          {{-- Job Title --}}
          <form method="POST" action="{{ route('admins.update', $admin->id) }}">
            @csrf
            @method('PUT')
            <div class="row mb-3">
              <div class="col col-5 fw-bold text-end">{{ __('profile.job_title') }}:</div>
              <div class="col col-7">
                <input type="text" class="form-control" name="job_title" value="{{ old('job_title', $admin->job_title ?? 'N/A') }}" onchange="this.form.submit()" style="border:none;background-color:transparent;">
              </div>
            </div>
          </form>

          {{-- Hire Date --}}
          <div class="row mb-3">
              <div class="col col-5 fw-bold text-end">{{ __('profile.hire_date') }}:</div>
              <div class="col col-7">
              {{ $admin->created_at->format('Y-m-d') }}
              </div>
            </div>
            <div class="row mb-3">
              <div class="col col-5 fw-bold text-end">{{ __('profile.work_duration') }}:</div>
              <div class="col col-7">
              {{ $admin->created_at->diffForHumans() }}
              </div>
            </div>

          {{-- Department/Branch --}}
          <form method="POST" action="{{ route('admins.update', $admin->id) }}">
            @csrf
            @method('PUT')
            <div class="row mb-3">
              <div class="col col-5 fw-bold text-end">{{ __('profile.department_branch') }}:</div>
              <div class="col col-7">
                <input type="text" class="form-control" name="city" value="{{ old('city', $admin->profile->city ?? 'N/A') }}" onchange="this.form.submit()" style="border:none;background-color:transparent;">
              </div>
            </div>
          </form>

        
        </div>

        {{-- Contact Information --}}
        <div class="tab-pane fade" id="v-pills-contact-info" role="tabpanel" aria-labelledby="v-pills-contact-info-tab" tabindex="0">
          <h4  class="mb-3 ">{{ __('profile.contact_information') }}</h4>
          {{-- Primary Mobile --}}
          <form method="POST" action="{{ route('admins.update', $admin->id) }}">
            @csrf
            @method('PUT')
            <div class="row mb-3">
              <div class="col col-5 fw-bold text-end">{{ __('profile.primary_mobile') }}:</div>
              <div class="col col-7">
                <input type="text" class="form-control" name="phone" value="{{ old('phone', $admin->profile->phone ?? 'N/A') }}" onchange="this.form.submit()" style="border:none;background-color:transparent;">
              </div>
            </div>
          </form>

          {{-- Email --}}
          <form method="POST" action="{{ route('admins.update', $admin->id) }}">
            @csrf
            @method('PUT')
            <div class="row mb-3">
              <div class="col col-5 fw-bold text-end">{{ __('profile.email') }}:</div>
              <div class="col col-7">
                <input type="email" class="form-control" name="email" value="{{ old('email', $admin->email) }}" onchange="this.form.submit()" style="border:none;background-color:transparent;">
              </div>
            </div>
          </form>

          {{-- Residential Address --}}
          <form method="POST" action="{{ route('admins.update', $admin->id) }}">
            @csrf
            @method('PUT')
            <div class="row mb-3">
              <div class="col col-5 fw-bold text-end">{{ __('profile.residential_address') }}:</div>
              <div class="col col-7">
                <input type="text" class="form-control" name="address" value="{{ old('address', $admin->profile->address ?? 'N/A') }}" onchange="this.form.submit()" style="border:none;background-color:transparent;">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>