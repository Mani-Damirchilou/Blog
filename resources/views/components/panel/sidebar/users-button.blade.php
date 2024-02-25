<a class="btn btn-lg @if(\Illuminate\Support\Facades\Route::is('users.index','users.edit','users.create')) me-2 link-primary @endif" href="{{route('users.index')}}">
    <i class="bi bi-person"></i>
    کاربران
    <span class="badge text-bg-danger">
        {{$users}}
    </span>
</a>
