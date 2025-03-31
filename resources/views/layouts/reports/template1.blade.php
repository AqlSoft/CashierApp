<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
  <script src="{{ asset('assets/admin/js/color.modes.js') }}"></script>
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

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
  <!-- Custom styles for this template -->
  <link rel="stylesheet" href="{{ asset('/assets/admin/css/report.style.css') }}">
  @yield('extra-links')
</head>


<body>

  <div class="admin-wrapper">
    <table id="content" class="text-center">
      <thead>
        <tr>
          <td>
            {{-- ========== header reports  ======================== --}}
            @foreach ($settings as $setting)
            <header class="header-report">
            
              <div class="header-left">

                <div class="logo">
                  <img src="{{ asset('assets/admin/uploads/images/logo-icon.png')}}" alt="logo_report" />
                  <div class="logo-text ">
                    <span class="company-name">{{$setting->company_name}}</span>
                    <span class="company-slogan">company slogan</span>
                  </div>
                </div>
                <div class="company-number mt-1">155 East Street, Winchester</div>
              </div>

              <div class="header-right">
                <span class="title-report">Simplified Tax Invoice</span>
                <span class="info-report mt-1">order SN: 123456789</span>
              </div>


            </header>
          </td>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>
            <div class="client-info p-3 text-center d-flex align-items-center">
              <div class="row ">
                <div class="col col-6 pb-2">
                  <div class="row">
                    <div class="col col-4 text-end fw-bold">Cashier:</div>
                    <div class="col col-8 text-start">Atef Aql</div>
                  </div>
                </div>
                <div class="col col-6 pb-1">
                  <div class="row">
                    <div class="col col-4  text-end fw-bold">CRN: </div>
                    <div class="col col-8 text-start">123478000</div>
                  </div>
                </div>
                <div class="col col-12 tax_number pt-1 ">
                  <div class="row ">
                    <div class="col col-4 text-end fw-bold">Tax Number: </div>
                    <div class="col col-8 text-start">{{$setting->tax_number}}</div>
                  </div>
                </div>
              </div>

            </div>
@endforeach
            @yield('contents')
          </td>
        </tr>
      </tbody>

    </table>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/js/all.min.js"
    integrity="sha512-1JkMy1LR9bTo3psH+H4SV5bO2dFylgOy+UJhMus1zF4VEFuZVu5lsi4I6iIndE4N9p01z1554ZDcvMSjMaqCBQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>