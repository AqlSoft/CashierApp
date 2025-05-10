<h1 class="mb-3">{{__('currency.currencies-list')}}</h1>
{{-- List of currencies --}}
<div class="row items-list">
    @forelse ($invoices as $invoice)
    <div class="col-4 mb-2">
        <div class="card mb-3 w-100">
            <div class="row g-0">
                <div class="text-center" style="width: 100px">
                    <div class="d-flex justify-content-center align-items-center h-100">
                        <img width="100" height="100" src="{{ asset('assets/admin/images/invoice.jpg') }}" class="img-fluid p-0" alt="...">
                    </div>
                </div>
                <div class="" style="width: calc(100% - 100px)">
                    <div class="card-body pb-0">
                        <h5 class="card-title">{{ $invoice->invoice_number }}</h5>
                        <p class="card-text mt-0 mb-3">{{ $invoice->due_date }} <br>
                            @if ($invoice->payment_date)
                            <span class="badge bg-success" style="padding: 2px 8px;">Paid</span>
                            @else
                            <span class="badge bg-danger" style="padding: 2px 8px;">Unpaid</span>
                            @endif
                        </p>

                        <div class="actions position-absolute top-0">
                            <a href="{{ route('view-invoice-info', $invoice->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-display"></i></a>
                            <a href="{{ route('destroy-invoice-info', $invoice->id) }}" class="btn btn-danger btn-sm">
                                <i class="fa fa-trash"></i>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @empty
    <div class="col-12 mb-2">
        <p>No currencies found.</p>
    </div>
    @endforelse
</div>