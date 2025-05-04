@extends('layouts.admin')

@section('contents')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Meals State</h4>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Meal Name</th>
                                <th>Meal State</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Meal 1</td>
                                <td>Ready</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection