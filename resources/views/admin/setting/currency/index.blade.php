<h1 class="mb-3">{{__('currency.currencies-list')}}

    <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#addCurrencyModal">
        <span data-bs-toggle="tooltip" data-bs-placement="top" title="{{__('currency.add-currency')}}"><i class="fas fa-plus"></i></span>
    </button>
</h1>
{{-- List of currencies --}}
<div class="row items-list">
    @forelse ($currencies as $currency)
    <div class="col-4 mb-2">
        <div class="card mb-3 w-100">
            <div class="row g-0">
                <div class="text-center" style="width: 100px">
                    <div class="d-flex justify-content-center align-items-center h-100">
                        <img width="100" height="100" src="{{ $currency->icon ? asset('assets/admin/uploads/' . $currency->icon) : asset('assets/admin/images/default-currency.png') }}" class="img-fluid rounded px-3" alt="...">
                    </div>
                </div>
                <div class="" style="width: calc(100% - 100px)">
                    <div class="card-body pb-0">
                        <h5 class="card-title">{{ $currency->name }}</h5>
                        <p class="card-text mt-0 mb-3">{{ $currency->code }} <br>
                            @if ($currency->is_default)
                            <span class="badge bg-success" style="padding: 2px 8px;">Default</span>
                            @endif
                            @if ($currency->is_active)
                            <span class="badge bg-success" style="padding: 2px 8px;">Active</span>
                            @else
                            <span class="badge bg-danger" style="padding: 2px 8px;">Inactive</span>
                            @endif
                        </p>

                        <div class="actions position-absolute top-0">
                            <a href="{{ route('view-currency-info', $currency->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-display"></i></a>
                            <a href="{{ route('destroy-currency-info', $currency->id) }}" class="btn btn-danger btn-sm">
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

