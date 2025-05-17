<style>
  /* Hover effect for the profile picture */
  .position-relative:hover .btn-upload {
    opacity: 1;
    z-index: 20;
  }
</style>

<div class="row">
  <div class="col-lg-12 col-sm-12">
    <h1 class="mt-3 pb-2" style="border-bottom: 1px solid #dedede">{{ __('profile.personal_information') }}</h1>

    <div class="d-flex justify-content-start align-items-start setting-nav p-0">
      {{-- Sidebar Navigation --}}
      <div class="nav flex-column justify-content-start text-end" style="width:180px;" id="v-pills-personal-tab" role="tablist" aria-orientation="vertical">
        <button class="nav-link active" id="v-pills-basic-tab" data-bs-toggle="pill" data-bs-target="#v-pills-basic" type="button" role="tab" aria-controls="v-pills-basic" aria-selected="true">
          {{ __('profile.basic_data') }}
        </button>
        <button class="nav-link" id="v-pills-contact-tab" data-bs-toggle="pill" data-bs-target="#v-pills-contact" type="button" role="tab" aria-controls="v-pills-contact" aria-selected="false">
          {{ __('profile.contact_info') }}
        </button>
        <button class="nav-link" id="v-pills-address-tab" data-bs-toggle="pill" data-bs-target="#v-pills-address" type="button" role="tab" aria-controls="v-pills-address" aria-selected="false">
          {{ __('profile.address') }}
        </button>
        <button class="nav-link" id="v-pills-documents-tab" data-bs-toggle="pill" data-bs-target="#v-pills-documents" type="button" role="tab" aria-controls="v-pills-documents" aria-selected="false">
          {{ __('profile.documents') }}
        </button>
        <button class="nav-link" id="v-pills-emergency-tab" data-bs-toggle="pill" data-bs-target="#v-pills-emergency" type="button" role="tab" aria-controls="v-pills-emergency" aria-selected="false">
          {{ __('profile.emergency_contacts') }}
        </button>
      </div>

      {{-- Tab Content --}}
      <div class="tab-content p-3 m-0" id="v-pills-personal-tabContent">
        {{-- Basic Data --}}
        <div class="tab-pane fade show active" id="v-pills-basic" role="tabpanel" aria-labelledby="v-pills-basic-tab" tabindex="0">
          <p>{{ __('profile.name') }}: <strong>{{ $admin->name }}</strong></p>
          <p>{{ __('profile.gender') }}: <strong>{{ $admin->gender ?? '-' }}</strong></p>
          <p>{{ __('profile.birth_date') }}: <strong>{{ $admin->birth_date ?? '-' }}</strong></p>
          <p>{{ __('profile.nationality') }}: <strong>{{ $admin->nationality ?? '-' }}</strong></p>
        </div>

        {{-- Contact Info --}}
        <div class="tab-pane fade" id="v-pills-contact" role="tabpanel" aria-labelledby="v-pills-contact-tab" tabindex="0">
          <p>{{ __('profile.email') }}: <strong>{{ $admin->email }}</strong></p>
          <p>{{ __('profile.phone') }}: <strong>{{ $admin->phone ?? '-' }}</strong></p>
        </div>

        {{-- Address --}}
        <div class="tab-pane fade" id="v-pills-address" role="tabpanel" aria-labelledby="v-pills-address-tab" tabindex="0">
          <p>{{ __('profile.city') }}: <strong>{{ $admin->city ?? '-' }}</strong></p>
          <p>{{ __('profile.address') }}: <strong>{{ $admin->address ?? '-' }}</strong></p>
        </div>

        {{-- Documents --}}
        <div class="tab-pane fade" id="v-pills-documents" role="tabpanel" aria-labelledby="v-pills-documents-tab" tabindex="0">
          <p>{{ __('profile.national_id') }}: <strong>{{ $admin->national_id ?? '-' }}</strong></p>
          <p>{{ __('profile.passport_number') }}: <strong>{{ $admin->passport_number ?? '-' }}</strong></p>
        </div>

        {{-- Emergency Contacts --}}
        <div class="tab-pane fade" id="v-pills-emergency" role="tabpanel" aria-labelledby="v-pills-emergency-tab" tabindex="0">
          <p>{{ __('profile.emergency_contact_name') }}: <strong>{{ $admin->emergency_contact_name ?? '-' }}</strong></p>
          <p>{{ __('profile.emergency_contact_phone') }}: <strong>{{ $admin->emergency_contact_phone ?? '-' }}</strong></p>
          <p>{{ __('profile.relationship') }}: <strong>{{ $admin->emergency_contact_relation ?? '-' }}</strong></p>
        </div>
      </div>
    </div>
  </div>
</div>