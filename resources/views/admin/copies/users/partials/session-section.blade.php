@if ($admin->shifts->isNotEmpty())
    <div class="row mt-2">
        <div class="col col-12">
            <div class="selected-products-container" style="font-size: 14px;">
                <!-- Header Row  table-header-->
                <div class="row g-0 border-bottom py-2 fw-bold align-items-center">
                    <div class="col-1 text-center fw-bold">#</div>
                    <div class="col-3 fw-bold">{{ __('profile.session_name') }}</div>
                    <div class="col-3 text-center fw-bold">{{ __('profile.start_time') }}</div>
                    <div class="col-3 text-center fw-bold">{{ __('profile.end_time') }}</div>
                    <div class="col-2 text-center fw-bold">{{ __('profile.status') }}</div>
                </div>

                <!-- Items Rows -->
                @foreach ($admin->shifts as $shift)
                    <div class="row g-0 border-bottom py-2 align-items-center">
                        <div class="col-1 text-center fs-6">{{ $loop->iteration }}</div>
                        <div class="col-3 ps-2 fs-6">{{ $shift->monybox->name }}</div>
                        <div class="col-3 text-center fs-6">{{ $shift->start_time->format('d/m/Y H:i') }}</div>
                        <div class="col-3 text-center fs-6">
                            @if ($shift->end_time)
                                {{ $shift->end_time->format('d/m/Y H:i') }}
                            @else
                                <span class="btn btn-sm btn-warning">{{ __('profile.in_progress') }}</span>
                            @endif
                        </div>
                        <div class="col-2 text-center fs-6">
                            @if ($shift->status == 'Active')
                                <span class="btn btn-sm btn-success">{{ __('profile.active') }}</span>
                                @php $hasActiveShift = true; @endphp
                            @else
                                <span class="btn btn-sm btn-secondary">{{ __('profile.closed') }}</span>
                            @endif
                            
                            @if(isset($shift) && $shift->status == 'Active')
                                <a href="{{ route('fast-create-order', [ $shift->id]) }}" class="btn btn-sm btn-info">
                                    <i title="{{ __('profile.add_new_order') }}" class="fa fa-plus"></i>
                                </a>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@else
    <div class="alert alert-info mb-0">
        {{ __('profile.no_shifts_found') }}
    </div>
@endif