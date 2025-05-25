
@extends('layouts.admin')
@section('contents')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div id="units-container">
                <h1 class="mt-3 pb-2" style="border-bottom: 1px solid #dedede">
                    <a href="{{ route('product-setting-home') }}" class="btn py-1 fw-bold btn-primary">Home</a>
                    <a href="{{ route('display-units-all') }}" class="btn py-1 fw-bold btn-primary active">Units</a>
                    <a href="{{ route('display-categories-all') }}" class="btn py-1 fw-bold btn-primary">Categories</a>
                </h1>
                <table class="table table-striped mt-2">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Brief</th>
                            <th>Status</th>
                            <th>Control</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $index => $category)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $category->cat_name }}</td>
                            <td>{{ $category->cat_breif }}</td>
      
                            <td>
                                @if($category->status)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-secondary">Inactive</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('edit-category-info', $category->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                <form action="{{ route('destroy-category-info', $category->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this category?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        @if($categories->isEmpty())
                        <tr>
                            <td colspan="6" class="text-center">No categories found.</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection