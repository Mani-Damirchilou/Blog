@extends('layouts.panel')
@section('subtitle','داشبرد')
@section('header')
    <span class="fs-6"> داشبرد > اطلاعات کلی</span>
    <a href="{{route('panel.index')}}" class="btn" data-bs-toggle="tooltip" data-bs-title="تازه سازی">
        <i class="bi bi-arrow-clockwise"></i>
    </a>
@endsection
@section('card-classes','d-none')
@section('content')
<div class="d-flex flex-column gap-4">
    <div class="card">
        <div class="card-body row gap-md-0 gap-4">
            <x-panel.dashboard.new-users/>
            <x-panel.dashboard.todays-comments/>
            <x-panel.dashboard.total-views/>

        </div>
    </div>
    <div class="row gap-sm-0 gap-4">

        <x-panel.dashboard.latest-articles/>
        <x-panel.dashboard.latest-comments/>

    </div>
</div>
@endsection
