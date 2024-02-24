@extends('layouts.panel')
@section('header')
    <h4>کاربر جدید</h4>
@endsection
@section('content')
<div class="card">
    <form method="POST" action="{{route('users.store')}}" class="card-body d-flex justify-content-center flex-column gap-4" id="create">
        @csrf
        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="نام کاربری ..." value="{{old('name')}}">
        @error('name')
        <div class="invalid-feedback m-0 text-center">
            {{$message}}
        </div>
        @enderror
        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="ایمیل ..." value="{{old('email')}}">
        @error('email')
        <div class="invalid-feedback m-0 text-center">
            {{$message}}
        </div>
        @enderror
        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="رمز عبور ...">
        @error('password')
        <div class="invalid-feedback m-0 text-center">
            {{$message}}
        </div>
        @enderror
    </form>
    <div class="card-footer d-flex justify-content-center">
        <button class="btn btn-success px-5" form="create">ثبت</button>
    </div>
</div>
@endsection
