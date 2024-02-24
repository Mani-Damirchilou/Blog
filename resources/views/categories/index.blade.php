@extends('layouts.panel')
@section('header')
    <span class="fs-6">دسته بندی ها > لیست همه</span>
    @can('ساخت دسته بندی')
        <a href="{{route('categories.create')}}" data-bs-toggle="tooltip" data-bs-title="دسته بندی جدید" class="btn btn-sm rounded-3 btn btn-primary"><i class="bi bi-plus "></i></a>
    @endcan
@endsection
@section('content')
<div class="card">
    <div class="card-header fs-4">
        لیست دسته بندی ها
    </div>
    <div class="card-body table-responsive">
        @if($categories->isEmpty())
            <div class="d-flex flex-column justify-content-center align-items-center fs-5 gap-4">
                <span>
                هیچ دسته بندی ثبت نشده است !
                </span>
                @can('ساخت دسته بندی')
                    <a href="{{route('categories.create')}}"  class="btn rounded-3 btn btn-primary">ساخت دسته بندی</a>
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
                    <th scope="col">اقدامات</th>
                </tr>
                </thead>
                <tbody class="table-group-divider">

                @foreach($categories as $category)
                    <tr>
                        <th>{{$category->id}}</th>
                        <td>{{$category->name}}</td>
                        <td>{{$category->slug}}</td>
                        <td>{{$category->created_at}}</td>
                        <td class="d-flex gap-2 justify-content-center">
                            @can('ویرایش دسته بندی')
                                <a href="{{route('categories.edit',$category->id)}}" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil-square"></i></a>
                            @endcan
                                @can('حذف دسته بندی')
                                    <a href="{{route('categories.delete',$category->id)}}" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></a>
                                @endcan
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        @endif
    </div>
    @if($categories->hasPages())
    <div class="card-footer d-flex justify-content-center " dir="ltr">
        {{$categories->links()}}
    </div>
    @endif
</div>
@endsection
