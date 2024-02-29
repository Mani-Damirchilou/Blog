<div class="card">
    <div class="card-header fs-4">
        نظرات
        ({{$comments->count()}})
    </div>
    <div class="card-body d-flex flex-column gap-4 text-center">
        @if(!$comments->isEmpty())

        @foreach($comments as $comment)
            <div class="card">
                <div class="card-header d-flex justify-content-center align-items-center gap-2">
                    <img src="{{$comment->user->profile}}" style="height: 20px;width: 20px" class="rounded-circle " alt="">
                    {{$comment->user->name}}
                </div>
                <div class="card-body d-flex justify-content-between align-items-center">
                    <span>{{$comment->text}}</span>
                    <div class="d-flex gap-2">
                        <a href="{{route('likes.store',['comment',$comment->id])}}" class="btn text-success @guest disabled @endguest">
                            <i class="bi bi-hand-thumbs-up{{$comment->isLikedByUser() ? '-fill' : ''}}"></i>
                            {{$comment->getLikesCount()}}
                        </a>
                        <a href="{{route('dislikes.store',['comment',$comment->id])}}" class="btn text-danger @guest disabled @endguest">
                            <i class="bi bi-hand-thumbs-down{{$comment->isDisLikedByUser() ? '-fill' : ''}}"></i>
                            {{$comment->getDisLikesCount()}}
                        </a>
                    </div>
                </div>
                <div class="card-footer text-center">
                    نوشته شده در
                    <span class="fw-bold">
                    {{$comment->created_at_to_persian}}
                    </span>
                </div>
            </div>
        @endforeach
        @else
            <span class="fs-5">
            هنوز هیچ نظری ثبت نشده است !
            </span>
        @endif
    </div>
    <div class="card-footer">
        @guest
            <div class="alert alert-warning">
                برای ارسال نظر باید
                <a href="{{route('login')}}" class="text-decoration-none">وارد</a>
                حساب کاربری خود شوید !
            </div>
        @endguest
        @auth
                <form action="{{route('articles.comments.store',$article->slug)}}" class="d-flex gap-2 align-items-center" method="POST">
                    @csrf
                    <div class="d-flex flex-column w-100">
                        <input type="text" name="text" class="form-control @error('text') is-invalid @enderror" placeholder="متن نظر"/>
                        @error('text')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <button class="btn btn-success">
                        <i class="bi bi-send"></i>
                    </button>
                </form>
            @endauth
    </div>
</div>
