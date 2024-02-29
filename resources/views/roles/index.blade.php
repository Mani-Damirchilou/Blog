@extends('layouts.panel')
@section('subtitle','نقش ها > لیست همه')
@section('header')
    <span class="fs-6">نقش ها > لیست همه</span>
    @can('ساخت نقش')
        <a href="{{route('roles.create')}}" data-bs-toggle="tooltip" data-bs-title="نقش جدید" class="btn btn-sm rounded-3 btn btn-primary"><i class="bi bi-plus "></i></a>
    @endcan
@endsection
@section('card-header')
    لیست نقش ها
@endsection
@section('card-body')
    @if($roles->isEmpty())
        <div class="d-flex flex-column justify-content-center align-items-center gap-3 fs-5">
            هنوز نقشی به ثبت نرسیده است !
            @can('ساخت نقش')
                <a href="{{route('roles.create')}}" class="btn btn-primary">
                    ساخت نقش
                </a>
            @endcan
        </div>
    @endif
@endsection
@section('table',$roles->isEmpty() ? "d-none" : '')
@section('table-head')
    <th scope="col">#</th>
    <th scope="col">نام</th>
    <th scope="col">دسترسی (ها)</th>
    <th scope="col">تاریخ ساخت</th>
    <th scope="col">آخرین بروزرسانی</th>
    <th scope="col">اقدامات</th>
@endsection
@section('table-body')
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
            <td>
                <div class="d-flex gap-2 justify-content-center">
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
                </div>
            </td>
        </tr>
    @endforeach

@endsection
@section('card-footer-classes')
    @if(!$roles->hasPages())
        d-none
    @endif
    justify-content-center d-flex align-items-center
@endsection
@section('card-footer-attributes')
    dir="ltr"
@endsection
@section('card-footer')
    {{$roles->links()}}
@endsection

