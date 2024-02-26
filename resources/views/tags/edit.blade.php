@extends('layouts.panel')
@section('subtitle','برچسب ها > ویرایش')
@section('header')
    <span class="fs-6">برچسب ها > ویرایش</span>
    @can('مشاهده لیست برچسب ها')
    <a href="{{route('tags.index')}}" class="btn" data-bs-toggle="tooltip" data-bs-title="بازگشت">
        <i class="bi bi-arrow-left"></i>
    </a>
    @endcan
@endsection
@section('content')
    <form class="card" method="POST" action="{{route('tags.update',$tag->id)}}">
        @csrf
        <div class="card-header fs-4">
            ویرایش برچسب
        </div>
        <div class="card-body row g-2">
            <div class="col-sm-6">
                <input type="text" name="name" placeholder="نام ..." value="{{old('name',$tag->name)}}" class="form-control @error('name') is-invalid @enderror">
                @error('name')
                <div class="invalid-feedback ">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="col-sm-6">
                <input type="text" name="slug" placeholder="سریال ..." value="{{old('slug',$tag->slug)}}" class="form-control @error('slug') is-invalid @enderror">
                @error('slug')
                <div class="invalid-feedback ">
                    {{$message}}
                </div>
                @enderror
            </div>
        </div>
        <div class="card-footer">
            <button class="btn btn-primary">ویرایش</button>
        </div>
    </form>
@endsection
