<nav class="navbar navbar-expand-sm ">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <span class="navbar-brand">پنل مدیریت وبلاگ</span>

            <ul class="navbar-nav my-sm-0 my-2">
                <li class="nav-item">
                    <button class="btn d-lg-none btn-primary" data-bs-target="#sidebar" data-bs-toggle="offcanvas"><i class="bi bi-list"></i></button>
                </li>
            </ul>

            <div class="dropdown me-auto">
                <button class="btn dropdown-toggle d-flex gap-2 align-items-center" data-bs-toggle="dropdown">
                    <img src="{{auth()->user()->profile}}" class="rounded-circle border border-2 " style="width: 25px;height: 25px" alt="">
                    {{auth()->user()->name}}
                </button>
                <ul class="dropdown-menu dropdown-center text-end">

                    <a href="{{route('dark-mode.update')}}" class="dropdown-item form-check form-switch d-flex align-items-center gap-2 justify-content-center">
                        <i class="bi bi-moon"></i>
                        <input type="checkbox" disabled {{auth()->user()->dark_mode ? 'checked' : ''}} class="form-check-input m-0">
                        <i class="bi bi-sun"></i>
                    </a>
                    <hr class="dropdown-divider">
                    <a href="{{route('logout')}}" class="dropdown-item link-danger">
                        <i class="bi bi-power"></i>
                        خروج از حساب
                    </a>

                </ul>
            </div>


        </div>
    </div>
</nav>
