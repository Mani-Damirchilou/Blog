@extends('layouts.main')
@section('subtitle')
    ویرایش اطلاعات کاربری
@endsection
@section('content')
    <div class="card">
        <div class="card-header fs-4">
            ویرایش اطلاعات کاربری
        </div>
        <div class="card-body d-flex flex-column gap-4 align-items-center">
            <img src="{{auth()->user()->profile}}" class="border border-2 rounded-circle" style="width: 250px;height: 250px" alt="">
            <form action="{{route('profile.update')}}" method="POST" class="card" enctype="multipart/form-data">
                @csrf
                <div class="card-header">
                    <input type="file" name="profile" id="" class="form-control @error('profile') is-invalid @enderror">
                    @error('profile')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="card-body d-flex flex-column gap-2">

                    <input placeholder="نام کاربری ..." type="text" name="name" value="{{old('name',auth()->user()->name)}}" class="form-control @error('name') is-invalid @enderror">
                    @error('name')
                    <div class="invalid-feedback m-0">
                        {{$message}}
                    </div>
                    @enderror

                    <input placeholder="ایمیل ..." type="email" name="email" value="{{old('email',auth()->user()->email)}}" class="form-control @error('email') is-invalid @enderror">
                    @error('email')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror

                    <input placeholder="رمز عبور" type="password" name="password" value="{{old('password')}}" class="form-control @error('password') is-invalid @enderror">
                    @error('password')
                    <div class="invalid-feedback m-0">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="card-footer text-center">
                    <button class="btn btn-primary">
                        ویرایش
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
