<a class="btn btn-lg @if(\Illuminate\Support\Facades\Route::is('roles.index','roles.edit','roles.create')) btn-primary @endif" href="{{route('roles.index')}}">
    <i class="bi bi-person-vcard"></i>
    نقش ها
    <span class="badge text-bg-danger">
        {{$roles}}
    </span>
</a>
