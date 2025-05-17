
@extends('layouts.admin')

@section('contents')
<div class="container-fluid">
  <div class="row">

    <div class="col-md-12">
      <div id="products-container">

        <h1 class="mt-3 pb-2" style="border-bottom: 1px solid #dedede">{{ __('clients.client_list') }}</h1>
        <!-- هنا سيتم اضافة العملاء -->
        <div class="row">
          <div class="col col col-12 pt-3">
            <div class="card card-body">
              <form action="/admin/clients/store" method="POST">
                @csrf
                <div class="input-group sm mb-2">
                  <label class="input-group-text" for="vat_number">{{ __('clients.vat_number') }}</label>
                  <input type="number" class="form-control sm" name="vat_number" id="vat_number">
                  <label class="input-group-text" for="name">{{ __('clients.client_name') }}</label>
                  <input type="text" class="form-control sm" name="name" id="name">
                  <label class="input-group-text" for="phone">{{ __('clients.phone_number') }}</label>
                  <input type="number" class=" form-control sm " name="phone" id="phone">
                  <label class="input-group-text" for="address">{{ __('clients.address') }}</label>
                  <input type="text" class="form-control sm" name="address" id="address">
                  <button type="submit" class="py-0 btn btn-primary">{{ __('clients.save_client') }}</button>
                  <button type="reset" class="py-0 btn btn-secondary" id="add-item">{{ __('clients.reset') }}</button>
                </div>
              </form>
            </div>
          </div>
          <div class="py-2" style="border-bottom: 1px solid #dedede"></div>
        </div>
        <!-- هنا سيتم عرض العملاء -->
        <table class="table table-striped  mt-2">
          <thead>
            <tr>
              <th>#</th>
              <th>{{ __('clients.vat_number') }}</th>
              <th>{{ __('clients.client_name') }}</th>
              <th>{{ __('clients.phone_number') }}</th>
              <th>{{ __('clients.address') }}</th>
              <th>{{ __('clients.control') }}</th>
            </tr>
          </thead>
          <tbody>
            @php $counter = 0; @endphp
            @if (count($clients))
            @foreach ($clients as $client)
            <tr>
              <td>{{ ++$counter }}</td>
              <td>{{ $client->vat_number}}</td>
              <td>{{ $client->name}}</td>
              <td>{{ $client->phone }}</td>
              <td>{{ $client->address }}</td>
              <td>
                <a class="btn btn-sm py-0" href="{{ route('view-client-info', $client->id) }}"><i
                    class="fas fa-eye text-success" title="{{ __('clients.view_details') }}"></i></a>
                <a class="btn btn-sm py-0" href="{{ route('edit-client-info', $client->id) }}"><i
                    class="fa fa-edit text-primary" title="{{ __('clients.edit') }}"></i></a>
                <a class="btn btn-sm py-0" onclick="if(!confirm('You are about to delete a order, are you sure!?.')){return false}"
                  title="{{ __('clients.delete') }}" href="{{ route('destroy-client-info', $client->id) }}"><i
                    class="fa fa-trash text-danger"></i></a>
              </td>
            </tr>
            @endforeach
            @else
            <tr>
              <td colspan="7">{{ __('clients.no_clients') }}</td>
            </tr>
            @endif
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection