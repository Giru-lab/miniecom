<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- External Files Linking -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous" />

    <!-- Internal Files Linking -->
    <link rel="stylesheet" href="{{ asset('theme_asset/dash/css/dashboard.css') }}" />
    <style>
        .btn-custom {
            background-color: white;
            border: 1px solid black;
            padding: 10px 15px;
            border-radius: 8px;
            color: black;
            font-weight: bold;
            transition: background 0.3s, color 0.3s;
        }

        .btn-custom:hover {
            background-color: #f0f0f0;
        }

        .btn-warning-custom {
            background-color: #ffc107;
            border: none;
            padding: 10px 15px;
            border-radius: 8px;
            color: black;
            font-weight: bold;
            transition: background 0.3s;
        }

        .btn-warning-custom:hover {
            background-color: #e0a800;
        }

        .hover:hover {
            background-color: transparent !important;
        }
    </style>
    <title>{{ $title ?? 'VetCore Plus' }}</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script defer src="{{ asset('js/myscript.js') }}"> </script>
    <script>
    </script>
    @livewireStyles
</head>

<body>
    <div class="wrapper-parent">
        <!-- Sidebar menu  -->
        <div id="menu" class="menu-wrap hide">
            <!-- Logo -->
            <div>
                <a class="site-name" href="{{ route('admin.dashboard') }}">
                    <div class="logo">
                        <img src="{{ asset('theme_asset/dash/img/logoss.png') }}" alt="" />
                    </div>
                </a>
            </div>

            <!-- Navlist -->
            <ul class="insideScroll text-white mt-2">
                <li class="hover">
                    <form action="{{ route('admin.dashboard') }}" method="GET">
                        <button type="submit" class="btn-custom w-100">
                            <i class="fas fa-house-damage"></i> Overview
                        </button>
                    </form>
                </li>

                <li class="hover">
                    <form action="{{ route('admin.categories') }}" method="GET">
                        <button type="submit" class="btn-custom w-100">
                            <i class="fa-solid fa-list-ul"></i> Categories
                        </button>
                    </form>
                </li>

                <li class="hover">
                    <button class="btn-custom w-100" id="productToggle">
                        <i class="fa-solid fa-box"></i> Product
                    </button>
                    <ul id="productDropdown" class="collapse list-unstyled ms-3">
                        <li>
                            <form action="{{ route('admin.add-product') }}" method="GET">
                                <button type="submit" class="btn-custom w-100">
                                    <i class="fa-solid fa-plus"></i> Add Product
                                </button>
                            </form>
                        </li>
                        <li>
                            <form action="{{ route('admin.products') }}" method="GET">
                                <button type="submit" class="btn-custom w-100">
                                    <i class="fa-solid fa-box"></i> Manage Products
                                </button>
                            </form>
                        </li>
                    </ul>
                </li>

                <li class="hover">
                    <form action="{{ route('admin.orders') }}" method="GET">
                        <button type="submit" class="btn-custom w-100">
                            <i class="fa-solid fa-cart-shopping"></i> Order History
                        </button>
                    </form>
                </li>

                <li class="hover">
                    <form action="{{ route('logout') }}" method="POST" id="logoutForm">
                        @csrf
                        <button type="button" class="btn-warning-custom w-100" id="logoutButton">
                            <i class="fa-solid fa-arrow-right-from-bracket"></i> Logout
                        </button>
                    </form>
                </li>
            </ul>
        </div>

        <!-- Responsive Overlay -->
        <div class="responsive-overlay"></div>

        <!-- Main Content Div -->
        <div class="content-wrap">
            <!-- top row -->
            <div class="top-bar sticky-top">
                <div class="container-fluid">
                    <div class="row px-3">
                        <div class="col-12 bg">
                            <div class="row">
                                <div class="col-2">
                                    <!-- Hamburger icon -->
                                    <div id="hideshow" href="#!" class="menu-toggle-btn">
                                        <span class="w-75"></span>
                                        <span class="w-50"></span>
                                        <span></span>
                                    </div>
                                </div>
                                <!-- top row cta -->
                                <div class="col-10 d-flex justify-content-end align-items-center">
                                    <div class="dropdown-center no-icon-dropdown">
                                        <a href="">
                                            <i class='bx bxl-telegram'></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Dashboard main content section -->
            <div class="main-content">
                <div class="container-fluid">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>

    <!-- External JS Linking -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">

   
    </script>
    

    <!-- Internal JS Linking -->
    <script src="{{ asset('theme_asset/dash/js/dash.js') }}"></script>
    @livewireScripts
</body>

</html>
