@extends('layouts.main')
@section('subtitle')
    نتیجه جست و جو برای :
    {{request()->query('q')}}
@endsection
@section('content')
    <div class="card">
        <div class="card-header fs-4">
            نتیجه جست و جو برای :
            {{request()->query('q')}}
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
                    نتیجه ای پیدا نشد !
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
