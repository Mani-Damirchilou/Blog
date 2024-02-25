<a class="btn btn-lg @if(\Illuminate\Support\Facades\Route::is('tags.index','tags.edit','tags.create')) me-2 link-primary @endif" href="{{route('tags.index')}}">
    <i class="bi bi-tag"></i>
    برچسب ها
    <span class="badge text-bg-danger">
        {{$tags}}
    </span>
</a>
