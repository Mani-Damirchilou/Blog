<a class="btn btn-lg @if(request()->routeIs('tags.index','tags.edit','tags.create')) btn-primary @endif" href="{{route('tags.index')}}">
    <i class="bi bi-tag"></i>
    برچسب ها
    <span class="badge text-bg-danger">
        {{$tags}}
    </span>
</a>
