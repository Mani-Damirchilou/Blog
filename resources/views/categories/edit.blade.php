@extends('layouts.panel')
@section('header')
    <h4>ویرایش دسته بندی</h4>
@endsection
@section('content')
    <div class="card">
        <form method="POST" action="{{route('categories.update',$category->id)}}" class="card-body d-flex justify-content-center flex-column gap-4" id="update">
            @csrf
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="نام ..." value="{{old('name',$category->name)}}">
            @error('name')
            <div class="invalid-feedback m-0 text-center">
                {{$message}}
            </div>
            @enderror
            <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" placeholder="سریال ..." value="{{old('slug',$category->slug)}}">
            @error('slug')
            <div class="invalid-feedback m-0 text-center">
                {{$message}}
            </div>
            @enderror
        </form>
        <div class="card-footer d-flex justify-content-center">
            <button class="btn btn-success px-5" form="update">ویرایش</button>
        </div>
    </div>
@endsection
