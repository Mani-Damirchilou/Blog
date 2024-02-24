@extends('root')
@section('title','پنل مدیریت')
@section('body')
<div class="d-flex bg-dark-subtle overflow-hidden" style="height: 100vh">
    <x-panel.sidebar/>
    <div class="bg-light shadow-lg rounded-4 p-4 m-4 w-100 overflow-auto d-flex flex-column gap-4" >

        <div class="d-md-none">
            <button class="btn btn-primary" data-bs-toggle="offcanvas" data-bs-target="#sidebar"><i class="bi bi-list"></i></button>
            <hr class="mb-0">
        </div>

            <div class="d-flex justify-content-between align-items-baseline px-4">
                @yield('header')
            </div>

        <hr class="m-0">
        @yield('content')
    </div>
</div>
@endsection
