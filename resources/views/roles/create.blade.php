@extends('layouts.panel')
@section('header')
    <span class="fs-6">نقش ها > جدید</span>
    @can('مشاهده لیست نقش ها')
        <a href="{{route('tags.index')}}" class="btn" data-bs-toggle="tooltip" data-bs-title="بازگشت">
            <i class="bi bi-arrow-left"></i>
        </a>
    @endcan
@endsection
@section('content')
    <form class="card" method="POST" action="{{route('roles.store')}}">
        @csrf
        <div class="card-header fs-4">
            نقش جدید
        </div>
        <div class="card-body row g-2">
            <div>
                <input type="text" name="name" placeholder="نام ..." value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror">
                @error('name')
                <div class="invalid-feedback ">
                    {{$message}}
                </div>
                @enderror
            </div>
            <hr>
            دسترسی ها :
            @foreach($permissions as $permission)
                <div class="d-flex gap-2">
                    <input type="checkbox" name="permissions[]" value="{{$permission->name}}" id="{{$permission->name}}" class="form-check-input">
                    <label for="{{$permission->name}}">{{$permission->name}}</label>
                </div>
            @endforeach
        </div>
        <div class="card-footer">
            <button class="btn btn-success">ثبت</button>
        </div>
    </form>
@endsection
