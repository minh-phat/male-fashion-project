<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Add new Admin</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('img/logoWebsite.ico') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{ asset('vendor/fonts/boxicons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('vendor/css/theme-default.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('vendor/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/css/perfect-scrollbar.css') }}" />

    <link rel="stylesheet" href="{{ asset('vendor/css/apex-charts.css') }}" />

    <!-- Kit code for icons -->
    <script src="https://kit.fontawesome.com/1c6258baf1.js" crossorigin="anonymous"></script>

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{ asset('vendor/js/helpers.js') }}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('vendor/js/config.js') }}"></script>
    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ asset('vendor/js/jquery.js') }}"></script>
    <script src="{{ asset('vendor/js/popper.js') }}"></script>
    <script src="{{ asset('vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('vendor/js/perfect-scrollbar.js') }}"></script>

    <script src="{{ asset('vendor/js/menu.js') }}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('vendor/js/apexcharts.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('vendor/js/main.js') }}"></script>

    <!-- Page JS -->
    <script src="{{ asset('vendor/js/dashboards-analytics.js') }}"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->

            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="app-brand demo">
                    <a href="" class="app-brand-link">
                        <!--! Input link here -->
                        <span class="app-brand-text menu-text fw-bolder ms-2"><img
                                src="{{ asset('img/android-icon-36x36.png') }}"></span>
                        <span class="app-brand-text menu-text fw-bolder ms-2">MF Manager</span>
                    </a>

                    <a href="javascript:void(0);"
                        class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                        <i class="bx bx-chevron-left bx-sm align-middle"></i>
                    </a>
                </div>

                <div class="app-brand-1 demo-1">
                    @if (Session()->has('LoginID'))
                        <div class="welcome"
                            style="magin-top: 12px; background-color: white; color:rgb(35, 179, 90); display:inline-block">
                            <p style="margin-right: 1px"><i class="fas fa-user-tie"></i> | <?php echo session()->get('Name'); ?></p>
                            {{-- username --}}
                        </div>
                        <a style="margin-left: 10px;" class="nav-icon position-relative text-decoration-none"
                            href="{{ url('adminLogOut') }}">
                            <i class="fas fa-sign-out-alt fa-lg"></i>
                        </a>
                    @else
                        <a class="nav-icon position-relative text-decoration-none" href="{{ url('loginAdmin') }}">
                            <i class="fa fa-fw fa-user text-dark mr-3"></i>| Login
                        </a>
                    @endif
                </div>

                <div class="menu-inner-shadow"></div>

                <ul class="menu-inner py-1">
                    <!-- Dashboard -->
                    <li class="menu-item">
                        <a href="{{ url('dashboard') }}" class="menu-link">
                            <i class="menu-icon tf-icons fa-solid fa-house"></i>
                            <div data-i18n="Dashboard">Dashboard</div>
                        </a>
                    </li>

                    <!-- Accounts -->
                    <li class="menu-header small text-uppercase">
                        <span class="menu-header-text">Accounts</span>
                    </li>
                    {{-- Admins --}}
                    <li class="menu-item">
                        <a href="{{ url('listAdmin') }}" class="menu-link">
                            <i class="menu-icon tf-icons fa-solid fa-user"></i>
                            <div data-i18n="Admins">Admins</div>
                        </a>
                    </li>
                    {{-- Customers --}}
                    <li class="menu-item">
                        <a href="{{ url('listCustomer') }}" class="menu-link">
                            <i class="menu-icon tf-icons fa-solid fa-people-group"></i>
                            <div data-i18n="Customers">Customers</div>
                        </a>
                    </li>

                    <!-- Products -->
                    <li class="menu-header small text-uppercase">
                        <span class="menu-header-text">Products</span>
                    </li>
                    <!-- Categories -->
                    <li class="menu-item">
                        <a href="{{ url('listCategory') }}" class="menu-link">
                            <i class="menu-icon tf-icons fa-solid fa-arrow-down-short-wide"></i>
                            <div data-i18n="Categories">Categories</div>
                        </a>
                    </li>
                    <!-- Products -->
                    <li class="menu-item">
                        <a href="{{ url('listProduct') }}" class="menu-link">
                            <i class="menu-icon tf-icons fa-solid fa-shirt"></i>
                            <div data-i18n="Products">Products</div>
                        </a>
                    </li>
                </ul>
            </aside>
            <!-- / Menu -->
            <div class="layout-page">
                <div class="container" style="margin-top: 20px;">
                    <div class="row">
                        <div class="col-md-4 col-md-offset-4" style="margin-top: 20px">
                            <h2>Login</h2>
                            <hr>
                            {{-- check for session message --}}
                            @if (Session::has('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ Session::get('success') }}
                                </div>
                            @else
                                @if (Session::has('fail'))
                                    <div class="alert alert-danger" role="alert">
                                        {{ Session::get('fail') }}
                                    </div>
                                @endif
                            @endif
                            {{-- end of session message --}}
        
                            {{-- admin signin form --}}
                            <form action="{{ url('adminSignIn') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="username">Admin username</label>
                                    <input type="text" class="form-control" placeholder="Enter admin username"
                                        name="username" value="{{ old('username') }}">
                                </div>
                                @error('username')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
        
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" placeholder="Enter password" name="password"
                                        value="{{ old('password') }}">
                                </div>
                                @error('password')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <button class="btn btn-block btn-primary" type="submit"
                                    style="margin-top: 10px">Login</button>
                            </form>
                            {{-- end of admin sign in form --}}
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>

</html>
