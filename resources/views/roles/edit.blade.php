@extends('layouts.panel')
@section('subtitle','نقش ها > ویرایش')
@section('header')
    <span class="fs-6">نقش ها > ویرایش</span>
    @can('مشاهده لیست نقش ها')
        <a href="{{route('roles.index')}}" class="btn" data-bs-toggle="tooltip" data-bs-title="بازگشت">
            <i class="bi bi-arrow-left"></i>
        </a>
    @endcan
@endsection
@section('card-header','ویرایش نقش')
@section('card-body')
    <form class="d-flex flex-column gap-2" method="POST" action="{{route('roles.update',$role->id)}}" id="update">
        @csrf

        <div>
            <input type="text" name="name" placeholder="نام ..." value="{{old('name',$role->name)}}" class="form-control @error('name') is-invalid @enderror">
            @error('name')
            <div class="invalid-feedback ">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="card">
            <div class="card-header">
                دسترسی ها
            </div>
            <ul class="list-group list-group-flush p-0">
                @foreach($permissions as $permission)
                    <li class="list-group-item">
                        <input {{$role->hasPermissionTo($permission) ? 'checked' : ''}} type="checkbox" name="permissions[]" value="{{$permission->name}}" id="{{$permission->name}}" class="form-check-input">
                        <label for="{{$permission->name}}">{{$permission->name}}</label>
                    </li>
                @endforeach
            </ul>
        </div>


    </form>

@endsection
@section('card-footer')
    <button form="update" class="btn btn-primary">ویرایش</button>
@endsection

