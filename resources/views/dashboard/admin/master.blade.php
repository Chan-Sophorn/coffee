<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>@yield('title')</title>

    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />

    <script src="https://kit.fontawesome.com/ac9ef71407.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    @stack('css')

</head>

<body>
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-primary text-white">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="">Coffee System</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars text-white"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0 text-white">
            {{-- <div class="input-group text-white">
            <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
            <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
        </div> --}}
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white" id="navbarDropdown" href="#" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw text-white"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li>
                        <div class="m-1">Login By :</div>
                        <div class="nav-item dropdown text-bold text-danger text-center">
                            {{ Auth::user()->name }}
                        </div>
                    </li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark bg-primary " id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <a class="nav-link text-white" href="#">
                            <div class="sb-nav-link-icon text-white"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading text-white">Activity</div>

                        <a class="nav-link collapsed text-white" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapsePagesProduct" aria-expanded="false"
                            aria-controls="collapsePagesProduct">
                            <div class="sb-nav-link-icon text-white"><i class="fas fa-shopping-cart text-white"></i>
                            </div>
                            Product Sell
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down text-white"></i></div>
                        </a>
                        <div class="collapse" id="collapsePagesProduct" aria-labelledby="headingTwo"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion text-white" id="sidenavProduct">
                                <a class="nav-link collapsed text-white" href="#" data-bs-toggle="collapse"
                                    data-bs-target="#collapseProduct" aria-expanded="false"
                                    aria-controls="collapseProduct">
                                    Product List
                                    <div class="sb-sidenav-collapse-arrow text-white"><i class="fas fa-angle-down"></i>
                                    </div>
                                </a>
                                <div class="collapse" id="collapseProduct" aria-labelledby="headingOne"
                                    data-bs-parent="#sidenavProduct">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link text-white" href="{{ route('admin.read') }}">Cup Size</a>
                                        <a class="nav-link text-white" href="{{ route('admin.readcoftype') }}">Coffee
                                            Type</a>
                                        <a class="nav-link text-white" href="{{ route('admin.coffeename.index') }}">Coffee
                                            Name</a>
                                    </nav>
                                </div>
                            </nav>
                            <nav class="sb-sidenav-menu-nested nav accordion text-white" id="sidenavAccordionPages">
                                <a class="nav-link collapsed text-white" href="#" data-bs-toggle="collapse"
                                    data-bs-target="#pagesCollapseAuth" aria-expanded="false"
                                    aria-controls="pagesCollapseAuth">
                                    Add Product
                                    <div class="sb-sidenav-collapse-arrow text-white"><i class="fas fa-angle-down"></i>
                                    </div>
                                </a>
                                <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne"
                                    data-bs-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link text-white" href="{{ route('admin.cup') }}">Cup Size</a>
                                        <a class="nav-link text-white" href="{{ route('admin.coffeetype') }}">Coffee
                                            Type</a>
                                        <a class="nav-link text-white" href="{{ route('admin.coffeename.create') }}">Coffee
                                            Name</a>
                                    </nav>
                                </div>
                            </nav>
                        </div>
                        <a class="nav-link collapsed text-white" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon text-white"><i class="fas fa-columns text-white"></i></div>
                            Layouts
                            <div class="sb-sidenav-collapse-arrow text-white"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse text-white" id="collapseLayouts" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link text-white" href="">Inventory</a>
                                <a class="nav-link text-white" href="">Purchase Order</a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed text-white" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon text-white"><i class="fas fa-book-open text-white"></i></div>
                            Permission
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down text-white"></i></div>
                        </a>
                        <div class="collapse" id="collapsePages" aria-labelledby="headingTwo"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion text-white" id="sidenavAccordionPages">
                                <a class="nav-link collapsed text-white" href="#" data-bs-toggle="collapse"
                                    data-bs-target="#pagesCollapseAuth" aria-expanded="false"
                                    aria-controls="pagesCollapseAuth">
                                    Authentication
                                    <div class="sb-sidenav-collapse-arrow text-white"><i class="fas fa-angle-down"></i>
                                    </div>
                                </a>
                                <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne"
                                    data-bs-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link text-white" href="{{ route('admin.register') }}">Register
                                            User Admin</a>
                                        <a class="nav-link text-white" href="{{ route('user.register') }}">Register
                                            User Staff</a>
                                        {{-- <a class="nav-link text-white" href="{{ route('password.request') }}">Forget
                                            Password</a> --}}
                                    </nav>
                                </div>
                            </nav>
                        </div>
                        <div class="sb-sidenav-menu-heading">Addons</div>
                        <a class="nav-link" href="">
                            <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                            Charts
                        </a>
                        <a class="nav-link" href="">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Tables
                        </a>
                    </div>
                </div>

            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                @yield('content')
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Coffee System 2021</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="{{ asset('js/datatables-simple-demo.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>

    <script src="https://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    {!! Toastr::message() !!}

    <script>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                toastr.error('{{ $error }}','Error',{
                closeButton:true,
                progressBar:true,
                });
            @endforeach
        
        @endif
    </script>
    @stack('js')
</body>

</html>
