@extends('layouts.panel')
@section('header')
    <h4>دسته بندی ها</h4>
    @can('ساخت دسته بندی')
        <a href="{{route('categories.create')}}" class="btn btn-primary rounded-circle" data-bs-toggle="tooltip" data-bs-title="دسته بندی جدید" data-bs-placement="bottom"><i class="bi bi-plus fs-5"></i></a>
    @endcan
@endsection
@section('content')
    <div class="table-responsive">
        <table class="table table-hover table-bordered text-center">
            <thead class="table-primary">
            <tr>
                <th scope="col">شناسه</th>
                <th scope="col">نام</th>
                <th scope="col">سریال</th>
                <th scope="col"> تاریخ ساخت </th>
                <th scope="col"> عملیات </th>
            </tr>
            </thead>
            <tbody class="table-group-divider">
            @foreach($categories as $category)
                <tr>
                    <th scope="row">{{$category->id}}</th>
                    <td>{{$category->name}}</td>
                    <td>{{$category->slug}}</td>
                    <td>{{$category->created_at}}</td>
                    <td>
                        @can('ویرایش دسته بندی')
                            <a href="{{route('categories.edit',$category->id)}}" class="link-primary"><i class="bi bi-pencil-square"></i></a>
                        @endcan
                        |
                            @can('حذف دسته بندی')
                                <a href="{{route('categories.delete',$category->id)}}" class="link-danger"><i class="bi bi-trash"></i></a>
                            @endcan
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-center" dir="ltr">
        {{$categories->links()}}
    </div>
@endsection
