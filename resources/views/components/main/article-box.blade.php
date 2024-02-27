    <div class="card" style="width: 18rem;">
        <img src="{{$article->thumbnail}}" class="card-img-top" style="height: 10rem" alt="{{$article->title}}">
        <div class="card-body">
            <h5 class="card-title">{{$article->title}}</h5>
        </div>
        <div class="card-footer text-center">
            <a href="{{route('articles.show',$article->slug)}}" class="btn btn-primary">ادامه مطلب</a>
        </div>
    </div>
