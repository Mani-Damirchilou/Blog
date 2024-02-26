<div class="col-sm-6">
    <div class="card">
        <div class="card-header fs-4">
            آخرین نظرات
        </div>
        <div class="card-body table-responsive text-center">
            @if($comments->isEmpty())
                هنوز هیچ نظری ثبت نشده است !
            @else
                <table class="table text-center table-hover">
                    <thead>
                    <tr>
                        <th scope="col">نویسنده</th>
                        <th scope="col">مرتبط با مقاله</th>
                        <th scope="col">متن نظر</th>

                    </tr>
                    </thead>
                    <tbody class="table-group-divider">

                    @foreach($comments as $comment)
                        <tr>
                            <td>{{$comment->user->name}}</td>
                            <td>{{$comment->article->title}}</td>
                            <td>{{$comment->short_text}}</td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>

            @endif

        </div>
    </div>
</div>
