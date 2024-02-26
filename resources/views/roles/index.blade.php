@extends('layouts.panel')
@section('subtitle','نقش ها > لیست همه')
@section('header')
    <span class="fs-6">نقش ها > لیست همه</span>
    @can('ساخت نقش')
        <a href="{{route('roles.create')}}" data-bs-toggle="tooltip" data-bs-title="نقش جدید" class="btn btn-sm rounded-3 btn btn-primary"><i class="bi bi-plus "></i></a>
    @endcan
@endsection
@section('content')
    <div class="card">
        <div class="card-header fs-4">
            لیست نقش ها
        </div>
        <div class="card-body table-responsive">
            @if($roles->isEmpty())
                <div class="d-flex flex-column justify-content-center align-items-center fs-5 gap-4">
                <span>
                هیچ نقشی ثبت نشده است !
                </span>
                    @can('ساخت نقش')
                        <a href="{{route('roles.create')}}"  class="btn rounded-3 btn btn-primary">ساخت نقش</a>
                    @endcan
                </div>
            @else
                <table class="table text-center table-hover">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">نام</th>
                        <th scope="col">دسترسی (ها)</th>
                        <th scope="col">تاریخ ساخت</th>
                        <th scope="col">آخرین بروزرسانی</th>
                        <th scope="col">اقدامات</th>
                    </tr>
                    </thead>
                    <tbody class="table-group-divider">

                    @foreach($roles as $role)
                        <tr>
                            <th>{{$role->id}}</th>
                            <td>{{$role->name}}</td>
                            <td>
                                @if(!$role->permissions->isEmpty())
                                    {{implode(' , ',$role->permissions->pluck('name')->toArray())}}
                                @else
                                    -
                                @endif
                            </td>
                            <td>{{$role->created_at_to_persian}}</td>
                            <td>{{$role->updated_at_to_persian}}</td>
                            <td class="d-flex gap-2 justify-content-center">
                                @can('ویرایش نقش')
                                    <a href="{{route('roles.edit',$role->id)}}" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil-square"></i></a>
                                @else
                                    -
                                @endcan
                                @can('حذف نقش')
                                    <a href="{{route('roles.delete',$role->id)}}" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></a>
                                @else
                                    -
                                @endcan
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            @endif
        </div>
        @if($roles->hasPages())
            <div class="card-footer d-flex justify-content-center " dir="ltr">
                {{$roles->links()}}
            </div>
        @endif
    </div>
@endsection
