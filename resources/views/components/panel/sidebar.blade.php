<div class="offcanvas-md offcanvas-end" id="sidebar">
    <div class="offcanvas-header border-bottom">
        <button class="btn-close m-0 me-auto" data-bs-dismiss="offcanvas" data-bs-target="#sidebar"></button>
    </div>
    <div class="offcanvas-body">
        <div class="text-break  d-flex flex-column align-items-start ps-md-4 py-md-5 gap-4 overflow-auto text-nowrap" >

            @can('مشاهده داشبرد')
                <a class="btn btn-lg @if(\Illuminate\Support\Facades\Route::is('panel.index')) me-2 link-primary @endif" href="{{route('panel.index')}}">
                    <i class="bi bi-speedometer2"></i>
                    داشبرد
                </a>
            @endcan

            @can('مشاهده لیست دسته بندی ها')
                <a class="btn btn-lg @if(\Illuminate\Support\Facades\Route::is('categories.index','categories.edit','categories.create')) me-2 link-primary @endif" href="{{route('categories.index')}}">
                    <i class="bi bi-bookmark"></i>
                    دسته بندی ها
                </a>
            @endcan

                @can('مشاهده لیست برچسب ها')
                    <a class="btn btn-lg @if(\Illuminate\Support\Facades\Route::is('tags.index','tags.edit','tags.create')) me-2 link-primary @endif" href="{{route('tags.index')}}">
                        <i class="bi bi-tag"></i>
                        برچسب ها
                    </a>
                @endcan

            @can('مشاهده لیست کاربران')
                <a class="btn btn-lg @if(\Illuminate\Support\Facades\Route::is('users.index','users.edit','users.create')) me-2 link-primary @endif" href="{{route('users.index')}}">
                    <i class="bi bi-person"></i>
                    کاربران
                </a>
            @endcan

            @can('مشاهده لیست نقش ها')
                <a class="btn btn-lg @if(\Illuminate\Support\Facades\Route::is('roles.index','roles.edit','roles.create')) me-2 link-primary @endif" href="{{route('roles.index')}}">
                    <i class="bi bi-person-vcard"></i>
                    نقش ها
                </a>
            @endcan
        </div>

    </div>
</div>
