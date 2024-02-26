<div class="offcanvas-md offcanvas-end" id="sidebar">
    <div class="offcanvas-header border-bottom">
        <button class="btn-close m-0 me-auto" data-bs-dismiss="offcanvas" data-bs-target="#sidebar"></button>
    </div>
    <div class="offcanvas-body">
        <div class="text-break  d-flex flex-column align-items-start ps-md-4 py-md-3 gap-4 overflow-auto text-nowrap" >

            @can('مشاهده داشبرد')
                <a class="btn btn-lg @if(\Illuminate\Support\Facades\Route::is('panel.index')) me-2 link-primary @endif" href="{{route('panel.index')}}">
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
        </div>

    </div>
</div>
