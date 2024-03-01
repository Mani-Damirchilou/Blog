@extends('layouts.main')
@section('subtitle',$article->title)
@section('content')

    <div class="card">
        <div class="card-header">
            <img src="{{$article->thumbnail}}" alt="{{$article->title}}" class="card-img-top">
        </div>
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center flex-sm-row flex-column gap-sm-0 gap-4">
                <div class="d-flex gap-2 align-items-center">
                    <h1>{{$article->title}}</h1>
                    @if(!is_null($article->category))
                        <div class="badge text-bg-danger">
                            <a href="{{route('categories.articles',$article->category->slug)}}" class="text-decoration-none link-light">{{$article->category->name}}</a>
                        </div>
                    @endif
                </div>
                <div class="d-flex gap-3 align-items-center">
                    <a data-bs-toggle="tooltip" data-bs-title="نپسندیدن" href="{{route('dislikes.store',['article',$article->slug])}}" class="btn btn{{!$isDisLiked ? '-outline' : ''}}-danger @guest disabled @endguest">
                        <i class="bi bi-hand-thumbs-down{{$isDisLiked ? '-fill' : ''}}"></i>
                        {{$article->getDisLikesCount()}}
                    </a>
                    <a data-bs-toggle="tooltip" data-bs-title="پسندیدن" href="{{route('likes.store',['article',$article->slug])}}" class="btn btn{{!$isLiked ? '-outline' : ''}}-success @guest disabled @endguest">
                        <i class="bi bi-hand-thumbs-up{{$isLiked ? '-fill' : ''}}"></i>
                        {{$article->getLikesCount()}}
                    </a>
                    <span class="btn btn-primary disabled">
                        <i class="bi bi-eye"></i>
                        {{$article->getViewsCount()}}
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
                            <div class="badge text-bg-primary">
                                {{$tag->name}}
                            </div>
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
            @php($classes = ['success','danger','info','primary','warning','secondary'])
            <a data-bs-toggle="tooltip" data-bs-title="مشاهده مقالات" href="{{route('users.articles',$article->user->name)}}" class="badge text-decoration-none text-bg-{{$classes[array_rand($classes)]}}">
            {{$article->user->name}}
            </a>
        </div>
    </div>

    <x-main.articles.related-articles :article="$article"/>
    <x-main.articles.comments-section :article="$article"/>
@endsection
