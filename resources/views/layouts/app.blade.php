<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="{{ asset('dist/css/tabler.min.css?1692870487') }}" rel="stylesheet" />
        <link href="{{ asset('dist/css/tabler-flags.min.css?1692870487') }}" rel="stylesheet" />
        <link href="{{ asset('dist/css/tabler-payments.min.css?1692870487') }}" rel="stylesheet" />
        <link href="{{ asset('dist/css/tabler-vendors.min.css?1692870487') }}" rel="stylesheet" />
        <link href="{{ asset('dist/css/demo.min.css?1692870487') }}" rel="stylesheet" />
        <link href="{{ asset('dist/libs/fontawsome/css/all.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('dist/libs/fontawsome/css/regular.min.css') }}" rel="stylesheet" />

        <style>
            @import url('https://rsms.me/inter/inter.css');
            :root {
                --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
            }
            body {
                font-feature-settings: "cv03", "cv04", "cv11";
            }
        </style>
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
    <script src="{{ asset('dist/js/demo-theme.min.js?1692870487') }}"></script>
    <script src="{{ asset('dist/libs/fontawsome/js/all.min.js') }}"></script>
    <script src="{{ asset('dist/libs/fontawsome/js/regular.min.js') }}"></script>
    
        <div class="page">
          

            <div class="page-wrapper">

              @include('layouts.navigation')
                @yield('header')
                <!-- Page Content -->
                <div class="page-body">
                    <div class="container-xl">
                        @yield('content')
                    </div>
                </div>

                {{-- Footer --}}

                <footer class="footer footer-transparent d-print-none">
                    <div class="container-xl">
                      <div class="row text-center align-items-center flex-row-reverse">
                        <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                          <ul class="list-inline list-inline-dots mb-0">
                            <li class="list-inline-item">
                              Baletech &copy; 2024
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </footer>

            </div>
        </div>
            <!-- Libs JS -->
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
        <script src="{{ asset('dist/libs/nouislider/dist/nouislider.min.js?1692870487') }}" defer></script>
        <script src="{{ asset('dist/libs/litepicker/dist/litepicker.js?1692870487') }}" defer></script>
        <script src="{{ asset('dist/libs/tom-select/dist/js/tom-select.base.min.js?1692870487') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        {{-- <script src="../dist/libs/apexcharts/dist/apexcharts.min.js?1692870487" defer></script>
        <script src="../dist/libs/jsvectormap/dist/js/jsvectormap.min.js?1692870487" defer></script>
        <script src="../dist/libs/jsvectormap/dist/maps/world.js?1692870487" defer></script>
        <script src="../dist/libs/jsvectormap/dist/maps/world-merc.js?1692870487" defer></script> --}}
        <!-- Tabler Core -->
        <script src="{{ asset('dist/js/tabler.min.js?1692870487') }}" defer></script>
        <script src="{{ asset('dist/js/demo.min.js?1692870487') }}" defer></script>

        @yield('scripts')
    </body>
</html>
