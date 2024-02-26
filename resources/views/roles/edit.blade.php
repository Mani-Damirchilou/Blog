@extends('layouts.panel')
@section('header')
    <span class="fs-6">نقش ها > ویرایش</span>
    @can('مشاهده لیست نقش ها')
        <a href="{{route('roles.index')}}" class="btn" data-bs-toggle="tooltip" data-bs-title="بازگشت">
            <i class="bi bi-arrow-left"></i>
        </a>
    @endcan
@endsection
@section('content')
    <form class="card" method="POST" action="{{route('roles.update',$role->id)}}">
        @csrf
        <div class="card-header fs-4">
            ویرایش نقش
        </div>
        <div class="card-body row g-2">
            <div>
                <input type="text" name="name" placeholder="نام ..." value="{{old('name',$role->name)}}" class="form-control @error('name') is-invalid @enderror">
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
                    <input {{$role->hasPermissionTo($permission) ? 'checked' : ''}} type="checkbox" name="permissions[]" value="{{$permission->name}}" id="{{$permission->name}}" class="form-check-input">
                    <label for="{{$permission->name}}">{{$permission->name}}</label>
                </div>
            @endforeach
        </div>
        <div class="card-footer">
            <button class="btn btn-primary">ویرایش</button>
        </div>
    </form>
@endsection
