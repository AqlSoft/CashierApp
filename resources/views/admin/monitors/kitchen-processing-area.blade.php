@extends('layouts.admin')

@section('contents')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>{{ __('kitchen-processing-area.processing_area') }}</h4>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>{{ __('kitchen-processing-area.meal_name') }}</th>
                                <th>{{ __('kitchen-processing-area.meal_state') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ __('kitchen-processing-area.meal_1') }}</td>
                                <td>{{ __('kitchen-processing-area.ready') }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection