@extends('layouts.panel')
@section('subtitle','گزارشات > لیست همه')
@section('header')
    <span class="fs-6">گزارشات > لیست همه</span>
@endsection
@section('card-header')
    لیست گزارشات
@endsection
@section('card-body')
    @if($logs->isEmpty())
        <div class="d-flex flex-column justify-content-center align-items-center gap-3 fs-5">
            هنوز هیچ گزارشی به ثبت نرسیده است !
        </div>
    @endif
@endsection
@section('table',$logs->isEmpty() ? "d-none" : '')
@section('table-head')
    <th scope="col">#</th>
    <th scope="col">متن</th>
    <th scope="col">تاریخ ثبت</th>
@endsection
@section('table-body')
    @foreach($logs as $log)
        <tr>
            <th>{{$log->id}}</th>
            <td>{{$log->text}}</td>
            <td>{{$log->created_at_to_persian}}</td>
    @endforeach
@endsection
@section('card-footer-classes')
    @if(!$logs->hasPages())
        d-none
    @endif
    justify-content-center d-flex align-items-center
@endsection
@section('card-footer-attributes')
    dir="ltr"
@endsection
@section('card-footer')
    {{$logs->links()}}
@endsection

