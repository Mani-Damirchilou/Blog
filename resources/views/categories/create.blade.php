@extends('layouts.panel')
@section('header')
    <span class="fs-6">دسته بندی ها > جدید</span>
    <a href="{{route('categories.index')}}" class="link-dark" data-bs-toggle="tooltip" data-bs-title="بازگشت">
        <i class="bi bi-arrow-left"></i>
    </a>
@endsection
@section('content')
    <form class="card" method="POST" action="{{route('categories.store')}}">
        @csrf
        <div class="card-header fs-4">
            دسته بندی جدید
        </div>
        <div class="card-body row g-2">
           <div class="col-sm-6">
               <input type="text" name="name" placeholder="نام ..." value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror">
               @error('name')
               <div class="invalid-feedback ">
                   {{$message}}
               </div>
               @enderror
           </div>
            <div class="col-sm-6">
                <input type="text" name="slug"  placeholder="سریال ..." value="{{old('slug')}}" class="form-control @error('slug') is-invalid @enderror">
                @error('slug')
                <div class="invalid-feedback ">
                    {{$message}}
                </div>
                @enderror
            </div>
        </div>
        <div class="card-footer">
            <button class="btn btn-success">ثبت</button>
        </div>
    </form>
@endsection
