<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="{{ asset('img/apple-icon.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/logoWebsite.ico') }}">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/templatemo.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;180;300;400;500;700;900&display=swap">

    <link rel="stylesheet" href="{{ asset('css/fontawesome.min.css') }} ">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/slick.min.css') }} ">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/slick-theme.css') }}">

</head>

<body>



    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light shadow">
        <div class="container d-flex justify-content-between align-items-center">
            {{-- Logo --}}
            <a class="navbar-brand text-success logo h2 align-self-center" href="{{ url('/') }}">
                Male Fashion
                <img src="../img/logoWebsite.png" style="width: 40px; height: 40px;" />
            </a>
            {{-- End logo --}}

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
                data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="align-self-center collapse navbar-collapse flex-fill d-lg-flex justify-content-lg-between"
                id="templatemo_main_nav">
                {{-- Navigation buttons --}}
                <div class="flex-fill">
                    <ul class="nav navbar-nav d-flex justify-content-between"
                        style="margin-left: 15%;
                              margin-right: 15%; font-size: 18px">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('about') }}">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('shop') }}">Shop</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('contact') }}">Contact</a>
                        </li>
                    </ul>
                </div>
                {{-- End navigation buttons --}}
                <div class="navbar align-self-center d-flex">
                    {{-- Search button --}}
                    <div class="d-lg-none flex-sm-fill mt-3 mb-4 col-7 col-sm-auto pr-3">
                        <div class="input-group">
                            <input type="text" class="form-control" id="inputMobileSearch" placeholder="Search ...">
                            <div class="input-group-text">
                                <i class="fa fa-fw fa-search"></i>
                            </div>
                        </div>
                    </div>
                    <a class="nav-icon d-none d-lg-inline" href="#" data-bs-toggle="modal"
                        data-bs-target="#templatemo_search">
                        <i class="fa fa-fw fa-search text-dark mr-2" style="font-size: 18px !important"></i>
                    </a>
                    {{-- Cart button --}}
                    @if (Session()->has('customerLoginID'))
                    
                    <a class="nav-icon position-relative text-decoration-none" href="{{ url('cart') }}"
                        style="margin: 0">
                        <i class="fa fa-fw fa-cart-arrow-down text-dark mr-1"></i>
                        @if (!empty(session('cart')))
                            <span
                                class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark"
                                style="position: static !important">{{ count(Session('cart')) }}
                            </span>
                        @else
                            <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill"
                                style="position: static !important;">
                            </span>
                        @endif
                    </a>

                    
                        <div class="btn-group">
                            <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown"
                                aria-expanded="false" style="font-size: 18px;color:rgb(35, 179, 90); padding:0">
                                <i class="fas fa-user"></i> | <?php echo session()->get('customerName'); ?>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="{{ url('customerProfile') }}">
                                        Profile
                                    </a>
                                </li>
                                <li><a class="dropdown-item" href="{{ url('orderCart') }}">
                                    Order cart
                                    </a>
                                </li>
                                <li><a class="dropdown-item" href="{{ url('customerLogOut') }}">
                                        Sign out
                                    </a>
                                </li>
                                
                            </ul>
                        </div>
                    @else
                        <a class="nav-icon position-relative text-decoration-none" href="{{ url('customerLogin') }}">
                            <i class="fa fa-fw fa-user text-dark mr-3"></i>
                        </a>
                    @endif
                </div>
            </div>

        </div>
    </nav>
    <!-- Close Header -->

    <!-- Modal -->
    <div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="w-100 pt-1 mb-5 text-right">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ url('searchShop') }}" method="get" class="modal-content modal-body border-0 p-0">
                <div class="input-group mb-2">
                    <input type="text" class="form-control" id="inputModalSearch" name="search"
                        placeholder="Search ...">
                    <button type="submit" class="input-group-text bg-success text-light">
                        <i class="fa fa-fw fa-search text-white"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>

