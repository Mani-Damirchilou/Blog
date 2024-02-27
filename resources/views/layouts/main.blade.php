@extends('root')
@section('title')
    وبلاگ -
    @yield('subtitle')
@endsection
@section('body')
<div class="d-flex flex-column gap-4">
    <x-main.navbar/>
    <div class="container d-flex flex-column gap-4">
        @if(\Illuminate\Support\Facades\Route::is('index','categories.articles'))
        <div class="card">
            <div class="card-header">
                <x-main.articles-navigation/>
            </div>
            <div class="card-body row g-4">
                @if(!$articles->isEmpty())
                @foreach($articles as $article)
                        <div class="col-3 d-flex justify-content-center">
                            <x-main.article-box :article="$article"/>
                        </div>
                @endforeach
                @else
                    <div class="col-12 text-center fs-4">
                        هنوز هیچ مقاله ای ثبت نشده است !
                    </div>
                @endif
            </div>
            @if($articles->hasPages())
            <div class="card-footer d-flex justify-content-center" dir="ltr">
                {{$articles->links()}}
            </div>
            @endif
        </div>
        @else
            @yield('content')
        @endif
    </div>
</div>
@endsection
