@extends('root')
@section('title','پنل مدیریت')
@section('body')
    <div style="height: 100vh" class="d-flex flex-column">
        <x-panel.navbar/>

        <div class="h-100 d-flex overflow-hidden">

            <x-panel.sidebar/>
            <div class="w-100 d-flex flex-column border-top-0 border-start-0 border-bottom-0 border-end ">
                <div class="border-bottom py-3 px-4 d-flex justify-content-between align-items-center">
                    @yield('header')
                </div>
                <div class="p-4 h-100 overflow-auto d-flex flex-column gap-4">
                @yield('content')
                </div>
            </div>

        </div>

    </div>
@endsection
