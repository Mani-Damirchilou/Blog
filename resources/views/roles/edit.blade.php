@extends('layouts.panel')
@section('header')
    <h4>ویرایش نقش</h4>
@endsection
@section('content')
    <div class="card">
        <form method="POST" action="{{route('roles.update',$role->id)}}" class="card-body d-flex justify-content-center flex-column gap-4" id="update">
            @csrf
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="نام نقش ..." value="{{old('name',$role->name)}}">
            @error('name')
            <div class="invalid-feedback m-0 text-center">
                {{$message}}
            </div>
            @enderror
            <div class="row">
                @foreach($permissions as $permission)
                    <div class="col-6 text-center">
                        <input type="checkbox" {{$role->hasPermissionTo($permission) ? 'checked' : ''}} value="{{$permission->name}}" name="permissions[]" id="{{$permission->name}}" class="form-check-input">
                        <label for="{{$permission->name}}">{{$permission->name}}</label>
                    </div>
                @endforeach
            </div>
        </form>
        <div class="card-footer d-flex justify-content-center">
            <button class="btn btn-primary px-5" form="update">ویرایش</button>
        </div>
    </div>
@endsection
