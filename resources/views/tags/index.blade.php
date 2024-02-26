@extends('layouts.panel')
@section('subtitle','برچسب ها > لیست همه')
@section('header')
    <span class="fs-6">برچسب ها > لیست همه</span>
    @can('ساخت برچسب')
        <a href="{{route('tags.create')}}" data-bs-toggle="tooltip" data-bs-title="برچسب جدید" class="btn btn-sm rounded-3 btn btn-primary"><i class="bi bi-plus "></i></a>
    @endcan
@endsection
@section('content')
<div class="card">
    <div class="card-header fs-4">
        لیست برچسب ها
    </div>
    <div class="card-body table-responsive">
        @if($tags->isEmpty())
            <div class="d-flex flex-column justify-content-center align-items-center fs-5 gap-4">
                <span>
                هیچ برچسبی ثبت نشده است !
                </span>
                @can('ساخت برچسب')
                    <a href="{{route('tags.create')}}"  class="btn rounded-3 btn btn-primary">ساخت برچسب</a>
                @endcan
            </div>
        @else
            <table class="table text-center table-hover">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">نام</th>
                    <th scope="col">سریال</th>
                    <th scope="col">تاریخ ساخت</th>
                    <th scope="col">آخرین بروزرسانی</th>
                    <th scope="col">اقدامات</th>
                </tr>
                </thead>
                <tbody class="table-group-divider">

                @foreach($tags as $tag)
                    <tr>
                        <th>{{$tag->id}}</th>
                        <td>{{$tag->name}}</td>
                        <td>{{$tag->slug}}</td>
                        <td>{{$tag->created_at_to_persian}}</td>
                        <td>{{$tag->updated_at_to_persian}}</td>
                        <td class="d-flex gap-2 justify-content-center">
                            @can('ویرایش برچسب')
                                <a href="{{route('tags.edit',$tag->id)}}" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil-square"></i></a>
                            @endcan
                                @can('حذف برچسب')
                                    <a href="{{route('tags.delete',$tag->id)}}" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></a>
                                @endcan
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        @endif
    </div>
    @if($tags->hasPages())
    <div class="card-footer d-flex justify-content-center " dir="ltr">
        {{$tags->links()}}
    </div>
    @endif
</div>
@endsection
