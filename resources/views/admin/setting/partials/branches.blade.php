<h1 class="mb-3">{{__('branches.branches-list')}}</h1>
<div class="row" style="margin-bottom:2rem">
    @if(isset($branches) && count($branches) > 0)
    @foreach($branches as $branch)
    @php
    $type = $branch->branch_type;
    $typeLabel = $type === 'main' ? 'رئيسي' : ($type === 'sub' ? 'فرعي' : 'افتراضي');
    $typeClass = $type === 'main' ? 'branch-type-main' : ($type === 'sub' ? 'branch-type-sub' : 'branch-type-virtual');
    $isActive = $branch->is_active == 'active' || $branch->is_active == 1;
    $isOnline = $branch->is_online == 'online' || $branch->is_online == 1;
    @endphp
    <div class="col col-12 col-md-6">
        <div class="branch-card position-relative">
            <a href="{{ route('edit-branch-info', $branch->id) }}">
                <div class="row branch-icons mb-3 ps-5">
                    <span class="w-auto branch-type-label text-center py-1 px-3 {{ $typeClass }}">{{ $typeLabel }}</span>
                    <span class="py-1 px-3 bg-{{ $isActive ? 'success' : 'danger' }}" style="width: 50px;">
                        @if($isActive)
                        <i class="fa-solid fa-link text-white"></i>
                        @else
                        <i class="fa-solid fa-unlink text-white"></i>
                        @endif
                    </span>
                    <span class="py-1 px-3 bg-{{ $isOnline ? 'success' : 'danger' }}" style="width: 50px;">
                        @if($isOnline)
                        <i class="fa-solid fa-check-square text-white"></i>
                        @else
                        <i class="fa-solid fa-times text-white"></i>
                        @endif
                    </span>
                </div>
                <div class="branch-name text-center">{{ $branch->name_ar ?? $branch->name_en }}</div>
                <div class="branch-code text-center">{{ $branch->code }}</div>
            </a>
        </div>
    </div>
    @endforeach
    @else
    <div class="alert alert-info text-center mb-0">
        لا يوجد فروع حالياً
    </div>
    @endif
</div>

<form action="{{route('store-branch-info')}}" method="POST">
    @csrf
    @method('POST')
    <div class="row">
        <div class="col col-12 col-md-6">
            <div class="input-group sm mb-2">
                <label for="code" class="input-group-text">{{__('branches.code')}}</label>
                <input type="text" name="code" class="form-control" placeholder="{{__('branches.code-ph')}}" value="{{old('code')}}">
            </div>
        </div>
        <div class="col col-12 col-md-6">
            <div class="input-group sm mb-2">
                <label for="branch_type" class="input-group-text">{{__('branches.branch_type')}}</label>
                <select name="branch_type" class="form-select">
                    <option value="" hidden>{{__('branches.branch_type-ph')}}</option>
                    <option value="main">{{__('branches.main')}}</option>
                    <option value="sub">{{__('branches.sub')}}</option>
                    <option value="virtual">{{__('branches.virtual')}}</option>
                </select>
            </div>
        </div>
        <div class="col col-12 col-md-6">
            <div class="input-group sm mb-2">
                <label for="name_ar" class="input-group-text">{{__('branches.name_ar')}}</label>
                <input type="text" name="name_ar" class="form-control" placeholder="{{__('branches.name_ar-ph')}}" value="{{old('name_ar')}}">
            </div>
        </div>
        <div class="col col-12 col-md-6">
            <div class="input-group sm mb-2">
                <label for="name_en" class="input-group-text">{{__('branches.name_en')}}</label>
                <input type="text" name="name_en" class="form-control" placeholder="{{__('branches.name_en-ph')}}" value="{{old('name_en')}}">
            </div>
        </div>

        <div class="col col-12 col-md-6">

            <div class="input-group sm mb-2">
                <label for="is_active" class="input-group-text">{{__('branches.is_active')}}</label>
                <select name="is_active" class="form-select">
                    <option value="" hidden>{{__('branches.is_active-ph')}}</option>
                    <option value="active" {{old('is_active') == 'active' ? 'selected' : ''}}>{{__('branches.yes')}}</option>
                    <option value="inactive" {{old('is_active') == 'inactive' ? 'selected' : ''}}>{{__('branches.no')}}</option>
                </select>
            </div>
        </div>

        <div class="col col-12 col-md-6">
            <div class="input-group sm mb-2">
                <label for="is_online" class="input-group-text">{{__('branches.is_online')}}</label>
                <select name="is_online" class="form-select">
                    <option value="" hidden>{{__('branches.is_online-ph')}}</option>
                    <option value="online" {{old('is_online') == 'online' ? 'selected' : ''}}>{{__('branches.yes')}}</option>
                    <option value="offline" {{old('is_online') == 'offline' ? 'selected' : ''}}>{{__('branches.no')}}</option>
                </select>
            </div>
        </div>

    </div>

    <button type="submit" class="btn btn-primary">{{__('branches.save')}}</button>
</form>