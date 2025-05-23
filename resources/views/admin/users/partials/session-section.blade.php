
<div class="row">
  <div class="col-lg-12 col-sm-12">
    <h1 class="mt-3 pb-2" style="border-bottom: 1px solid #dedede">{{ __('profile.session_management') }}</h1>

    <div class="d-flex justify-content-start align-items-start setting-nav p-0">
      {{-- Sidebar Navigation --}}
      <div class="nav flex-column justify-content-start text-end" style="width:180px;" id="v-pills-tab" role="tablist" aria-orientation="vertical">
        <button class="nav-link active" id="v-pills-active-sessions-tab" data-bs-toggle="pill" data-bs-target="#v-pills-active-sessions" type="button" role="tab" aria-controls="v-pills-active-sessions" aria-selected="true">
          {{ __('profile.active_sessions') }}
        </button>
        <button class="nav-link" id="v-pills-old-sessions-tab" data-bs-toggle="pill" data-bs-target="#v-pills-old-sessions" type="button" role="tab" aria-controls="v-pills-old-sessions" aria-selected="false">
          {{ __('profile.old_sessions') }}
        </button>
      </div>

      {{-- Tab Content --}}
      <div class="tab-content p-3 m-0" id="v-pills-tabContent">
        {{-- Active Sessions --}}
        <div class="tab-pane fade show active" id="v-pills-active-sessions" role="tabpanel" aria-labelledby="v-pills-active-sessions-tab" tabindex="0">
          <h4 class="mb-3">{{ __('profile.active_sessions') }}</h4>
          
          @if ($activeSessions)
            <div class="list-group">
             
                <div class="list-group-item">
                  <h5 class="mb-1  pb-1 pt-1">{{ __('profile.session_name') }}: <strong>{{ '@' }}</strong></h5>
                  <p class="mb-1  pb-1 pt-1">{{ __('profile.device_name') }}: <strong>{{ $activeSessions->device_name ?? '-' }}</strong></p>
                  <p class="mb-1  pb-1 pt-1">{{ __('profile.cashbox_name') }}: <strong>{{ $activeSessions->monybox->name }}</strong></p>
                  <p class="mb-1  pb-1 pt-1">{{ __('profile.total_orders') }}: <strong>{{ $activeSessions->orders->count() }}</strong></p>
                  <p class="mb-1  pb-1 pt-1">{{ __('profile.total_revenue') }}:: <strong> {{ number_format($sessionSales, 2) }} {{ __('profile.currency') }}</strong></p>
                  <p class="mb-1  pb-1 pt-1">{{ __('profile.cashbox_total') }}:: <strong> {{ number_format($activeSessions->cashbox_total, 2) }} {{ __('profile.currency') }}</strong></p>
                  <p class="mb-1  pb-1 pt-1">
                            @if ($activeSessions->status == 'Active')
                                <span class="btn btn-sm btn-success">{{ __('profile.active') }}</span>
                                @php $hasActiveShift = true; @endphp
                            @else
                                <span class="btn btn-sm btn-secondary">{{ __('profile.closed') }}</span>
                            @endif
                            
                            @if(isset($activeSessions) && $activeSessions->status == 'Active')
                                <a href="{{ route('fast-create-order', [ $activeSessions->id]) }}" class="btn btn-sm btn-info">
                                    <i title="{{ __('profile.add_new_order') }}" class="fa fa-plus"></i>
                                </a>
                            @endif
                  </p>

                </div>
              
            </div>
          @else
            <div class="alert alert-info">{{ __('profile.no_active_sessions') }}</div>
          @endif
        </div>

        {{-- Old Sessions --}}
        <div class="tab-pane fade" id="v-pills-old-sessions" role="tabpanel" aria-labelledby="v-pills-old-sessions-tab" tabindex="0">
          <h4 class="mb-3">{{ __('profile.old_sessions') }}</h4>
          @if ($oldSessions->isNotEmpty())
            <div class="list-group">
              @foreach ($oldSessions as $session)
                <div class="list-group-item p-3">
                  <h5 class="mb-1 pb-1 pt-1">{{ __('profile.session_name') }}: <strong>{{ $session->name }}</strong></h5>
                  <p class="mb-1 pb-1 pt-1">{{ __('profile.start_time') }}: <strong>{{ $session->start_time->format('d/m/Y H:i') }}</strong></p>
                  <p class="mb-1 pb-1 pt-1">{{ __('profile.end_time') }}: <strong>{{ $session->end_time ? $session->end_time->format('d/m/Y H:i') : __('profile.in_progress') }}</strong></p>
                  <p class="mb-1 pb-1 pt-1">{{ __('profile.total_orders') }}: <strong>{{$session->orders->count() }}</strong></p>
                  <p class="mb-1 pb-1 pt-1">{{ __('profile.total_revenue') }}: <strong>{{ number_format($session->total_revenue, 2) }} {{ __('profile.currency') }}</strong></p>
                </div>
              @endforeach
            </div>
          @else
            <div class="alert alert-info">{{ __('profile.no_old_sessions') }}</div>
          @endif
        </div>
      </div>
    </div>
  </div>
</div>