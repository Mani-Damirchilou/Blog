<nav class="navbar navbar-expand-sm border-bottom">
    <div class="container-fluid">
        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbar">
            <span class="navbar-brand">پنل مدیریت وبلاگ</span>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <button data-bs-target="#sidebar" data-bs-toggle="offcanvas" class="btn btn-sm fs-4 d-md-none"><i class="bi bi-list"></i></button>
                </li>
            </ul>
            <div class="dropdown me-auto">
                <button class="btn dropdown-toggle d-flex gap-2 align-items-center" data-bs-toggle="dropdown">
                    <img src="{{auth()->user()->profile}}" class="rounded-circle border border-2 " style="width: 25px;height: 25px" alt="">
                    {{auth()->user()->email}}
                </button>
                <ul class="dropdown-menu dropdown-center text-end">
                    <li>
                        <a href="{{route('dark-mode.update')}}" class="dropdown-item form-check form-switch d-flex align-items-center gap-2 justify-content-center">
                            <i class="bi bi-moon"></i>
                            <input type="checkbox" disabled {{auth()->user()->dark_mode ? 'checked' : ''}} class="form-check-input m-0">
                            <i class="bi bi-sun"></i>

                        </a>
                        <a href="{{route('logout')}}" class="dropdown-item link-danger">
                            <i class="bi bi-power"></i>
                            خروج از حساب
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
