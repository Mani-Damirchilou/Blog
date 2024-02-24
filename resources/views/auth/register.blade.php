@extends('layouts.auth')
@section('content')
    <form action="{{route('register')}}" method="POST" class="d-flex flex-column gap-2">
        <div>
            <a href="{{url()->previous()}}" data-bs-toggle="tooltip" data-bs-title="بازگشت" class="fs-5 link-dark"><i class="bi  bi-arrow-right"></i></a>
        </div>
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
        <input type="password" class="form-control" name="password_confirmation" placeholder="تایید رمز عبور ...">
        @if(\Illuminate\Support\Facades\Route::has('login'))
            <a href="{{route('login')}}" class="my-4 link-primary">ورود به حساب</a>
        @endif
        <button class="btn btn-primary">ثبت نام</button>
    </form>
@endsection
