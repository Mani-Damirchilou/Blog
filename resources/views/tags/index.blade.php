@extends('layouts.panel')
@section('subtitle','برچسب ها > لیست همه')
@section('header')
    <span class="fs-6">برچسب ها > لیست همه</span>
    @can('ساخت برچسب')
        <a href="{{route('tags.create')}}" data-bs-toggle="tooltip" data-bs-title="برچسب جدید" class="btn btn-sm rounded-3 btn btn-primary"><i class="bi bi-plus "></i></a>
    @endcan
@endsection
@section('card-header')
    لیست برچسب ها
@endsection
@section('card-body')
    @if($tags->isEmpty())
        <div class="d-flex flex-column justify-content-center align-items-center gap-3 fs-5">
            هنوز برچسبی به ثبت نرسیده است !
            @can('ساخت برچسب')
                <a href="{{route('tags.create')}}" class="btn btn-primary">
                    ساخت برچسب
                </a>
            @endcan
        </div>
    @endif
@endsection
@section('table',$tags->isEmpty() ? "d-none" : '')
@section('table-head')
    <th scope="col">#</th>
    <th scope="col">نام</th>
    <th scope="col">سریال</th>
    <th scope="col">تاریخ ساخت</th>
    <th scope="col">آخرین بروزرسانی</th>
    <th scope="col">اقدامات</th>
@endsection
@section('table-body')
    @foreach($tags as $tag)
        <tr>
            <th>{{$tag->id}}</th>
            <td>{{$tag->name}}</td>
            <td>{{$tag->slug}}</td>
            <td>{{$tag->created_at_to_persian}}</td>
            <td>{{$tag->updated_at_to_persian}}</td>
            <td>
                <div class="d-flex justify-content-center gap-2">
                    @can('ویرایش برچسب')
                        <a href="{{route('tags.edit',$tag->id)}}" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil-square"></i></a>
                    @endcan
                    @can('حذف برچسب')
                        <a href="{{route('tags.delete',$tag->id)}}" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></a>
                    @endcan
                </div>
            </td>
        </tr>
    @endforeach

@endsection
@section('card-footer-classes')
    @if(!$tags->hasPages())
        d-none
    @endif
    justify-content-center d-flex align-items-center
@endsection
@section('card-footer-attributes')
    dir="ltr"
@endsection
@section('card-footer')
    {{$tags->links()}}
@endsection


