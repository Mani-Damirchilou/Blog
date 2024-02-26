@extends('layouts.main')
@section('subtitle',$article->title)
@section('content')
    <div class="card">
        <div class="card-header">
            <img src="{{$article->thumbnail}}" alt="{{$article->title}}" class="card-img-top">
        </div>
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex gap-2 align-items-center">
                    <h1>{{$article->title}}</h1>
                    <a href="{{route('categories.articles',$article->category->slug)}}" class="btn btn-sm">{{$article->category->name}}</a>
                </div>
                <div class="d-flex gap-3 align-items-center">
                    <a href="" class="btn btn-outline-danger">
                        <i class="bi bi-hand-thumbs-down"></i>
                        {{$article->likes()->where('vote',-1)->count()}}
                    </a>
                    <a href="" class="btn btn-success">
                        <i class="bi bi-hand-thumbs-up-fill"></i>
                        {{$article->likes()->where('vote',1)->count()}}
                    </a>
                    <span class="btn btn-primary disabled">
                        <i class="bi bi-eye"></i>
                        -
                    </span>
                </div>
            </div>
            <hr>
            {{$article->content}}
            <hr>
            <div class="d-flex flex-column align-items-center gap-4">
                برچسب ها :
                @if(!$article->tags->isEmpty())
                    <div class="d-flex gap-1">
                        @foreach($article->tags as $tag)
                            <button class="btn btn-primary">
                                {{$tag->name}}
                            </button>
                        @endforeach
                    </div>
                @else
                    این مقاله هیچ برچسبی ندارد !
                @endif
            </div>
        </div>
        <div class="card-footer text-center">
            نوشته شده در
            <span class="fw-bold">
            {{$article->created_at_to_persian}}
            </span>
            توسط
            <span class="fw-bold">
            {{$article->user->name}}
            </span>
        </div>
    </div>
    <div class="card">
        <div class="card-header fs-4">
            مقالات مرتبط
        </div>
        <div class="card-body row g-4">
            @foreach($article->category->articles()->take(4)->get() as $article)
                <x-main.article-box :article="$article"/>
            @endforeach
        </div>
    </div>
    <div class="card">
        <div class="card-header fs-4">
            نظرات
            ({{$article->comments()->count()}})
        </div>
        <div class="card-body">

        </div>
    </div>
@endsection
