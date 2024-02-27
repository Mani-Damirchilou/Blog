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
                    @if(!is_null($article->category))
                        <a href="{{route('categories.articles',$article->category->slug)}}" class="btn btn-sm">{{$article->category->name}}</a>
                    @endif
                </div>
                <div class="d-flex gap-3 align-items-center">
                    <a href="{{route('dislikes.store',['article',$article->slug])}}" class="btn btn{{!$isDisLiked ? '-outline' : ''}}-danger @guest disabled @endguest">
                        <i class="bi bi-hand-thumbs-down{{$isDisLiked ? '-fill' : ''}}"></i>
                        {{$article->getDisLikesCount()}}
                    </a>
                    <a href="{{route('likes.store',['article',$article->slug])}}" class="btn btn{{!$isLiked ? '-outline' : ''}}-success @guest disabled @endguest">
                        <i class="bi bi-hand-thumbs-up{{$isLiked ? '-fill' : ''}}"></i>
                        {{$article->getLikesCount()}}
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
    @if(!is_null($article->category))
        <x-main.articles.related-articles :article="$article"/>
    @endif
    <x-main.articles.comments-section :article="$article"/>
@endsection
