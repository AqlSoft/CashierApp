<div class="row">
  <div class="col-lg-12 col-sm-12">
    <h1 class="mt-3 pb-2" style="border-bottom: 1px solid #dedede">{{ __('profile.employee_information') }}</h1>

    <div class="d-flex justify-content-start align-items-start setting-nav p-0">
      {{-- Sidebar Navigation --}}
      <div class="nav flex-column justify-content-start text-end" style="width:180px;" id="v-pills-tab" role="tablist" aria-orientation="vertical">
        <button class="nav-link active" id="v-pills-status-tab" data-bs-toggle="pill" data-bs-target="#v-pills-status" type="button" role="tab" aria-controls="v-pills-status" aria-selected="true">
          {{ __('profile.employee_status') }}
        </button>
        <button class="nav-link" id="v-pills-contract-tab" data-bs-toggle="pill" data-bs-target="#v-pills-contract" type="button" role="tab" aria-controls="v-pills-contract" aria-selected="false">
          {{ __('profile.contract_type') }}
        </button>
        <button class="nav-link" id="v-pills-schedule-tab" data-bs-toggle="pill" data-bs-target="#v-pills-schedule" type="button" role="tab" aria-controls="v-pills-schedule" aria-selected="false">
          {{ __('profile.working_schedule') }}
        </button>
        <button class="nav-link" id="v-pills-attendance-tab" data-bs-toggle="pill" data-bs-target="#v-pills-attendance" type="button" role="tab" aria-controls="v-pills-attendance" aria-selected="false">
          {{ __('profile.attendance_record') }}
        </button>
        <button class="nav-link" id="v-pills-overtime-tab" data-bs-toggle="pill" data-bs-target="#v-pills-overtime" type="button" role="tab" aria-controls="v-pills-overtime" aria-selected="false">
          {{ __('profile.overtime_hours') }}
        </button>
        <button class="nav-link" id="v-pills-financial-tab" data-bs-toggle="pill" data-bs-target="#v-pills-financial" type="button" role="tab" aria-controls="v-pills-financial" aria-selected="false">
          {{ __('profile.financial_information') }}
        </button>
        <button class="nav-link" id="v-pills-employment-tab" data-bs-toggle="pill" data-bs-target="#v-pills-employment" type="button" role="tab" aria-controls="v-pills-employment" aria-selected="false">
          {{ __('profile.employment_record') }}
        </button>
      </div>

      {{-- Tab Content --}}
      <div class="tab-content p-3 m-0" id="v-pills-tabContent">
        {{-- Employee Status --}}
        <div class="tab-pane fade show active" id="v-pills-status" role="tabpanel" aria-labelledby="v-pills-status-tab" tabindex="0">
          <p>{{ __('profile.status') }}: <strong>{{ __('profile.active') }}</strong></p>
          <!-- <p>{{ __('profile.hire_date') }}: <strong>{{ $admin->created_at->format('Y-m-d') }}</strong></p> -->
          <!-- <p>{{ __('profile.work_duration') }}: <strong>  {{ $admin->created_at->diffForHumans() }}</strong></p> -->

        </div>

        {{-- Contract Type --}}
        <div class="tab-pane fade" id="v-pills-contract" role="tabpanel" aria-labelledby="v-pills-contract-tab" tabindex="0">
          <p>{{ __('profile.contract_type_label') }}: <strong>Full-Time</strong></p>
          <p>{{ __('profile.contract_end_date') }}: <strong>2025-12-31</strong></p>
        </div>

        {{-- Working Schedule --}}
        <div class="tab-pane fade" id="v-pills-schedule" role="tabpanel" aria-labelledby="v-pills-schedule-tab" tabindex="0">
          <p>{{ __('profile.working_days') }}: <strong>6 days per week</strong></p>
          <p>{{ __('profile.working_hours') }}: <strong>8 AM - 5 PM</strong></p>
        </div>

        {{-- Attendance Record --}}
        <div class="tab-pane fade" id="v-pills-attendance" role="tabpanel" aria-labelledby="v-pills-attendance-tab" tabindex="0">
          <p>{{ __('profile.days_present') }}: <strong>22</strong></p>
          <p>{{ __('profile.days_absent') }}: <strong>2</strong></p>
          <p>{{ __('profile.late_hours') }}: <strong>3 hours</strong></p>
          <p>{{ __('profile.used_leave_days') }}: <strong>5 days</strong></p>
        </div>

        {{-- Overtime Hours --}}
        <div class="tab-pane fade" id="v-pills-overtime" role="tabpanel" aria-labelledby="v-pills-overtime-tab" tabindex="0">
          <p>{{ __('profile.monthly_overtime_hours') }}: <strong>10 hours</strong></p>
          <p>{{ __('profile.overtime_pay') }}: <strong>500 SAR</strong></p>
        </div>

        {{-- Financial Information --}}
        <div class="tab-pane fade" id="v-pills-financial" role="tabpanel" aria-labelledby="v-pills-financial-tab" tabindex="0">
          <p>{{ __('profile.basic_salary') }}: <strong>10,000 SAR</strong></p>
          <p>{{ __('profile.incentives_bonuses') }}: <strong>2,000 SAR</strong></p>
          <p>{{ __('profile.deductions') }}: <strong>500 SAR</strong></p>
          <p>{{ __('profile.salary_payment_date') }}: <strong>25th of each month</strong></p>
        </div>

        {{-- Employment Record --}}
        <div class="tab-pane fade" id="v-pills-employment" role="tabpanel" aria-labelledby="v-pills-employment-tab" tabindex="0">
          <p>{{ __('profile.entitled_leaves') }}: <strong>30 days</strong></p>
          <p>{{ __('profile.consumed_leaves') }}: <strong>15 days</strong></p>
          <p>{{ __('profile.absences_delays') }}: <strong>3 days</strong></p>
          <p>{{ __('profile.violations_warnings') }}: <strong>1 warning</strong></p>
          <p>{{ __('profile.achievements_awards') }}: <strong>{{ __('profile.employee_of_the_month') }} (March 2025)</strong></p>
        </div>


      </div>

    </div>

  </div>
</div>