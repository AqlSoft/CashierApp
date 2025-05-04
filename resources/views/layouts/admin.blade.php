<!doctype html>
<html lang="{{ App::getLocale() }}" dir="{{ $dir }}" data-bs-theme="auto">

<head>
    <!-- <script src="{{ asset('assets/admin/js/color.modes.js') }}"></script> -->
    {{-- ADMIN TEMPLATE BLADE --}}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.122.0">
    <title>@yield('title', 'CashSys | Cashier System')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css"
        integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://js.pusher.com/8.4.0/pusher.min.js"></script>
    <script>
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('ce366b8b3640b0beefc0', {
            cluster: 'ap2'
        });

        var channel = pusher.subscribe('my-channel');
        channel.bind('my-event', function(data) {
            alert(JSON.stringify(data));
        });
    </script>

    <!-- <script src="{{ asset('assets/admin/js/app.main.js') }}"></script> -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <!-- Custom styles for this template -->
    <link href="{{ asset('assets/admin/css/sidebar.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/css/my-custom-styles.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/css/admin-layout.css') }}" rel="stylesheet">
    
    <!-- RTL/LTR Styles -->
    @if($dir == 'rtl')
        <link href="{{ asset('assets/admin/css/rtl.css') }}" rel="stylesheet">
    @endif
    
    @yield('extra-links')
</head>

<body class="{{ $dir }}-direction">

    <div class="admin-wrapper">
        @include('inc.sidebar')
        <div id="content">
            <header id="main-header" class="">

                <nav aria-label="breadcrumb">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
                        @yield('header-links')
                    </ul>
                </nav>

            </header>
            <div class="container-fluid py-5 mb-5">
                <div class="container mt-3">
                    @if (session('success'))
                    <div class="alert alert-sm alert-success py-1 mt-2">
                        {{ session('success') }}
                    </div>
                    @elseif (session('error'))
                    <div class="alert alert-sm alert-danger py-1 mt-2">
                        {{ session('error') }}
                    </div>
                    @endif
                    @yield('contents')
                </div>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/js/all.min.js"
        integrity="sha512-1JkMy1LR9bTo3psH+H4SV5bO2dFylgOy+UJhMus1zF4VEFuZVu5lsi4I6iIndE4N9p01z1554ZDcvMSjMaqCBQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- <script src="{{ asset('assets/admin/js/sidebar.js') }}"></script> -->
    <!--<script src="{{ asset('assets/admin/js/color.modes.js') }}"></script> -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
            const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(
                tooltipTriggerEl), {
                placement: 'bottom'
            })
        })
    </script>
</body>

</html>