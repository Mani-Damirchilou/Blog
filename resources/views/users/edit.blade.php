@extends('layouts.panel')
@section('header')
    <h4>ویرایش کاربر</h4>
@endsection
@section('content')
    <div class="card">
        <form method="POST" action="{{route('users.update',$user->id)}}" class="card-body d-flex justify-content-center flex-column gap-4" id="update">
            @csrf
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="نام کاربری ..." value="{{old('name',$user->name)}}">
            @error('name')
            <div class="invalid-feedback m-0 text-center">
                {{$message}}
            </div>
            @enderror
            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="ایمیل ..." value="{{old('email',$user->email)}}">
            @error('email')
            <div class="invalid-feedback m-0 text-center">
                {{$message}}
            </div>
            @enderror
        </form>
        <div class="card-footer d-flex justify-content-center">
            <button class="btn btn-primary px-5" form="update">ویرایش</button>
        </div>
    </div>
@endsection
