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
@section('card-header','ویرایش برچسب')
@section('card-body')
    <form class="row g-2" method="POST" action="{{route('tags.update',$tag->id)}}" id="update">
        @csrf


        <div class="col-sm-6">
            <input type="text" name="name" placeholder="نام ..." value="{{old('name',$tag->name)}}" class="form-control @error('name') is-invalid @enderror">
            @error('name')
            <div class="invalid-feedback ">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="col-sm-6">
            <input type="text" name="slug"  placeholder="سریال ..." value="{{old('slug',$tag->slug)}}" class="form-control @error('slug') is-invalid @enderror">
            @error('slug')
            <div class="invalid-feedback ">
                {{$message}}
            </div>
            @enderror
        </div>

    </form>
@endsection
@section('card-footer')
    <button form="update" class="btn btn-primary">ویرایش</button>
@endsection


