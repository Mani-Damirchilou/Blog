@extends('root')
@section('title','پنل مدیریت')
@section('body')
<div class="d-flex bg-dark-subtle overflow-hidden" style="height: 100vh">
    <div class=" m-4 rounded-4 d-flex flex-column gap-4">

        <div class="p-4 bg-light rounded-4 w-100 shadow-lg text-center">
            {{auth()->user()->email}}
        </div>

        <a href="{{route('logout')}}" class="btn btn-danger rounded-4">
            <i class="bi bi-power"></i>
            خروج از حساب
        </a>

        <div class="bg-light px-2 py-4 rounded-4 d-flex flex-column gap-4  align-items-center">
            <div class="d-flex flex-column justify-content-center">
                <h4>وبلاگ شما</h4>
                <hr class="my-2">
            </div>

            <a href="{{route('panel.index')}}" class="text-decoration-none fs-5 @if(\Illuminate\Support\Facades\Route::is('panel.index')) btn btn-primary @else link-dark @endif">
                <i class="bi bi-speedometer2"></i>
                داشبرد
            </a>

            @can('مشاهده لیست کاربران')
            <a href="{{route('users.index')}}" class="text-decoration-none fs-5 @if(\Illuminate\Support\Facades\Route::is('users.index','users.create','users.edit')) btn btn-primary @else link-dark @endif">
                <i class="bi bi-person"></i>
                کاربر ها
            </a>
            @endcan
            @can('مشاهده لیست نقش ها')
            <a href="{{route('roles.index')}}" class="text-decoration-none fs-5 @if(\Illuminate\Support\Facades\Route::is('roles.index','roles.create','roles.edit')) btn btn-primary @else link-dark @endif">
                <i class="bi bi-person-vcard"></i>
                نقش ها
            </a>
            @endcan
        </div>

    </div>
    <div class="bg-light shadow-lg rounded-4 p-4 m-4 w-100 overflow- d-flex flex-column gap-4" >
        <div>
            <div class="d-flex justify-content-between align-items-center px-4">
                @yield('header')
            </div>
            <hr>
        </div>
        @yield('content')
    </div>
</div>
@endsection
