@extends('layouts.panel')
@section('subtitle','برچسب ها > جدید')
@section('header')
    <span class="fs-6">برچسب ها > جدید</span>
    @can('مشاهده لیست برچسب ها')
        <a href="{{route('tags.index')}}" class="btn" data-bs-toggle="tooltip" data-bs-title="بازگشت">
            <i class="bi bi-arrow-left"></i>
        </a>
    @endcan
@endsection
@section('content')
    <form class="card" method="POST" action="{{route('tags.store')}}">
        @csrf
        <div class="card-header fs-4">
            برچسب جدید
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
