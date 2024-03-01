@extends('layouts.panel')
@section('subtitle','مقالات > جدید')
@section('header')
    <span class="fs-6">مقالات > جدید</span>
    @can('مشاهده لیست مقالات')
        <a href="{{route('articles.index')}}" class="btn" data-bs-toggle="tooltip" data-bs-title="بازگشت">
            <i class="bi bi-arrow-left"></i>
        </a>
    @endcan
@endsection
@section('card-header','مقاله جدید')
@section('card-body')
    <form class="d-flex flex-column gap-4" method="POST" action="{{route('articles.store')}}" enctype="multipart/form-data" id="create">
        @csrf
            <div>
                <input type="text" name="title" placeholder="عنوان ..." value="{{old('title')}}" class="form-control @error('title') is-invalid @enderror">
                @error('title')
                <div class="invalid-feedback ">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div>
                <select name="category_id" class="form-select @error('category_id') is-invalid @enderror">
                    <option value="" selected>بدون دسته بندی</option>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
                @error('category_id')
                <div class="invalid-feedback ">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div>
                <textarea name="content" class="form-control @error('content') is-invalid @enderror" placeholder="محتوا ..." cols="30" rows="10">{{old('content')}}</textarea>
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
                 <span class="badge text-bg-success">قابل مشاهده</span>
                <input type="checkbox" name="active" class="form-check-input m-0">
                <span class="badge text-bg-danger">غیر قابل مشاهده</span>
            </div>


                <div class="card">
                    <div class="card-header">
                        برچسب ها
                    </div>
                    <ul class="list-group list-group-flush p-0">
                    @if($tags->isEmpty())
                        <li class="list-group-item">
                            هیچ برچسبی وجود ندارد
                        </li>
                    @else
                        @foreach($tags as $tag)
                            <li class="list-group-item ">
                                <input type="checkbox" name="tags[]" value="{{$tag->id}}" id="{{$tag->name}}" class="form-check-input">
                                <label for="{{$tag->name}}">{{$tag->name}}</label>
                            </li>
                        @endforeach

                    @endif
                    </ul>
                </div>


    </form>
@endsection
@section('card-footer')
    <button form="create" class="btn btn-success">ثبت</button>
@endsection
