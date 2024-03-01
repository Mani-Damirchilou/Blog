<a class="btn btn-lg @if(request()->routeIs('roles.index','roles.edit','roles.create')) btn-primary @endif" href="{{route('roles.index')}}">
    <i class="bi bi-person-vcard"></i>
    نقش ها
    <span class="badge text-bg-danger">
        {{$roles}}
    </span>
</a>
