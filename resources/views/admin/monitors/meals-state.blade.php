@extends('layouts.admin')

@section('contents')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>{{ __('meals-state.meals_state') }}</h4>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>{{ __('meals-state.meal_name') }}</th>
                                <th>{{ __('meals-state.meal_state') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ __('meals-state.meal_1') }}</td>
                                <td>{{ __('meals-state.ready') }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection