<ul class="nav nav-tabs justify-content-center">
    <li class="nav-item">
        <a class="nav-link @if(\Illuminate\Support\Facades\Route::is('index')) active @endif" aria-current="page" href="{{route('index')}}">همه</a>
    </li>
    @foreach($categories as $category)
        <li class="nav-item">
            <a class="nav-link @if(\Illuminate\Support\Facades\Route::is('categories.articles') && request()->category->id === $category->id) active @endif" aria-current="page" href="{{route('categories.articles',$category->slug)}}">{{$category->name}}</a>
        </li>
    @endforeach
</ul>
