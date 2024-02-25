<div class="col-sm-6">
    <div class="card">
        <div class="card-header fs-4">
            آخرین مقالات
        </div>
        <div class="card-body table-responsive">
            <table class="table text-center table-hover">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">عنوان</th>
                    <th scope="col">نویسنده</th>
                    <th scope="col">دسته بندی</th>
                    <th scope="col">وضعیت</th>

                </tr>
                </thead>
                <tbody class="table-group-divider">

                @foreach($articles as $article)
                    <tr>
                        <th>{{$article->id}}</th>
                        <td>{{$article->title}}</td>
                        <td>{{$article->user->name}}</td>
                        <td>{{$article->category->name ?? '-'}}</td>
                        <td class="text-{{$article->active ? 'success' : 'danger'}}">{{$article->active ? 'قابل مشاهده' : 'غیرقابل مشاهده'}}</td>
                    </tr>
                @endforeach

                </tbody>
            </table>

        </div>
    </div>
</div>
