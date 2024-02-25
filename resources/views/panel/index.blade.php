@extends('layouts.panel')
@section('header')
    <span class="fs-6"> داشبرد</span>
    <a href="{{route('panel.index')}}" class="btn" data-bs-toggle="tooltip" data-bs-title="تازه سازی">
        <i class="bi bi-arrow-clockwise"></i>
    </a>
@endsection
@section('content')
<div class="card">
    <div class="card-body row gap-md-0 gap-4">
        <x-panel.dashboard.new-users/>
        <div class="col-md-4">
            <div class="card text-bg-primary">
                <div class="card-body fs-1 d-flex justify-content-center align-items-center py-5">

                </div>
                <div class="card-footer fs-4 text-center">

                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-bg-primary">
                <div class="card-body fs-1 d-flex justify-content-center align-items-center py-5">

                </div>
                <div class="card-footer fs-4 text-center">

                </div>
            </div>
        </div>
    </div>
</div>
    <div class="row gap-sm-0 gap-4">

        <x-panel.dashboard.latest-articles/>
        <x-panel.dashboard.latest-articles/>

    </div>
@endsection
