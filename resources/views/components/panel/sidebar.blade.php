<div class="offcanvas-lg offcanvas-end" id="sidebar">
    <div class="offcanvas-header border-bottom">
        <button class="btn-close me-auto ms-0" data-bs-dismiss="offcanvas" data-bs-target="#sidebar"></button>
    </div>
    <div class="offcanvas-body h-100 p-0">
        <div class="card-header border-0 h-100 border-start rounded-0 d-flex flex-column gap-3 text-nowrap overflow-auto">
            @can('مشاهده داشبرد')
                <a href="{{route('panel.index')}}" class="btn btn-lg {{Route::is('panel.index') ? 'btn-primary' : ''}}">
                    <i class="bi bi-speedometer2"></i>
                    داشبرد
                </a>
            @endcan
                @can('مشاهده لیست مقالات')
                    <x-panel.sidebar.articles-button/>
                @endcan
                @can('مشاهده لیست نظرات')
                    <x-panel.sidebar.comments-button/>
                @endcan
                @can('مشاهده لیست دسته بندی ها')
                    <x-panel.sidebar.categories-button/>
                @endcan
                @can('مشاهده لیست برچسب ها')
                    <x-panel.sidebar.tags-button/>
                @endcan
                @can('مشاهده لیست کاربران')
                    <x-panel.sidebar.users-button/>
                @endcan
                @can('مشاهده لیست نقش ها')
                    <x-panel.sidebar.roles-button/>
                @endcan
                <hr class="m-0">
                <a href="{{route('index')}}" class="btn btn-lg btn-outline-danger">
                    <i class="bi bi-arrow-right"></i>
                    خروج از پنل
                </a>
        </div>
    </div>
</div>
