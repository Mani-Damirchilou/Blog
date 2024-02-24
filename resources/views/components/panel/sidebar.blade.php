<div class="offcanvas-md offcanvas-end" id="sidebar">
    <div class="offcanvas-header border-bottom d-md-none d-flex justify-content-between flex-row-reverse">
        <button class="btn-close m-0" data-bs-dismiss="offcanvas" data-bs-target="#sidebar"></button>
    </div>
    <div class="offcanvas-body h-100">
        <div class=" m-4 rounded-4 d-flex flex-column gap-4 overflow-auto px-4">

            <div class="p-4 bg-light rounded-4 w-100  text-center">
                {{auth()->user()->email}}
            </div>

            <a href="{{route('logout')}}" class="btn btn-danger ">
                <i class="bi bi-power"></i>
                خروج از حساب
            </a>

            <div class="bg-light  py-4 rounded-4 d-flex flex-column gap-4  align-items-center ">
                <div class="d-flex flex-column justify-content-center">
                    <h3>وبلاگ شما</h3>
                    <hr class="my-2">
                </div>
                @can('مشاهده داشبرد')
                <a href="{{route('panel.index')}}" class="text-decoration-none fs-5 @if(\Illuminate\Support\Facades\Route::is('panel.index')) btn btn-primary @else link-dark @endif">
                    <i class="bi bi-speedometer2"></i>
                    داشبرد
                </a>
                @endcan
                @can('مشاهده لیست دسته بندی ها')
                    <a href="{{route('categories.index')}}" class="text-decoration-none fs-5 @if(\Illuminate\Support\Facades\Route::is('categories.index')) btn btn-primary @else link-dark @endif">
                        <i class="bi bi-bookmark"></i>
                        دسته بندی ها
                    </a>
                @endcan
                @can('مشاهده لیست کاربران')
                    <a href="{{route('users.index')}}" class="text-decoration-none fs-5 @if(\Illuminate\Support\Facades\Route::is('users.index','users.create','users.edit')) btn btn-primary @else link-dark @endif">
                        <i class="bi bi-person"></i>
                        کاربر ها
                    </a>
                @endcan
                @can('مشاهده لیست نقش ها')
                    <a href="{{route('roles.index')}}" class="text-decoration-none fs-5 @if(\Illuminate\Support\Facades\Route::is('roles.index','roles.create','roles.edit')) btn btn-primary @else link-dark @endif">
                        <i class="bi bi-person-vcard"></i>
                        نقش ها
                    </a>
                @endcan
            </div>

        </div>

    </div>
</div>
