<div class="card-header">
    <nav class="navbar navbar-expand-sm">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbar">
                <a class="navbar-brand" href="{{route('index')}}">وبلاگ</a>
                <form action="{{route('articles.search')}}" method="GET" class="d-flex gap-2 me-auto my-sm-0 my-2">
                    <input type="text" name="q" id="" class="form-control" placeholder="جست و جوی مقالات ...">
                    <button class="btn btn-primary">
                        <i class="bi bi-search"></i>
                    </button>
                </form>
                @auth
                    <div class="dropdown-center me-auto">
                        <button class="btn dropdown-toggle d-flex gap-2 align-items-center" data-bs-toggle="dropdown">
                            <img src="{{auth()->user()->profile}}" class="rounded-circle border border-2 " style="width: 25px;height: 25px" alt="">
                            {{auth()->user()->name}}
                        </button>
                        <ul class="dropdown-menu text-end dropdown-menu-sm-start dropdown-menu-end">

                            <li>
                                <a href="{{route('dark-mode.update')}}" class="dropdown-item form-check form-switch d-flex align-items-center gap-2 justify-content-center">
                                    <i class="bi bi-moon"></i>
                                    <input type="checkbox" disabled {{auth()->user()->dark_mode ? 'checked' : ''}} class="form-check-input m-0">
                                    <i class="bi bi-sun"></i>
                                </a>
                            </li>
                            <hr class="dropdown-divider">
                            @can('مشاهده داشبرد')
                                <li>
                                    <a href="{{route('panel.index')}}" class="dropdown-item">
                                        <i class="bi bi-kanban"></i>
                                        ورود به پنل
                                    </a>
                                </li>
                            @endcan
                            @if(auth()->user()->email !== 'admin@admin')
                                <li>
                                    <a href="{{route('profile.edit')}}" class="dropdown-item">
                                        <i class="bi bi-person-gear"></i>
                                        ویرایش اطلاعات کاربری
                                    </a>
                                </li>
                            @endif
                            <li>
                                <a href="{{route('logout')}}" class="dropdown-item link-danger">
                                    <i class="bi bi-power"></i>
                                    خروج از حساب
                                </a>
                            </li>

                        </ul>
                    </div>
                @endauth
                @guest
                    <div class="d-flex gap-3 me-auto">
                        <a href="{{route('login')}}" class="btn btn-primary">ورود</a>
                        <a href="{{route('register')}}" class="btn btn-primary">ثبت نام</a>
                    </div>
                @endguest
            </div>
        </div>
    </nav>

</div>
