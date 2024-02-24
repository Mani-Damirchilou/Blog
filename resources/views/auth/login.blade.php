@extends('layouts.auth')
@section('content')
    <form action="{{route('login')}}" method="POST" class="d-flex flex-column gap-2">
        <div>
            <a href="{{url()->previous()}}" data-bs-toggle="tooltip" data-bs-title="بازگشت" class="fs-5 link-dark"><i class="bi  bi-arrow-right"></i></a>
        </div>
        @csrf
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
        <div class="d-flex gap-2 justify-content-center mt-2">
            <input type="checkbox" name="remember" id="remember" class="form-check-input">
            <label for="remember">مرا به خاطر بسپار</label>
        </div>
        @if(\Illuminate\Support\Facades\Route::has('register'))
            <a href="{{route('register')}}" class="my-2 link-primary text-decoration-none text-center">ثبت نام</a>
        @endif
        <button class="btn btn-primary">ورود</button>
    </form>
@endsection
