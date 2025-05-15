<div class="row">
  <div class="col-lg-12 col-sm-12">
    <h1 class="mt-3 pb-2" style="border-bottom: 1px solid #dedede">{{ __('profile.account_information') }}</h1>

    <div class="d-flex justify-content-start align-items-start setting-nav p-0">
      {{-- Sidebar Navigation --}}
      <div class="nav flex-column justify-content-start text-end" style="width:180px;" id="v-pills-tab" role="tablist" aria-orientation="vertical">
        <button class="nav-link active" id="v-pills-password-tab" data-bs-toggle="pill" data-bs-target="#v-pills-password" type="button" role="tab" aria-controls="v-pills-password" aria-selected="true">
          {{ __('profile.change_password') }}
        </button>
        <button class="nav-link" id="v-pills-change_email-tab" data-bs-toggle="pill" data-bs-target="#v-pills-change_email" type="button" role="tab" aria-controls="v-pills-change_email" aria-selected="false">
          {{ __('profile.change_email') }}
        </button>
        <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-change_role_name" type="button" role="tab" aria-controls="v-pills-change_role_name" aria-selected="false">
          {{ __('profile.change_role_name') }}
        </button>

      </div>

      {{-- Tab Content --}}
      <div class="tab-content p-3 m-0" id="v-pills-tabContent">
        {{-- Change Password --}}
        <div class="tab-pane fade show active" id="v-pills-password" role="tabpanel" aria-labelledby="v-pills-password-tab" tabindex="0">
          <form method="POST" action="{{ route('admins.updatePassword', $admin->id) }}">
            @csrf
            @method('PUT')
            <div class="border p-3">
              <h4 class="mb-3">{{ __('profile.change_password') }}</h4>
              <div class="row">
                {{-- current password --}}
                <div class="col col-12 col-md-6">
                  <div class="input-group sm mb-2">
                    <label for="current_password" class="input-group-text">{{ __('profile.current_password') }}</label>
                    <input type="password" id="current_password" class="form-control" name="current_password" placeholder="{{ __('profile.enter_current_password') }}">
                    @error('current_password')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                {{-- new_password --}}
                <div class="col col-12 col-md-6">
                  <div class="input-group sm mb-2">
                    <label for="new_password" class="input-group-text">{{ __('profile.new_password') }}</label>
                    <input type="text" id="new_password" class="form-control" name="new_password" value="{{ old('new_password', $admin->profile->new_password ?? '') }}">
                    @error('new_password')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                {{-- confirm_password --}}
                <div class="col col-12 col-md-12">
                  <div class="input-group sm mb-2">
                    <label for="confirm_password" class="input-group-text">{{ __('profile.confirm_password') }}</label>
                    <input type="text" id="confirm_password" class="form-control" name="confirm_password" value="{{ old('confirm_password', $admin->profile->confirm_password ?? '') }}">
                    @error('confirm_password')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
              </div>

              <div class="input-group sm mt-2" style="border-top: 1px solid #aaa">
                <button type="submit" class="py-0 btn btn-outline-primary p-3 mt-2" style="margin-inline-start: auto;">{{ __('profile.update_password') }}</button>
              </div>
            </div>

          </form>
        </div>

        {{-- change email --}}
        <div class="tab-pane fade" id="v-pills-change_email" role="tabpanel" aria-labelledby="v-pills-change_email-tab" tabindex="0">
          <form method="POST" action="">
            @csrf
            @method('PUT')
            <div class="border p-3">
              <h4 class="mb-3">{{ __('profile.change_email') }}</h4>
              <div class="row">
                {{-- current email --}}
                <div class="col col-12 col-md-6">
                  <div class="input-group sm mb-2">
                    <label for="current_email" class="input-group-text">{{ __('profile.current_email') }}</label>
                    <input type="email" id="current_email" class="form-control" name="current_email" value="{{ old('current_email', $admin->email ?? '') }}" readonly>
                  </div>
                </div>
                {{-- new email --}}
                <div class="col col-12 col-md-6">
                  <div class="input-group sm mb-2">
                    <label for="new_email" class="input-group-text">{{ __('profile.new_email') }}</label>
                    <input type="email" id="new_email" class="form-control" name="new_email" value="{{ old('new_email') }}">
                    @error('new_email')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
              </div>

              <div class="input-group sm mt-2" style="border-top: 1px solid #aaa">
                <button type="submit" class="py-0 btn btn-outline-primary p-3 mt-2" style="margin-inline-start: auto;">{{ __('profile.update_email') }}</button>
              </div>
            </div>
          </form>
        </div>

        {{-- change userName --}}
        <div class="tab-pane fade" id="v-pills-change_role_name" role="tabpanel" aria-labelledby="v-pills-change_role_name-tab" tabindex="0">
          <form method="POST" action="">
            @csrf
            @method('PUT')
            <div class="border p-3">
              <h4 class="mb-3">{{ __('profile.change_role_name') }}</h4>
              <div class="row">
                {{-- current change_role_name --}}
                <div class="col col-12 col-md-6">
                  <div class="input-group sm mb-2">
                    <label for="role_name" class="input-group-text">{{ __('profile.change_role_name') }}</label>
                    <input type="text" id="role_name" class="form-control" name="role_name" value="{{ old('role_name', $admin->role_name ?? '') }}" readonly>
                  </div>
                </div>
                {{-- new job_title --}}
                <div class="col col-12 col-md-6">
                  <div class="input-group sm mb-2">
                    <label for="new_job_title" class="input-group-text">{{ __('profile.new_job_title') }}</label>
                    <input type="text" id="new_job_title" class="form-control" name="new_job_title" value="{{ old('new_job_title') }}">
                    @error('new_job_title')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
              </div>

              <div class="input-group sm mt-2" style="border-top: 1px solid #aaa">
                <button type="submit" class="py-0 btn btn-outline-primary p-3 mt-2" style="margin-inline-start: auto;">{{ __('profile.update_role_name') }}</button>
              </div>
            </div>
          </form>
        </div>



      </div>


    </div>
  </div>
</div>