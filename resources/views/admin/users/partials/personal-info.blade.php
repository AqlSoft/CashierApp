<div class="row mb-4">
                                <div class="col col-4">
                                    <img src="{{ asset('assets/admin/uploads/images/avatar/avatar-04.jpg') }}"
                                        alt="Profile Picture" class="profile-picture">
                                    <div class="mt-3">
                                        <input type="file" id="profilePhoto" class="d-none">
                                        <label for="profilePhoto" class="btn btn-upload">
                                            <i class="fas fa-camera me-2"></i>Change Photo
                                        </label>
                                    </div>
                                    <small class="text-muted">JPEG or PNG, max 2MB</small>
                                </div>

                                <!-- Personal Information Section -->
                                <div class="col col-8 mb-2 mt-4">
                                    <div class="row mb-3">
                                        <div class="col col-8 mb-2">
                                            <form method="POST" action="{{ route('admins.update', $admin->id) }}">
                                                @csrf
                                                @method('PUT')
                                                <div class="row">
                                                    <div class="col col-5 fw-bold text-end">
                                                        User Name:
                                                    </div>
                                                    <div class="col col-7 text-start">
                                                        <input type="text" class="form-control sm py-0" name="userName"
                                                            value="{{ old('userName', $admin->userName) }}"
                                                            onchange="this.form.submit()"
                                                            style="border:none;background-color:transparent;">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                        <div class="col col-8 mb-2">
                                            <form method="POST" action="{{ route('admins.update', $admin->id) }}">
                                                @csrf
                                                @method('PUT')
                                                <div class="row">
                                                    <div class="col col-5 fw-bold text-end">Job Title:</div>
                                                    <div class="col col-7">
                                                        <input type="text" name="job_title" class="form-control sm py-0"
                                                            value="{{ old('job_title', $admin->job_title) }}"
                                                            onchange="this.form.submit()"
                                                            style="border:none;background-color:transparent;">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col col-8 mb-2">
                                            <form method="POST" action="{{ route('admins.update', $admin->id) }}">
                                                @csrf
                                                @method('PUT')
                                                <div class="row">
                                                    <div class="col col-5 fw-bold text-end">Email:</div>
                                                    <div class="col col-7 text-start">
                                                        <input type="text" class="form-control sm py-0" name="email"
                                                            value="{{ old('email', $admin->email) }}"
                                                            onchange="this.form.submit()"
                                                            style="border:none;background-color:transparent;width:200px">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>