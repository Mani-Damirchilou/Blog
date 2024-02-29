@extends('layouts.panel')
@section('subtitle','کاربران > جدید')
@section('header')
    <span class="fs-6">کاربران > جدید</span>
    @can('مشاهده لیست کاربران')
        <a href="{{route('users.index')}}" class="btn" data-bs-toggle="tooltip" data-bs-title="بازگشت">
            <i class="bi bi-arrow-left"></i>
        </a>
    @endcan
@endsection
@section('card-header','کاربر جدید')
@section('card-body')
    <form class="row g-2" method="POST" action="{{route('users.store')}}" id="create">
        @csrf


            <div class="col-sm-6">
                <input type="text" name="name" placeholder="نام ..." value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror">
                @error('name')
                <div class="invalid-feedback ">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="col-sm-6">
                <input type="email" name="email"  placeholder="ایمیل ..." value="{{old('email')}}" class="form-control @error('email') is-invalid @enderror">
                @error('email')
                <div class="invalid-feedback ">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="col-sm-6">
                <input type="password" name="password"  placeholder="رمز عبور ..." value="{{old('password')}}" class="form-control @error('password') is-invalid @enderror">
                @error('password')
                <div class="invalid-feedback ">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="col-sm-6">
                <select name="role" class="form-select @error('role') is-invalid @enderror">
                    <option selected value="">بدون نقش</option>
                    @foreach($roles as $role)
                        <option value="{{$role->name}}">{{$role->name}}</option>
                    @endforeach
                </select>
                @error('role')
                <div class="invalid-feedback ">
                    {{$message}}
                </div>
                @enderror
            </div>


    </form>
@endsection
@section('card-footer')
    <button form="create" class="btn btn-success">ثبت</button>
@endsection



