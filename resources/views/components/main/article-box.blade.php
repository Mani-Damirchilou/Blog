    <div class="card" style="width: 18rem;">
        <img src="{{$article->thumbnail}}" class="card-img-top" style="" alt="{{$article->title}}">
        <div class="card-body">
            <div class="d-flex align-items-center gap-2">
                <h5 class="card-title">{{$article->title}}</h5>
            @if(!is_null($article->category_id))
                    <span class="badge text-bg-warning">
                {{$article->category->name}}
            </span>
            @endif
            </div>
            <hr>
            <div class="d-flex justify-content-center align-items-center gap-2">
                <span class="badge text-bg-success">
                    {{$article->getLikesCount()}}
                    <i class="bi bi-hand-thumbs-up"></i>
                </span>
                <span class="badge text-bg-danger">
                    {{$article->getDisLikesCount()}}
                    <i class="bi bi-hand-thumbs-down"></i>
                </span>
                <span class="badge text-bg-primary">
                    {{$article->getViewsCount()}}
                    <i class="bi bi-eye"></i>
                </span>
            </div>
        </div>
        <div class="card-footer text-center">
            <a href="{{route('articles.show',$article->slug)}}" class="btn btn-primary">ادامه مطلب</a>
        </div>
    </div>
