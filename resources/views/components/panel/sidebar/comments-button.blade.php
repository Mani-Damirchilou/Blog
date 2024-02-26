<a class="btn btn-lg @if(\Illuminate\Support\Facades\Route::is('comments.index')) me-2 link-primary @endif" href="{{route('comments.index')}}">
    <i class="bi bi-pen"></i>
    نظرات
    <span class="badge text-bg-danger">
        {{$comments}}
    </span>
</a>
