@extends('layouts.panel')
@section('subtitle','دسته بندی ها > لیست همه')
@section('header')
    <span class="fs-6">دسته بندی ها > لیست همه</span>
    @can('ساخت دسته بندی')
        <a href="{{route('categories.create')}}" data-bs-toggle="tooltip" data-bs-title="دسته بندی جدید" class="btn btn-sm rounded-3 btn btn-primary"><i class="bi bi-plus "></i></a>
    @endcan
@endsection
@section('card-header')
    لیست دسته بندی ها
@endsection
@section('card-body')
    @if($categories->isEmpty())
        <div class="d-flex flex-column justify-content-center align-items-center gap-3 fs-5">
            هنوز هیچ دسته بندی ای به ثبت نرسیده است !
            @can('ساخت دسته بندی')
                <a href="{{route('categories.create')}}" class="btn btn-primary">
                    ساخت دسته بندی
                </a>
            @endcan
        </div>
    @endif
@endsection
@section('table',$categories->isEmpty() ? "d-none" : '')
@section('table-head')
    <th scope="col">#</th>
    <th scope="col">نام</th>
    <th scope="col">سریال</th>
    <th scope="col">تاریخ ساخت</th>
    <th scope="col">آخرین بروزرسانی</th>
    <th scope="col">اقدامات</th>
@endsection
@section('table-body')
    @foreach($categories as $category)
        <tr>
            <th>{{$category->id}}</th>
            <td>{{$category->name}}</td>
            <td>{{$category->slug}}</td>
            <td>{{$category->created_at_to_persian}}</td>
            <td>{{$category->updated_at_to_persian}}</td>
            <td>
                <div class="d-flex justify-content-center gap-2">
                    @can('ویرایش دسته بندی')
                        <a href="{{route('categories.edit',$category->id)}}" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil-square"></i></a>
                    @endcan
                    @can('حذف دسته بندی')
                        <a href="{{route('categories.delete',$category->id)}}" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></a>
                    @endcan
                </div>
            </td>
        </tr>
    @endforeach
@endsection
@section('card-footer-classes')
    @if(!$categories->hasPages())
        d-none
    @endif
    justify-content-center d-flex align-items-center
@endsection
@section('card-footer-attributes')
    dir="ltr"
@endsection
@section('card-footer')
    {{$categories->links()}}
@endsection
