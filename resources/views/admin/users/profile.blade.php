@extends('layouts.admin')

@section('header-links')
    <li class="breadcrumb-item"><a href="#">Account</a></li>
    <li class="breadcrumb-item active" aria-current="page">View Profile</li>
@endsection
@section('contents')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <h1 class="mt-3 pb-2 header-border">Profile</h1>

                <!-- تبويبات التنقل -->
                <ul class="nav nav-tabs mt-3" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="PersonalInfo-tab" data-bs-toggle="tab"
                            data-bs-target="#PersonalInfo" type="button" role="tab" aria-controls="PersonalInfo"
                            aria-selected="true">Personal Info</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="jobInfo-tab" data-bs-toggle="tab" data-bs-target="#jobInfo"
                            type="button" role="tab" aria-controls="jobInfo" aria-selected="false">Job Info</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="sessions-tab" data-bs-toggle="tab" data-bs-target="#sessions"
                            type="button" role="tab" aria-controls="sessions" aria-selected="false">Sessions</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="security-logs-tab" data-bs-toggle="tab" data-bs-target="#security-logs"
                            type="button" role="tab" aria-controls="security-logs" aria-selected="false">Security Logs</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="settings-tab" data-bs-toggle="tab" data-bs-target="#settings"
                            type="button" role="tab" aria-controls="settings" aria-selected="false">Settings</button>
                    </li>
                    <form action="{{route('admin.logout')}}" class="nav-item" method="POST">
                        @csrf
                        <button type="submit" class="nav-link">Logout</button>
                    </form>
                </ul>

                <!-- محتوى التبويبات -->
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="PersonalInfo" role="tabpanel"
                        aria-labelledby="PersonalInfo-tab">
                        <div class="profile-container">
                            <div class="profile-header">
                                <h4>Update Your Personal Info</h4>
                            </div>

                            <!-- Profile Picture Section -->
                            @include('admin.users.partials.personal-info')
                          
                        </div>
                    </div>
                    <div class="tab-pane fade" id="jobInfo" role="tabpanel" aria-labelledby="jobInfo-tab">
                
                    @include('admin.users.partials.job-info')

                  </div>
                    <div class="tab-pane fade" id="sessions" role="tabpanel" aria-labelledby="sessions-tab">
                      
                        @include('admin.users.partials.session-section')
                    </div>

                    <div class="tab-pane fade" id="security-logs" role="tabpanel" aria-labelledby="security-logs-tab">
                    @include('admin.users.partials.statistics')
                    </div>
                    <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="settings-tab">
                    settings
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection