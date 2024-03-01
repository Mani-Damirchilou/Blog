<div class="me-auto d-flex gap-2 align-items-center">

<button data-bs-toggle="modal" data-bs-target="#user-notifications" class="btn btn-primary rounded-3 position-relative btn-sm">
    <i class="bi bi-bell"></i>
    @if(!auth()->user()->unreadNotifications->isEmpty())
        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                {{auth()->user()->unreadNotifications->count()}}
                                <span class="visually-hidden">unread messages</span>
                          </span>
    @endif
</button>

<x-user-notifications/>

<div class="dropdown-center ">
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
        @if(!str(request()->route()->getPrefix())->contains('panel'))
            @can('مشاهده داشبرد')
                <li>
                    <a href="{{route('panel.index')}}" class="dropdown-item">
                        <i class="bi bi-kanban"></i>
                        ورود به پنل
                    </a>
                </li>
            @endcan
        @endif
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

</div>
