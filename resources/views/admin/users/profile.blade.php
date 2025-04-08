@extends('layouts.admin')
@section('contents')
<style>
  :root {
    --primary-color: #3498db;
    --secondary-color: #f8f9fa;
    --success-color: #28a745;
    --border-color: #dee2e6;
  }

  .nav-tabs {
    border-bottom: 4px solid #dee2e6;
    position: relative;
  }

  .nav-tabs .nav-link {
    color: #495057;
    border: none;
    margin-right: 5px;
    padding: 10px 20px;
    font-weight: 500;
    position: relative;
    background-color: transparent;
  }

  .nav-tabs .nav-link:hover {
    color: #212529;
  }

  .nav-tabs .nav-link.active {
    color: #000;
    /* font-weight: 600; */
    background-color: transparent;
  }

  .nav-tabs .nav-link.active::after {
    content: '';
    position: absolute;
    bottom: -4px;
    left: 0;
    width: 100%;
    height: 4px;
    background-color: #000;
  }

  .tab-content {
    padding: 20px;
    border-top: none;
  }



  .profile-container {
    /* max-width: 700px;
            margin: 30px auto; */
    /* background: white; */
    /* border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1); */
    /* padding: 30px; */
    /* border-bottom: 1px solid var(--border-color); */

  }

  .profile-header {
    text-align: left;
    margin-bottom: 10px;
    color: #2c3e50;
    border-bottom: 1px solid var(--border-color);
    padding-bottom: 15px;
  }

  .profile-picture {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    object-fit: cover;
    border: 5px solid white;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    margin-bottom: 15px;
  }

  .form-label {
    font-weight: 600;
    color: #495057;
  }

  .form-control:focus {
    border-color: var(--primary-color);
    box-shadow: 0 0 0 0.25rem rgba(52, 152, 219, 0.25);
  }

  .btn-upload {
    background-color: var(--secondary-color);
    color: var(--primary-color);
    border: 1px dashed var(--primary-color);

    border-radius: 5px;
    cursor: pointer;
    transition: all 0.3s;
    font-size: 12px;
    margin-top: -10px;
    padding: 5px;
  }

  .btn-upload:hover {
    background-color: var(--primary-color);
    color: white;
  }

  .action-buttons {
    display: flex;
    justify-content: flex-end;
    gap: 10px;
    margin-top: 20px;
  }
</style>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-8">
      <h1 class="mt-3 pb-2 header-border"> Profile</h1>

      <!-- تبويبات التنقل -->
      <ul class="nav nav-tabs mt-3" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="PersonalInfo-tab" data-bs-toggle="tab" data-bs-target="#PersonalInfo" type="button" role="tab" aria-controls="PersonalInfo" aria-selected="true">Personal Info</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="sessions-tab" data-bs-toggle="tab" data-bs-target="#sessions" type="button" role="tab" aria-controls="sessions" aria-selected="false">Sessions</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Tab Three</button>
        </li>
      </ul>

      <!-- محتوى التبويبات -->
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="PersonalInfo" role="tabpanel" aria-labelledby="PersonalInfo-tab">
          <div class="profile-container ">
            <div class="profile-header">
              <h4>Update Your Photo and Personal Details</h4>
            </div>

                <!-- Profile Picture Section -->
                <div class="row mb-4 text-center">
                    <div class="col-12">
                        <img src="{{asset('assets/admin/uploads/images/avatar/avatar-04.jpg')}}" alt="Profile Picture" class="profile-picture">
                        <div class="mt-3">
                            <input type="file" id="profilePhoto" class="d-none">
                            <label for="profilePhoto" class="btn btn-upload">
                                <i class="fas fa-camera me-2"></i>Change Photo
                            </label>
                        </div>
                        <small class="text-muted">JPEG or PNG, max 2MB</small>
                    </div>
                </div>
          <!-- Personal Information Section -->
          <div class="row mb-3">
            <div class="col col-6 mb-2">
              <form method="POST" action="{{ route('admins.update', $admin->id) }}">
                @csrf
                @method('PUT')

                <div class="row">
                  <div class="col col-4 fw-bold">User Name:</div>
                  <div class="col col-8 text-start">
                    <input type="text" class="form-control sm py-0" name="userName" value="{{ old('userName', $admin->userName) }}"
                      onchange="this.form.submit()" style="border:none;background-color:transparent;">
                  </div>
                </div>
              </form>
            </div>

            <div class="col col-6 mb-2">
              <form method="POST" action="{{ route('admins.update', $admin->id) }}">
                @csrf
                @method('PUT')

                <div class="row">
                  <div class="col col-4">Job Title:</div>
                  <div class="col col-8">
                    <input type="text" name="job_title" class="form-control sm py-0" value="{{ old('job_title', $admin->job_title) }}"
                      onchange="this.form.submit()" style="border:none;background-color:transparent;">
                  </div>
                </div>
              </form>
            </div>
            <div class="col col-6 mb-2">
              <form method="POST" action="{{ route('admins.update', $admin->id) }}">
                @csrf
                @method('PUT')

                <div class="row">
                  <div class="col col-6">Email:</div>
                  <div class="col col-6">
                    <input type="text" class="form-control sm py-0" name="email" value="{{ old('email', $admin->email) }}"
                      onchange="this.form.submit()" style="border:none;background-color:transparent;">
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="sessions" role="tabpanel" aria-labelledby="sessions-tab">
          @if($admin->shifts->isNotEmpty())
          <div class="row mt-2">
            <div class="col col-12">
              <div class="selected-products-container" style="font-size: 14px;">
                <!-- Header Row -->
                <div class="row g-0 border-bottom py-2  fw-bold align-items-center">
                  <div class="col-1 text-center fw-bold fs-6">#</div>
                  <div class="col-3 fw-bold fs-6">Session Name</div>
                  <div class="col-3 text-center fw-bold fs-6">Start Time</div>
                  <div class="col-3 text-center fw-bold fs-6">End Time</div>
                  <div class="col-2 text-center fw-bold fs-6">Status</div>

                </div>

                <!-- Items Rows -->
                @foreach($admin->shifts as $shift)
                <div class="row g-0 border-bottom py-2 align-items-center">
                  <div class="col-1 text-center fs-6">{{ $loop->iteration }}</div>
                  <div class="col-3 ps-2 fs-6">{{ $shift->monybox->name }}</div>
                  <div class="col-3 text-center fs-6">{{ $shift->start_time->format('d/m/Y H:i') }}</div>
                  <div class="col-3 text-center fs-6">
                    @if($shift->end_time)
                    {{ $shift->end_time->format('d/m/Y H:i') }}
                    @else
                    <span class=" btn btn-sm btn-warning">In Progress</span>
                    @endif
                  </div>
                  <div class="col-2 text-center fs-6"> @if($shift->status == 'Active')
                    <span class="btn btn-sm btn-success">Active</span>
                    @else
                    <span class="btn btn-sm btn-secondary">Closed</span>
                    @endif
                  </div>



                </div>
                @endforeach
              </div>




            </div>
          </div>
          @else
          <div class="alert alert-info mb-0">
            No shifts found for this user
          </div>
          @endif
        </div>
        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
          <p class="mt-3">....................</p>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection