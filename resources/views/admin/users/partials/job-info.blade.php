<div class="row g-3">
  <div class="col col-12">
    <div class="accordion" id="accordionExample">

      {{-- Employee Status --}}
      <div class="accordion-item bg-transparent">
        <h2 class="accordion-header bg-transparent">
          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseStatus" aria-expanded="true" aria-controls="collapseStatus">
            <i class="fas fa-user-check me-2"></i> Employee Status
          </button>
        </h2>
        <div id="collapseStatus" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
          <div class="accordion-body">
            <p>Status: <strong>Active</strong></p>
          </div>
        </div>
      </div>

      {{-- Contract Type --}}
      <div class="accordion-item bg-transparent">
        <h2 class="accordion-header bg-transparent">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseContract" aria-expanded="false" aria-controls="collapseContract">
            <i class="fas fa-file-contract me-2"></i> Contract Type
          </button>
        </h2>
        <div id="collapseContract" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
          <div class="accordion-body">
            <p>Contract Type: <strong>Full-Time</strong></p>
            <p>Contract End Date: <strong>2025-12-31</strong></p>
          </div>
        </div>
      </div>

      {{-- Working Schedule --}}
      <div class="accordion-item bg-transparent">
        <h2 class="accordion-header bg-transparent">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSchedule" aria-expanded="false" aria-controls="collapseSchedule">
            <i class="fas fa-clock me-2"></i> Working Schedule
          </button>
        </h2>
        <div id="collapseSchedule" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
          <div class="accordion-body">
            <p>Working Days: <strong>6 days per week</strong></p>
            <p>Working Hours: <strong>8 AM - 5 PM</strong></p>
          </div>
        </div>
      </div>

  
      {{-- Monthly Attendance Record --}}
      <div class="accordion-item bg-transparent">
        <h2 class="accordion-header">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseAttendance" aria-expanded="false" aria-controls="collapseAttendance">
            <i class="fas fa-calendar-check me-2"></i> Attendance Record
          </button>
        </h2>
        <div id="collapseAttendance" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
          <div class="accordion-body">
            <p>Days Present: <strong>22</strong></p>
            <p>Days Absent: <strong>2</strong></p>
            <p>Late Hours: <strong>3 hours</strong></p>
            <p>Used Leave Days: <strong>5 days</strong></p>
          </div>
        </div>
      </div>

      {{-- Overtime Hours --}}
      <div class="accordion-item bg-transparent">
        <h2 class="accordion-header bg-transparent">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOvertime" aria-expanded="false" aria-controls="collapseOvertime">
            <i class="fas fa-business-time me-2"></i> Overtime Hours
          </button>
        </h2>
        <div id="collapseOvertime" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
          <div class="accordion-body">
            <p>Monthly Overtime Hours: <strong>10 hours</strong></p>
            <p>Overtime Pay: <strong>500 SAR</strong></p>
          </div>
        </div>
      </div>

      {{-- Financial Information --}}
      <div class="accordion-item bg-transparent">
        <h2 class="accordion-header bg-transparent">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFinancial" aria-expanded="false" aria-controls="collapseFinancial">
            <i class="fas fa-dollar-sign me-2"></i> Financial Information
          </button>
        </h2>
        <div id="collapseFinancial" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
          <div class="accordion-body">
            <p>Basic Salary: <strong>10,000 SAR</strong></p>
            <p>Incentives & Bonuses: <strong>2,000 SAR</strong></p>
            <p>Deductions: <strong>500 SAR</strong></p>
            <p>Salary Payment Date: <strong>25th of each month</strong></p>
          </div>
        </div>
      </div>

      {{-- Bonuses and Deductions --}}
      <div class="accordion-item bg-transparent">
        <h2 class="accordion-header bg-transparent">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseBonuses" aria-expanded="false" aria-controls="collapseBonuses">
            <i class="fas fa-money-bill-wave me-2"></i> Bonuses & Deductions
          </button>
        </h2>
        <div id="collapseBonuses" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
          <div class="accordion-body">
            <p>Sales Target Bonuses: <strong>1000 SAR</strong></p>
            <p>Financial Mistakes Deductions: <strong>200 SAR</strong></p>
          </div>
        </div>
      </div>

      {{-- Employment Record --}}
      <div class="accordion-item bg-transparent">
        <h2 class="accordion-header bg-transparent">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEmployment" aria-expanded="false" aria-controls="collapseEmployment">
            <i class="fas fa-briefcase me-2"></i> Employment Record
          </button>
        </h2>
        <div id="collapseEmployment" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
          <div class="accordion-body">
            <p>Entitled Leaves: <strong>30 days</strong></p>
            <p>Consumed Leaves: <strong>15 days</strong></p>
            <p>Absences & Delays: <strong>3 days</strong></p>
            <p>Violations & Warnings: <strong>1 warning</strong></p>
            <p>Achievements & Awards: <strong>Employee of the Month (March 2025)</strong></p>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>