<a class="btn btn-lg @if(request()->routeIs('comments.index')) btn-primary @endif" href="{{route('comments.index')}}">
    <i class="bi bi-pen"></i>
    نظرات
    <span class="badge text-bg-danger">
        {{$comments}}
    </span>
</a>
