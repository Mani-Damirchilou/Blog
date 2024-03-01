<div class="card-header">
    <nav class="navbar navbar-expand-sm">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbar">
                <a class="navbar-brand" href="{{route('index')}}">وبلاگ</a>
                <form action="{{route('articles.search')}}" method="GET" class="d-flex gap-2 mx-auto my-sm-0 my-2">
                    <input type="text" name="q" id="" class="form-control" placeholder="جست و جوی مقالات ...">
                    <button class="btn btn-primary">
                        <i class="bi bi-search"></i>
                    </button>
                </form>
                @auth

                      <x-user-navigation/>


                @endauth
                @guest
                    <div class="d-flex gap-3 me-auto">
                        <a href="{{route('login')}}" class="btn btn-primary">ورود</a>
                        <a href="{{route('register')}}" class="btn btn-primary">ثبت نام</a>
                    </div>
                @endguest
            </div>
        </div>
    </nav>

</div>
