@extends('layouts.panel')
@section('header')
    <span class="fs-6">دسته بندی ها > ویرایش</span>
    <a href="{{route('categories.index')}}" class="link-dark" data-bs-toggle="tooltip" data-bs-title="بازگشت">
        <i class="bi bi-arrow-left"></i>
    </a>
@endsection
@section('content')
    <form class="card" method="POST" action="{{route('categories.update',$category->id)}}">
        @csrf
        <div class="card-header fs-4">
            ویرایش دسته بندی
        </div>
        <div class="card-body row g-2">
            <div class="col-sm-6">
                <input type="text" name="name" placeholder="نام ..." value="{{old('name',$category->name)}}" class="form-control @error('name') is-invalid @enderror">
                @error('name')
                <div class="invalid-feedback ">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="col-sm-6">
                <input type="text" name="slug" placeholder="سریال ..." value="{{old('name',$category->slug)}}" class="form-control @error('slug') is-invalid @enderror">
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
