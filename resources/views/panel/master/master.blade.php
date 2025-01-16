<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <title>Dashboard</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>






{{--    <link--}}
{{--        href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css"--}}
{{--        rel="stylesheet"--}}
{{--    />--}}

    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.2.8/css/rowReorder.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css">



    <link
        href="https://cdn.jsdelivr.net/npm/litepicker/dist/css/litepicker.css"
        rel="stylesheet"
    />
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet"/>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon.png') }}"/>
    <script
        data-search-pseudo-elements
        defer
        src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js"
        crossorigin="anonymous"
    ></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js"
        crossorigin="anonymous"
    ></script>

    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
</head>
<body class="nav-fixed">
<nav
    class="topnav navbar navbar-expand shadow justify-content-between justify-content-sm-start navbar-light bg-white"
    id="sidenavAccordion"
>
    <!-- Sidenav Toggle Button-->
    <button
        class="btn btn-icon btn-transparent-dark order-1 order-lg-0 me-2 ms-lg-2 me-lg-0"
        id="sidebarToggle"
    >
        <i data-feather="menu"></i>
    </button>
    <!-- Navbar Brand-->
    <!-- * * Tip * * You can use text or an image for your navbar brand.-->
    <!-- * * * * * * When using an image, we recommend the SVG format.-->
    <!-- * * * * * * Dimensions: Maximum height: 32px, maximum width: 240px-->
    <a class="navbar-brand pe-3 ps-4 ps-lg-2" href="{{ route('dashboard') }}">Dashboard</a>
    <!-- Navbar Search Input-->

    <!-- Navbar Items-->
    <ul class="navbar-nav align-items-center ms-auto">


        <!-- User Dropdown-->
        <li class="nav-item dropdown no-caret dropdown-user me-3 me-lg-4">
            <a
                class="btn btn-icon btn-transparent-dark dropdown-toggle"
                id="navbarDropdownUserImage"
                href="javascript:void(0);"
                role="button"
                data-bs-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
            ><img
                    class="img-fluid"
                    src="{{ asset('assets/img/illustrations/profiles/profile-1.png') }}"
                /></a>
            <div
                class="dropdown-menu dropdown-menu-end border-0 shadow animated--fade-in-up"
                aria-labelledby="navbarDropdownUserImage"
            >
                <h6 class="dropdown-header d-flex align-items-center">
                    <img
                        class="dropdown-user-img"
                        src="{{ asset('assets/img/illustrations/profiles/profile-1.png') }}"
                    />
                    <div class="dropdown-user-details">
                        <div class="dropdown-user-details-name">{{ auth()->user()->name ?? '' }}</div>
                        <div class="dropdown-user-details-email">{{ auth()->user()->email ?? '' }}</div>
                    </div>
                </h6>
                <div class="dropdown-divider"></div>
                {{--                <a class="dropdown-item" href="#!">--}}
                {{--                    <div class="dropdown-item-icon">--}}
                {{--                        <i data-feather="settings"></i>--}}
                {{--                    </div>--}}
                {{--                    Account--}}
                {{--                </a>--}}
                <a class="dropdown-item" href="{{ route('log_out') }}">
                    <div class="dropdown-item-icon">
                        <i data-feather="log-out"></i>
                    </div>
                    Logout
                </a>
            </div>
        </li>
    </ul>
</nav>
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sidenav shadow-right sidenav-light">
            <div class="sidenav-menu">
                <div class="nav accordion" id="accordionSidenav">


                    {{-- ----------------------------- Sidebar ----------------------------- --}}

                    {{-- --- Admin Sidebar --- --}}


                    @if(auth()->user()->user_role == 'admin')
                        <x-panel.sidebar.admin></x-panel.sidebar.admin>
                    @endif

                    {{-- --- Admin manager --- --}}

                    @if(auth()->user()->user_role == 'manager')
                        <x-panel.sidebar.manager></x-panel.sidebar.manager>
                    @endif

                    {{-- --- Staff manager --- --}}

                    @if(auth()->user()->user_role == 'staff')
                        <x-panel.sidebar.staff></x-panel.sidebar.staff>
                    @endif

                    {{-- ----------------------------- Sidebar ----------------------------- --}}

                </div>
            </div>
            <!-- Sidenav Footer-->
            <div class="sidenav-footer">
                <div class="sidenav-footer-content">
                    <div class="sidenav-footer-subtitle">Logged in as:</div>
                    <div class="sidenav-footer-title">{{ auth()->user()->name ?? '' }}
                        - {{ \Illuminate\Support\Str::ucfirst(auth()->user()->user_role) ?? '' }}</div>
                </div>
            </div>
        </nav>
    </div>
    <div id="layoutSidenav_content">

        {{-- ------------------------- Main content ------------------------- --}}

        @yield('content')

        {{-- ------------------------- Main content ------------------------- --}}


        <footer class="footer-admin mt-auto footer-light">
            <div class="container-xl px-4">
                <div class="row">
                    <div class="col-md-6 small">
                        Copyright &copy; Your Website 2021
                    </div>
                    <div class="col-md-6 text-md-end small">
                        <a href="#!">Privacy Policy</a>
                        &middot;
                        <a href="#!">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    crossorigin="anonymous"
></script>
<script src="{{ asset('js/scripts.js') }}"></script>
<script
    src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"
    crossorigin="anonymous"
></script>
<script src="{{ asset('assets/demo/chart-area-demo.js') }}"></script>
<script src="{{ asset('assets/demo/chart-bar-demo.js') }}"></script>



{{--<script--}}
{{--    src="https://cdn.jsdelivr.net/npm/simple-datatables@latest"--}}
{{--    crossorigin="anonymous"--}}
{{--></script>--}}

<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/rowreorder/1.2.8/js/dataTables.rowReorder.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>


<script>
    $(document).ready(function () {
        // $('#example').DataTable();

        var table = $('#datatablesSimple').DataTable({
            rowReorder: {
                selector: 'td:nth-child(2)'
            },
            responsive: true
        });
    });
</script>


{{--<script src="{{ asset('js/datatables/datatables-simple-demo.js') }}"></script>--}}







<script
    src="https://cdn.jsdelivr.net/npm/litepicker/dist/bundle.js"
    crossorigin="anonymous"
></script>
<script src="{{ asset('js/litepicker.js') }}"></script>
</body>
</html>
