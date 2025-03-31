@extends('layouts.reports.template1')

@section('contents')
<div class="container-fluid content-report">
  <table class="table table-bordered table-sm mt-1  ">
    <thead>
      <tr>
                <th scope="col">#</th>
                <th scope="col">Meal</th>
                <th scope="col">Qty</th>
                <th scope="col">U.Price</th>
                <th scope="col">T.Price</th>
              
        <!-- <th class="header-color">#</th> -->
      
      </tr>
    </thead>
    <tbody>
      @php
      $counter = 0;
      @endphp
      @foreach ($invoice->order->orderItems as $oItem)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $oItem->product->name }}</td>
        <td>{{  $oItem->quantity }}</td>
        <td>{{ $oItem->price }}</td>
        <td>{{ $oItem->quantity * $oItem->price }}</td>
      </tr>
      @endforeach
    
    </tbody>
  
    <tfoot>
      <tr>
        <td colspan="4" class="fw-bold text-end">Totals</td>
        <td class="price">{{$invoice->amount}}</td>
      </tr>
      <tr>
        <td colspan="4" class="fw-bold text-end">Vat Amount</td>
        <td class="price">{{$invoice->vat_amount}}</td>
      </tr>
      <tr>
        <td colspan="4" class="fw-bold text-end">Total Amount</td>
        <td class="price">{{$invoice->total_amount}}</td>
      </tr>
    </tfoot>
  </table>
  <div class="row footer-section mt-1 row">
    <div class=" col col-12"><img class="" src="{{ asset('assets/admin/uploads/images/R.png')}}" alt="logo_report" /></div>
            
  </div>
</div>

@endsection