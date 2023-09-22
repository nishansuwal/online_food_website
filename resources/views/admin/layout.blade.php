<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                    <a href="/home"
                        class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                        <span class="fs-5 d-none d-sm-inline">Menu</span>
                    </a>
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start"
                        id="nav_accordion">
                        <li class="nav-item">
                            <a class="nav-link" style="color:aqua" href="#">fooder</a>
                        </li>
                        <li class="nav-item has-submenu">
                            <a class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#submenu2">
                                food
                            </a>
                            <ul class="collapse list-unstyled submenu" id="submenu2" data-bs-parent="#nav_accordion">
                                <li><a class="nav-link" style="color: rgb(232, 238, 232)" href="/admin/food/add">◯
                                        Add</a></li>
                                <li><a class="nav-link" style="color: rgb(240, 245, 240)" href="/admin/food/index">◯
                                        View</a></li>
                            </ul>
                        </li>
                        <li class="nav-item has-submenu">
                            <a class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#submenu1">
                                Issue Book
                            </a>
                            <ul class="collapse list-unstyled submenu" id="submenu1" data-bs-parent="#nav_accordion">
                                <li><a class="nav-link" style="color: rgb(243, 252, 243)" href="/admin/issue/add">◯
                                        Add</a></li>
                                <li><a class="nav-link" style="color: rgb(241, 250, 241)" href="/admin/issue/index">◯
                                        View</a></li>
                            </ul>
                        </li>
                        <li class="nav-item has-submenu">
                            <a class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#submenu3">
                                Student
                            </a>
                            <ul class="collapse list-unstyled submenu" id="submenu3" data-bs-parent="#nav_accordion">
                                <li><a class="nav-link" style="color: rgb(243, 252, 243)" href="/admin/student/add">◯
                                        Add</a></li>
                                <li><a class="nav-link" style="color: rgb(241, 250, 241)" href="/admin/student/index">◯
                                        View</a></li>
                            </ul>
                        </li>
                        {{-- <li class="nav-item has-submenu">
                            <a class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#submenu4">
                                REVIEWS
                            </a>
                            <ul class="collapse list-unstyled submenu" id="submenu4" data-bs-parent="#nav_accordion">
                                <li><a class="nav-link" style="color: rgb(243, 252, 243)" href="/admin/review/add">◯
                                        Add</a></li>
                                <li><a class="nav-link" style="color: rgb(241, 250, 241)" href="/admin/review/index">◯
                                        View</a></li>
                            </ul>
                        </li> --}}
                      
                    </ul>
                </div>
            </div>
            <div class="col py-3">
                <!--Content area...-->
                @yield('main')
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
