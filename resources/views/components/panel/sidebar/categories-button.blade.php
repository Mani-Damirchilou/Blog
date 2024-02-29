<a class="btn btn-lg @if(\Illuminate\Support\Facades\Route::is('categories.index','categories.edit','categories.create')) btn-primary @endif" href="{{route('categories.index')}}">
    <i class="bi bi-bookmark"></i>
    دسته بندی ها
    <span class="badge text-bg-danger">
        {{$categories}}
    </span>
</a>
