@extends('layouts.main')
@section('subtitle')
    مقالات مرتبط با کاربر -
    {{request()->user->name}}
@endsection
@section('content')
    <div class="card">
        <div class="card-header fs-4 d-flex justify-content-center align-items-center ">
            <div class="d-flex gap-2 align-items-center">
                <img src="{{request()->user->profile}}" class="rounded-circle border border-2 " style="height: 35px;width: 35px" alt="">
                <span>
                {{request()->user->name}}
                </span>
            </div>
        </div>
        <div class="card-body row g-4">
            @if(!$articles->isEmpty())
                @foreach($articles as $article)
                    <div class="col-lg-3 col-md-4 col-sm-6 d-flex justify-content-center">
                        <x-main.article-box :article="$article"/>
                    </div>
                @endforeach
            @else
                <div class="col-12 text-center fs-4">
                    این کاربر هیچ مقاله ای به ثبت نرسانده است !
                </div>
            @endif
        </div>
        @if($articles->hasPages())
            <div class="card-footer d-flex justify-content-center" dir="ltr">
                {{$articles->links()}}
            </div>
        @endif
    </div>
@endsection