<div class="modal mt-5" id="addCurrencyModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{__('currency.add-currency-modal-title')}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('store-currency-info') }}" method="POST" id="currency-form" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">

                    <div class="row">
                        <!-- العمود الأول -->
                        <div class="col-md-6">
                            <!-- رمز العملة -->
                            <div class="input-group mb-2">
                                <label for="code" class="input-group-text">{{__('currency.code')}} (ISO) <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('code') is-invalid @enderror"
                                    id="code" name="code" value="{{ old('code') }}"
                                    placeholder="{{__('currency.currncy-code-input-ph')}}" maxlength="3" required>
                            </div>
                            @error('code')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">{{__('currency.currncy-code-input-hint')}}</small>

                            <!-- اسم العملة -->
                            <div class="input-group mb-2">
                                <label for="name" class="input-group-text">{{__('currency.name')}} <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" value="{{ old('name') }}"
                                    placeholder="{{__('currency.currncy-name-input-ph')}}" required>
                            </div>
                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                            <!-- رمز العملة -->
                            <div class="input-group mb-2">
                                <label for="symbol" class="input-group-text">{{__('currency.symbol')}} </label>
                                <input type="text" class="form-control @error('symbol') is-invalid @enderror"
                                    id="symbol" name="symbol" value="{{ old('symbol', '$') }}"
                                    placeholder="{{__('currency.currncy-symbol-input-ph')}}">
                            </div>
                            @error('symbol')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                            <!-- موقع الرمز -->
                            <label for="symbol_position" class="form-label">{{__('currency.symbol-position')}} </label>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-check form-switch mb-2">
                                        <input type="radio" id="symbol_before" name="symbol_position"
                                            value="before" class="form-check-input"
                                            {{ old('symbol_position', 'before') == 'before' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="symbol_before">{{__('currency.symbol-position-before')}}</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-check form-switch mb-2">
                                        <input type="radio" id="symbol_after" name="symbol_position"
                                            value="after" class="form-check-input"
                                            {{ old('symbol_position') == 'after' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="symbol_after">{{__('currency.symbol-position-after')}}</label>
                                    </div>
                                </div>
                            </div>

                            @error('symbol_position')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <hr>

                            <!-- تفعيل العملة -->
                            <div class="row">
                                <div class="col-6">
                                    <label class="form-label">{{__('currency.currency-status')}}</label>
                                    <div class="form-check form-switch mb-2">
                                        <input type="radio" id="is_active" name="is_active"
                                            value="1" class="form-check-input"
                                            {{ old('is_active', 1) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="is_active">{{__('currency.active')}}</label>
                                    </div>

                                    <div class="form-check form-switch">
                                        <input type="radio" id="is_inactive" name="is_active"
                                            value="0" class="form-check-input"
                                            {{ old('is_active', 0) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="is_inactive">{{__('currency.inactive')}}</label>
                                    </div>
                                </div>

                                @error('is_active')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror

                                <div class="col-6">
                                    <!-- أيقونة العملة -->
                                    <label class="form-label">{{__('currency.icon')}} </label>
                                    <div class="mb-2">
                                        <div class="mb-2 text-center">
                                            <label for="icon" style="cursor:pointer; display:inline-block;">
                                                <img id="iconPreview" src="{{ asset('assets/admin/images/default-currency.png') }}" alt="Currency Icon"
                                                    style="width: 60px; height: 60px; object-fit: contain; border: 1px solid #ddd; border-radius: 8px; background: #fff;">
                                            </label>
                                            <input type="file" id="icon" name="icon" accept="image/*" style="display:none;">
                                            <br>
                                            <small class="form-text text-muted">{{__('currency.icon-hint')}}</small>
                                            @error('icon')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- العمود الثاني -->
                        <div class="col-md-6">
                            <!-- عدد المنازل العشرية -->
                            <div class="input-group mb-2">
                                <label for="decimal_places" class="input-group-text">{{__('currency.decimal-places')}} </label>
                                <select class="form-control @error('decimal_places') is-invalid @enderror"
                                    id="decimal_places" name="decimal_places">
                                    @for($i = 0; $i <= 6; $i++)
                                        <option value="{{ $i }}" {{ old('decimal_places', 2) == $i ? 'selected' : '' }}>
                                        {{ $i }} {{__('currency.decimal-places-option')}}
                                        </option>
                                        @endfor
                                </select>
                            </div>
                            @error('decimal_places')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                            <!-- فاصل الكسور -->
                            <div class="input-group mb-2">
                                <label for="decimal_separator" class="input-group-text">{{__('currency.decimal-separator')}} </label>
                                <input type="text" class="form-control @error('decimal_separator') is-invalid @enderror"
                                    id="decimal_separator" name="decimal_separator"
                                    value="{{ old('decimal_separator', '.') }}" maxlength="1">
                            </div>
                            @error('decimal_separator')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                            <!-- فاصل الآلاف -->
                            <div class="input-group mb-2">
                                <label for="thousands_separator" class="input-group-text">{{__('currency.thousands-separator')}} </label>
                                <input type="text" class="form-control @error('thousands_separator') is-invalid @enderror"
                                    id="thousands_separator" name="thousands_separator"
                                    value="{{ old('thousands_separator', ',') }}" maxlength="1">
                            </div>
                            @error('thousands_separator')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                            <!-- سعر الصرف -->
                            <div class="input-group mb-2">
                                <label for="exchange_rate" class="input-group-text">{{__('currency.exchange-rate')}} </label>
                                <input type="number" step="0.000001" class="form-control @error('exchange_rate') is-invalid @enderror"
                                    id="exchange_rate" name="exchange_rate"
                                    value="{{ old('exchange_rate', 1.0) }}">
                            </div>
                            @error('exchange_rate')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">{{__('currency.exchange-rate-hint')}}</small>
                            <hr>

                            <!-- العملة الافتراضية -->
                            <div class="input-group mb-2">
                                <div class="form-check form-switch">
                                    <input type="checkbox" class="form-check-input" id="is_default"
                                        name="is_default" value="1" {{ old('is_default') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_default">{{__('currency.default-currency')}}</label>
                                </div>
                            </div>
                            <small class="form-text text-muted">{{__('currency.default-currency-hint')}}</small>
                            <hr>

                        </div>
                    </div>
                </div>
                <div class="modal-footer py-1">
                    <div class="d-flex justify-content-end gap-2">
                        <button type="reset" class="btn btn-outline-secondary py-1">
                            <i class="fas fa-undo"></i> {{__('currency.reset-form')}}
                        </button>
                        <button type="submit" class="btn btn-outline-primary py-1">
                            <i class="fas fa-save"></i> {{__('currency.save-currency')}}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>



@section('extra-scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
<script>
    // تأكد من تحميل jQuery
    if (typeof jQuery != 'undefined') {
        console.log('jQuery is loaded');

        $(document).ready(function() {
            console.log('Document is ready');

            // فتح نافذة اختيار الصورة عند الضغط على الصورة نفسها
            $('#iconPreview').on('click', function() {
                console.log('Image clicked');
                $('#icon').trigger('click');
            });

            // معاينة صورة الأيقونة قبل الحفظ
            $('#icon').on('change', function(event) {
                console.log('File input changed');
                const files = event.target.files;

                if (files && files[0]) {
                    console.log('File selected:', files[0].name);

                    const reader = new FileReader();
                    reader.onload = function(e) {
                        console.log('File loaded:', e.target.result.substring(0, 50) + '...');
                        $('#iconPreview').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(files[0]);
                }
            });

            // تحويل رمز العملة إلى أحرف كبيرة تلقائياً
            $('#code').on('input', function() {
                this.value = this.value.toUpperCase();
            });

            // التحقق من صحة النموذج قبل الإرسال
            if ($.validator) {
                console.log('jQuery Validation is loaded');
                $('#currency-form').validate({
                    rules: {
                        code: {
                            required: true,
                            minlength: 3,
                            maxlength: 3
                        },
                        name: {
                            required: true,
                            minlength: 3
                        },
                        decimal_separator: {
                            required: true,
                            maxlength: 1
                        },
                        thousands_separator: {
                            required: true,
                            maxlength: 1
                        }
                    },
                    messages: {
                        code: {
                            required: "حقل رمز العملة مطلوب",
                            minlength: "يجب أن يتكون رمز العملة من 3 أحرف",
                            maxlength: "يجب أن يتكون رمز العملة من 3 أحرف"
                        },
                        name: {
                            required: "حقل اسم العملة مطلوب",
                            minlength: "يجب أن يكون اسم العملة على الأقل 3 أحرف"
                        }
                    }
                });
            } else {
                console.error('jQuery Validation is not loaded!');
            }
        });
    } else {
        console.error('jQuery is not loaded!');
    }
</script>
@endsection