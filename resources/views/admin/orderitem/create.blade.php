@extends('layouts.admin')

@section('extra-links')
    {{-- Include your custom CSS for order items --}}
    <link rel="stylesheet" href="{{ asset('assets/admin/css/orderitem.css') }}">
    {{-- Include Swiper CSS from CDN --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
@endsection

@section('contents')
    {{-- Header Row with Flexbox --}}
    <div class="title-slider-header">
        {{-- Left Part (30%) --}}
        <div class="title-new-section">
        <h1>Add Order Items</h1>
        @if(isset($shift) && $shift->status == 'Active')
    <a href="{{ route('fast-create-order', $shift->id) }}" >
        <i class="fas fa-plus"></i> New 
    </a>
@else
    <button class="btn btn-secondary" disabled>
        <i class="fas fa-plus"></i> No Active Shift
    </button>
@endif
        </div>

        {{-- Right Part (70%) --}}
        <div class="slider-section">
            <div class="order-slider-container">
                <div class="swiper order-slider">
                    <div class="swiper-wrapper">
                        @forelse ($orders as $pendingOrder)
                            <div class="swiper-slide"> {{-- Each item must be inside swiper-slide --}}
                                @if ($pendingOrder->wait_no == 'new')
                                    <a href="{{ route('add-orderitem', [$pendingOrder->id]) }}"
                                        title="Order SN - {{ $pendingOrder->order_sn }}"
                                        class="btn btn-sm btn-info">
                                        {{ $pendingOrder->wait_no }}
                                    </a>
                                @else
                                    <a href="{{ route('add-orderitem', [$pendingOrder->id]) }}"
                                        title="Order SN - {{ $pendingOrder->order_sn }}"
                                        class="btn btn-sm btn-outline-secondary">
                                        {{ $pendingOrder->wait_no }}
                                    </a>
                                @endif
                            </div>
                        @empty
                            {{-- Optional: You can add a placeholder slide if the list is empty --}}
                            {{-- <div class="swiper-slide"><span class="text-muted">No pending orders</span></div> --}}
                        @endforelse
                    </div>
                </div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </div>
    </div>

    {{-- Rest of your page content --}}
    <div class="container">
        <div class="row mt-3 d-flex gap-3">
            <div class="col col-4">
                {{-- Left Column Content (Category select, Order Items list) --}}
                <div class="row">
                    <div class="col col-12">
                        <select class="form-select form-control mt-2" id="category-select">
                            <option selected value="">All category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->cat_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col col-12">
                        <div class="selected-products-container" style="font-size: 14px;">
                            <div class="row g-0 border-bottom py-2 fw-bold align-items-center">
                                <div class="col-1 text-center fw-bold fs-6">#</div>
                                <div class="col-3 ps-2 fw-bold fs-6">Meal</div>
                                <div class="col-2 text-center fw-bold fs-6">Qty</div>
                                <div class="col-2 text-center fw-bold fs-6">U.Price</div>
                                <div class="col-2 text-center fw-bold fs-6">T.Price</div>
                                <div class="col-2 text-center fw-bold fs-6">Action</div>
                            </div>

                            @foreach ($order->orderItems as $oItem)
                                <div class="row g-0 border-bottom py-2 align-items-center">
                                    <form action="{{ route('update-orderitem') }}" method="post" class="d-flex align-items-center w-100 p-0">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $oItem->id }}">

                                        <div class="col-1 text-center fs-6">{{ $loop->iteration }}</div>
                                        <div class="col-3 ps-2 fs-6">{{ $oItem->product->name }}</div>

                                        <div class="col-2 text-center fs-6">
                                            <input type="number" name="quantity" value="{{ $oItem->quantity }}"
                                                style="width: 50px; border: 1px solid #dedede; padding: 2px 5px;"
                                                class="text-center fs-6">
                                        </div>

                                        <div class="col-2 text-center fs-6">
                                            <input type="number" step="0.01" name="price" value="{{ old('price', $oItem->price) }}"
                                                style="width: 70px; border: 1px solid #dedede; padding: 2px 5px;"
                                                class="text-center fs-6">
                                        </div>

                                        <div class="col-2 text-end fs-6">{{ number_format($oItem->quantity * $oItem->price, 2) }}</div> {{-- Added number_format --}}

                                        <div class="col-2 text-center fs-6">
                                            <div class="d-flex justify-content-center gap-1">
                                                <button type="submit" class="btn btn-sm p-0 border-0 bg-transparent"
                                                    title="Update Order Item">
                                                    <i class="fas fa-save text-secondary fs-6"></i>
                                                </button>
                                                <a class="btn btn-sm p-0 border-0 bg-transparent"
                                                    onclick="return confirm('You are about to delete an item, are you sure?')"
                                                    title="Delete order item"
                                                    href="{{ route('destroy-oItem-info', $oItem->id) }}">
                                                    <i class="fa fa-trash text-danger fs-6"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            @endforeach
                        </div>

                        <div class="py-1" style="border-bottom: 1px solid #dedede"></div>
                        <div class="total-price mt-2 d-flex justify-content-between align-items-center">
                            <h4>Total Price:</h4>
                            <h4><span id="total-price">{{ number_format($totalPrice, 2) }}</span></h4> {{-- Added number_format --}}
                        </div>
                        <div class="py-1" style="border-bottom: 1px solid #dedede"></div>
                        <div class="input-group pt-2 px-3 justify-content-end align-items-center gap-2"> {{-- Added gap --}}
                            <a href="/admin/orders/index" class="btn px-3 py-1 btn-outline-secondary btn-sm"
                                title="Back To Order List">
                                Back To Order
                            </a>
                            @if ($order->status == 3 && $order->invoice)
                                <a href="{{ route('view-invoice', [$order->invoice->id]) }}"
                                    class="btn py-1 btn-outline-secondary btn-sm">
                                    View Invoice
                                </a>
                            @endif
                            @if ($order->status === 2)
                                <div class="dropdown"> {{-- Wrap dropdown elements --}}
                                    <button class="btn px-3 py-1 btn-outline-secondary btn-sm dropdown-toggle"
                                        id="submit-order-items" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Finish
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#" data-bs-target="#cashPaymentModal"
                                                data-bs-toggle="modal">Cash Payment</a></li>
                                        {{-- Add other payment methods if needed --}}
                                        {{-- <li><a class="dropdown-item" href="#">Debit Card</a></li> --}}
                                        {{-- <li><a class="dropdown-item" href="#">Transfer</a></li> --}}
                                        {{-- <li><a class="dropdown-item" href="#">Credit Sales</a></li> --}}
                                    </ul>
                                </div>
                            @elseif($order->status === 3)
                                <a href="{{ route('allow-order-editting', [$order->id]) }}"
                                    class="btn px-3 py-1 btn-outline-secondary btn-sm">Allow edit</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="col col-7 pb-3 pt-3 px-4">
                <div class="row d-flex gap-1" id="product-list">
                    @if (isset($products) && count($products))
                        @foreach ($products as $product)
                            <div class="col col-2 productlist p-0"
                                style="border-radius: 6px;border: 2px solid {{ in_array($product->id, $Ois) ? '#007bff' : '#f7f5f5' }}"
                                data-category="{{ $product->category_id }}">
                                <form action="/admin/orderItems/store/{{ $order->id }}" method="POST" class="m-0"> {{-- Removed margin from form --}}
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <input type="hidden" name="order_id" value="{{ $order->id }}">
                                    <button type="submit" class="product-item">
                                        <div class="productlistimg-container">
                                            <div class="productlistimg"
                                                style="background-image: url('{{ $product->image ? asset('assets/admin/uploads/images/products/' . $product->image) : asset('assets/admin/images/default-product.png') }}');">
                                            </div>
                                            <div class="price-overlay">
                                                <h5 class="price-display">{{ number_format($product->sale_price, 2) }}</h5> {{-- Added number_format --}}
                                            </div>
                                        </div>
                                        <div class="productlistcontent">
                                            <h5 class="mt-1">{{ $product->name }}</h5>
                                            @if (($quantities[$product->id] ?? 0) > 0)
                                                <p style="border-top-left-radius: 5px" class="mb-3 quantity-display">
                                                    Qty:{{ $quantities[$product->id] ?? 0 }}
                                                </p>
                                            @endif
                                        </div>
                                    </button>
                                </form>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="cashPaymentModal" aria-hidden="true" aria-labelledby="cashPaymentModalLabel"
        tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-header" style="padding: 0.5rem 1rem; border-bottom: 1px solid #dedede;"> {{-- Use modal-header for better structure --}}
                    <h1 class="modal-title fs-5" id="cashPaymentModalLabel">Cash Payment</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                 <form id="cash-payment-form" action="{{ route('payments.cash.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="order_id" value="{{ $order->id }}">
                    <div class="modal-body">
                        <div class="input-group input-group-sm mb-2"> {{-- Use input-group-sm and consistent margin --}}
                            <span class="input-group-text" style="width: 110px;">Amount</span> {{-- Use span and fixed width for alignment --}}
                            <input type="number" step="0.01" class="form-control text-end" name="amount" id="amount"
                                value="{{ number_format($totalPrice, 2, '.', '') }}" required readonly>
                        </div>
                        <div class="input-group input-group-sm mb-2">
                            <span class="input-group-text" style="width: 110px;">Vat Amount</span>
                            <input type="number" step="0.01" class="form-control text-end" name="vat_amount"
                                id="vatAmount" value="{{ number_format($vatAmount, 2, '.', '') }}" required readonly>
                        </div>
                        <div class="input-group input-group-sm mb-2">
                            <span class="input-group-text" style="width: 110px;">Total Amount</span>
                            <input type="number" step="0.01" class="form-control text-end fw-bold" name="total_amount"
                                id="total_amount" value="{{ number_format($totalAmount, 2, '.', '') }}" required readonly>
                        </div>
                        <hr class="my-2"> {{-- Separator --}}
                        <div class="input-group input-group-sm mb-2">
                             <span class="input-group-text" style="width: 110px;">Paid</span>
                            <input type="number" step="0.01" class="form-control text-end" name="paid" id="paid"
                                value="{{ number_format($totalAmount, 2, '.', '') }}" required>
                        </div>
                        <div class="input-group input-group-sm mb-1">
                            <span class="input-group-text" style="width: 110px;">Remaining</span>
                            <input type="number" step="0.01" class="form-control text-end" name="remaining"
                                id="remaining" value="0.00" required readonly>
                        </div>
                    </div>
                    <div class="modal-footer" style="border-top: 1px solid #dedede; padding: 0.5rem;"> {{-- Use modal-footer --}}
                        <button type="button" class="btn px-3 py-1 btn-outline-secondary btn-sm"
                            data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn px-3 py-1 btn-primary btn-sm">Confirm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Include Swiper JS library - Use defer to load after HTML parsing --}}
    <script defer src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    {{-- Your Custom JavaScript --}}
    <script>
        // Wrap all JS in DOMContentLoaded to ensure elements are loaded
        document.addEventListener('DOMContentLoaded', function() {

            // --- Swiper Initialization ---
            const swiper = new Swiper('.order-slider', {
                // direction: 'horizontal', // Default
                loop: false,
                slidesPerView: 'auto', // Crucial for variable width items
                spaceBetween: 8, // Space between buttons
                navigation: {
                    nextEl: '.order-slider-container .swiper-button-next',
                    prevEl: '.order-slider-container .swiper-button-prev',
                    disabledClass: 'swiper-button-disabled', // Class for disabled state styling
                },
                allowTouchMove: true,
                grabCursor: true,
                freeMode: false, // Prevent free scrolling, snap to slides
                passiveListeners: true, // Improve touch scroll performance
            });

            // --- Category Filtering ---
            const categorySelect = document.getElementById('category-select');
            const productList = document.querySelectorAll('.productlist');

            if(categorySelect){
                categorySelect.addEventListener('change', function() {
                    const selectedCategoryId = this.value;
                    productList.forEach(function(product) {
                        const productCategoryId = product.dataset.category;
                        if (selectedCategoryId === "" || productCategoryId == selectedCategoryId) {
                            product.style.display = ''; // Show element (reset display)
                        } else {
                            product.style.display = 'none'; // Hide element
                        }
                    });
                });
            }


            // --- Cash Payment Modal Logic ---
            const cashPaymentModal = document.getElementById('cashPaymentModal');
            const paidInput = document.getElementById('paid');
            const totalAmountInput = document.getElementById('total_amount'); // Renamed for clarity
            const remainingInput = document.getElementById('remaining'); // Renamed for clarity

             function updateRemaining() {
                 // Ensure inputs exist before accessing value
                 if (!totalAmountInput || !paidInput || !remainingInput) return;

                 const totalAmount = parseFloat(totalAmountInput.value) || 0;
                 const paid = parseFloat(paidInput.value) || 0;
                 const remaining = totalAmount - paid;
                 remainingInput.value = remaining.toFixed(2);
             }

            if (cashPaymentModal && paidInput && totalAmountInput && remainingInput) {
                cashPaymentModal.addEventListener('shown.bs.modal', function() {
                    const totalAmount = parseFloat(totalAmountInput.value) || 0;

                    // Set paid amount to total amount initially
                    paidInput.value = totalAmount.toFixed(2);

                    // Calculate remaining amount initially
                    updateRemaining();

                    // Focus on paid input and select all text
                    paidInput.focus();
                    paidInput.select();
                });

                // Update remaining amount when paid amount changes
                paidInput.addEventListener('input', updateRemaining);
            }

             // Initialize Bootstrap tooltips (if you use them elsewhere)
             var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
             var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
             })

        }); // End DOMContentLoaded
    </script>

@endsection