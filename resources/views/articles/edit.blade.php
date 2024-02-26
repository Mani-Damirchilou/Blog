@extends('layouts.panel')
@section('subtitle','مقالات > ویرایش')
@section('header')
    <span class="fs-6">مقالات > ویرایش</span>
    @can('مشاهده لیست مقالات')
        <a href="{{route('articles.index')}}" class="btn" data-bs-toggle="tooltip" data-bs-title="بازگشت">
            <i class="bi bi-arrow-left"></i>
        </a>
    @endcan
@endsection
@section('content')
    <form class="card" method="POST" action="{{route('articles.update',$article->id)}}" enctype="multipart/form-data">
        @csrf
        <div class="card-header fs-4">
            ویرایش مقاله
        </div>
        <div class="card-body row g-2">
            <div>
                <input type="text" name="title" placeholder="عنوان ..." value="{{old('title',$article->title)}}" class="form-control @error('title') is-invalid @enderror">
                @error('title')
                <div class="invalid-feedback ">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div>
                <select name="category_id" class="form-select @error('category_id') is-invalid @enderror">
                    <option value="">بدون دسته بندی</option>
                    @foreach($categories as $category)
                        <option {{$category->id === $article->category_id ? 'selected' : ''}} value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
                @error('category_id')
                <div class="invalid-feedback ">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div>
                <textarea name="content" class="form-control @error('content') is-invalid @enderror" placeholder="محتوا ..." cols="30" rows="10" value="">{{old('content',$article->content)}}</textarea>
                @error('content')
                <div class="invalid-feedback ">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div>
                <input type="file" name="thumbnail" placeholder="عکس بند انگشتی ..." class="form-control @error('thumbnail') is-invalid @enderror">
                @error('thumbnail')
                <div class="invalid-feedback ">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="d-flex justify-content-center align-items-center gap-3 form-switch">
                <span>قابل مشاهده</span>
                <input {{$article->active ? 'checked' : ''}} type="checkbox" name="active" class="form-check-input m-0">
                <span>غیر قابل مشاهده</span>
            </div>
            <hr>
            برچسب ها :
            @if($tags->isEmpty())
                هیچ برچسبی وجود ندارد
            @else
                @foreach($tags as $tag)
                    <div class="d-flex gap-2">
                        <input
                            {{
                            $article->tags->contains(function ($articleTag) use ($tag){
                                return $articleTag->id === $tag->id;
                            }) ? 'checked' : ''
                             }}
                            type="checkbox" name="tags[]" value="{{$tag->id}}" id="{{$tag->name}}" class="form-check-input">
                        <label for="{{$tag->name}}">{{$tag->name}}</label>
                    </div>
                @endforeach
            @endif
        </div>
        <div class="card-footer">
            <button class="btn btn-success">ثبت</button>
        </div>
    </form>
@endsection
