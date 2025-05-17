
@extends('layouts.admin')

@section('header-links')
    <li class="breadcrumb-item"><a href="#">{{ __('profile.account') }}</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{ __('profile.view_profile') }}</li>
@endsection
@section('contents')
<style>
  .nav-link.active {
    color: black !important; 
background-color:gray;
    border-left:4px solid  blue !important;
    font-weight: bold; 
    
  }
  /* Hover effect for the profile picture */
  .position-relative:hover .btn-upload {
    opacity: 1;
    z-index:20;
  }
</style>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h1 class="mt-3 pb-2 header-border">{{ __('profile.profile') }}</h1>
                <!-- تبويبات التنقل -->
                <ul class="nav nav-tabs mt-3" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="PersonalInfo-tab" data-bs-toggle="tab"
                            data-bs-target="#PersonalInfo" type="button" role="tab" aria-controls="PersonalInfo"
                            aria-selected="true">{{ __('profile.personal_info') }}</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="jobInfo-tab" data-bs-toggle="tab" data-bs-target="#jobInfo"
                            type="button" role="tab" aria-controls="jobInfo" aria-selected="false">{{ __('profile.job_info') }}</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="sessions-tab" data-bs-toggle="tab" data-bs-target="#sessions"
                            type="button" role="tab" aria-controls="sessions" aria-selected="false">{{ __('profile.sessions') }}</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="security-logs-tab" data-bs-toggle="tab" data-bs-target="#security-logs"
                            type="button" role="tab" aria-controls="security-logs" aria-selected="false">{{ __('profile.security_logs') }}</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="accountInfo-tab" data-bs-toggle="tab" data-bs-target="#accountInfo"
                            type="button" role="tab" aria-controls="accountInfo" aria-selected="false">{{ __('profile.account-info') }}</button>
                    </li>
                    <form action="{{route('admin.logout')}}" class="nav-item" method="POST">
                        @csrf
                        <button type="submit" class="nav-link">{{ __('profile.logout') }}</button>
                    </form>
                </ul>

                <!-- محتوى التبويبات -->
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="PersonalInfo" role="tabpanel"
                        aria-labelledby="PersonalInfo-tab">
                            <!-- Profile Picture Section -->
                            @include('admin.users.partials.personal-info')
                  
                    </div>
                    <div class="tab-pane fade" id="jobInfo" role="tabpanel" aria-labelledby="jobInfo-tab">
                    @include('admin.users.partials.job-info')
                  </div>
                    <div class="tab-pane fade" id="sessions" role="tabpanel" aria-labelledby="sessions-tab">
                        @include('admin.users.partials.session-section')
                    </div>

                    <div class="tab-pane fade" id="security-logs" role="tabpanel" aria-labelledby="security-logs-tab">
                    @include('admin.users.partials.security-logs')
                    </div>
                    <div class="tab-pane fade" id="accountInfo" role="tabpanel" aria-labelledby="settings-tab">
                    
                    @include('admin.users.partials.account-info')

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection