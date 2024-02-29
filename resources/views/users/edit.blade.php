@extends('layouts.panel')
@section('subtitle','کاربران > ویرایش')
@section('header')
    <span class="fs-6">کاربران > ویرایش</span>
    @can('مشاهده لیست کاربران')
        <a href="{{route('users.index')}}" class="btn" data-bs-toggle="tooltip" data-bs-title="بازگشت">
            <i class="bi bi-arrow-left"></i>
        </a>
    @endcan
@endsection
@section('card-header','ویرایش کاربر')
@section('card-body')
    <form class="row g-2" method="POST" action="{{route('users.update',$user->id)}}" id="update">
        @csrf


            <div class="col-sm-6">
                <input type="text" name="name" placeholder="نام ..." value="{{old('name',$user->name)}}" class="form-control @error('name') is-invalid @enderror">
                @error('name')
                <div class="invalid-feedback ">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="col-sm-6">
                <input type="email" name="email"  placeholder="ایمیل ..." value="{{old('email',$user->email)}}" class="form-control @error('email') is-invalid @enderror">
                @error('email')
                <div class="invalid-feedback ">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="col-12">
                <select name="role" class="form-select @error('role') is-invalid @enderror">
                    <option value="" {{$user->roles->isEmpty() ? 'selected' : ''}}>بدون نقش</option>
                    @foreach($roles as $role)
                        <option value="{{$role->name}}" {{$user->hasRole($role) ? 'selected' : ''}}>{{$role->name}}</option>
                    @endforeach
                </select>
                @error('role')
                <div class="invalid-feedback ">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="col-12 d-flex gap-2">
                <input {{$user->is_banned ? 'checked' : ''}} type="checkbox" name="ban" id="ban" class="form-check-input">
                <label for="ban">مسدود شده</label>
            </div>


    </form>
@endsection
@section('card-footer')
    <button form="update" class="btn btn-primary">ثبت</button>
@endsection



