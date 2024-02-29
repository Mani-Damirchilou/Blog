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
@section('content')
    <form class="card" method="POST" action="{{route('users.update',$user->id)}}">
        @csrf
        <div class="card-header fs-4">
            ویرایش کاربر
        </div>
        <div class="card-body row g-2">
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
        </div>
        <div class="card-footer">
            <button class="btn btn-primary">ویرایش</button>
        </div>
    </form>
@endsection
