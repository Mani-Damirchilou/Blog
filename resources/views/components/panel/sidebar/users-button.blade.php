<a class="btn btn-lg @if(request()->routeIs('users.index','users.edit','users.create')) btn-primary @endif" href="{{route('users.index')}}">
    <i class="bi bi-person"></i>
    کاربران
    <span class="badge text-bg-danger">
        {{$users}}
    </span>
</a>
