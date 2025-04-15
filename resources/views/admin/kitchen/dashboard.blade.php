@extends('layouts.admin')
@section('contents')

<div class="container">
<h1 class="mt-3 pb-2 header-border" >Order List</h1>
    @if (session('modal_order_id'))
        <script>
            $(document).ready(function() {
                $('#orderDetailsModal{{ session('modal_order_id') }}').modal('show');
            });
        </script>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div id="order-list-container">
        @include('admin.kitchen.partials.order_list') {{-- تضمين جزء لعرض قائمة الطلبات --}}
    </div>
</div>

<script>
    $(document).ready(function() {
        if (typeof EventSource !== 'undefined') {
            var eventSource = new EventSource('/sse/kitchen-orders');

            eventSource.onmessage = function(event) {
                var data = JSON.parse(event.data);
                if (data.event === 'order.updated') {
                    // تحديث قائمة الطلبات بناءً على البيانات الواردة
                    $.ajax({
                        url: '/admin/kitchen/orders/list', // مسار لإرجاع قائمة الطلبات المحدثة كـ HTML جزئي
                        type: 'GET',
                        success: function(response) {
                            $('#order-list-container').html(response);
                        },
                        error: function(error) {
                            console.error('Error fetching updated order list:', error);
                        }
                    });
                }
            };

            eventSource.onerror = function(error) {
                console.error('SSE connection error:', error);
                eventSource.close();
            };
        } else {
            console.log('SSE غير مدعوم في هذا المتصفح.');
        }
    });
</script>

@endsection