<a class="btn btn-lg @if(\Illuminate\Support\Facades\Route::is('articles.index','articles.edit','articles.create')) btn-primary @endif" href="{{route('articles.index')}}">
    <i class="bi bi-file-earmark-richtext"></i>
    مقالات
    <span class="badge text-bg-danger">
        {{$articles}}
    </span>
</a>
