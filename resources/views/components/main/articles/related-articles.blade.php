@if(!$articles->isEmpty())
    <div class="card">
        <div class="card-header fs-4">
            مقالات مرتبط
        </div>
        <div class="card-body row g-4">
            @foreach($articles as $article)
                <div class="col-4 d-flex justify-content-center">
                    <x-main.article-box :article="$article"/>
                </div>
            @endforeach
        </div>
    </div>

@endif
