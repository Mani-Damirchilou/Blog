<nav class="navbar navbar-expand-sm border-bottom">
    <div class="container-fluid">
        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbar">
            <span class="navbar-brand">پنل مدیریت</span>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <button data-bs-target="#sidebar" data-bs-toggle="offcanvas" class="btn btn-sm fs-4 d-md-none"><i class="bi bi-list"></i></button>
                </li>
            </ul>
            <div class="dropdown me-auto">
                <button class="btn dropdown-toggle" data-bs-toggle="dropdown">
                    {{auth()->user()->email}}
                </button>
                <ul class="dropdown-menu dropdown-center text-end">
                    <li>
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
