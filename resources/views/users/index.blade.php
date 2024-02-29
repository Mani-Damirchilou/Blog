@extends('layouts.panel')
@section('subtitle','کاربران > لیست همه')
@section('header')
    <span class="fs-6">کاربران > لیست همه</span>
    @can('ساخت کاربر')
        <a href="{{route('users.create')}}" data-bs-toggle="tooltip" data-bs-title="کاربر جدید" class="btn btn-sm rounded-3 btn btn-primary"><i class="bi bi-plus "></i></a>
    @endcan
@endsection
@section('card-header')
    لیست کاربر ها
@endsection
@section('card-body')
    @if($users->isEmpty())
        <div class="d-flex flex-column justify-content-center align-items-center gap-3 fs-5">
            هنوز هیچ کاربری به ثبت نرسیده است !
            @can('ساخت کاربر')
                <a href="{{route('users.create')}}" class="btn btn-primary">
                    ساخت کاربر
                </a>
            @endcan
        </div>
    @endif
@endsection
@section('table',$users->isEmpty() ? "d-none" : '')
@section('table-head')
    <th scope="col">#</th>
    <th scope="col">نام</th>
    <th scope="col">ایمیل</th>
    <th scope="col">نقش</th>
    <th scope="col">حالت شب</th>
    <th scope="col">مسدود شده</th>
    <th scope="col">عکس پروفایل</th>
    <th scope="col">تاریخ عضویت</th>
    <th scope="col">آخرین بروزرسانی</th>
    <th scope="col">اقدامات</th>
@endsection
@section('table-body')
    @foreach($users as $user)
        <tr>
            <th>{{$user->id}}</th>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>
                @if(!$user->roles->isEmpty())
                    {{implode(' , ',$user->roles->pluck('name')->toArray())}}
                @else
                    -
                @endif
            </td>
            <td class="text-{{$user->dark_mode ? 'success' : 'danger'}}">{{$user->dark_mode ? 'فعال' : 'غیر فعال'}}</td>
            <td class="text-{{$user->is_banned ? 'danger' : 'success'}}">{{$user->is_banned ? 'بله' : 'خیر'}}</td>
            <td><a href="{{$user->profile}}">مشاهده</a></td>
            <td>{{$user->created_at_to_persian}}</td>
            <td>{{$user->updated_at_to_persian}}</td>
            <td>
                <div class="d-flex gap-2 justify-content-center">
                    @can(['ویرایش کاربر','update'],$user)
                        <a href="{{route('users.edit',$user->id)}}" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil-square"></i></a>
                    @else
                        -
                    @endcan
                    @can(['حذف کاربر','delete'],$user)
                        <a href="{{route('users.delete',$user->id)}}" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></a>
                    @else
                        -
                    @endcan
                </div>
            </td>
        </tr>
    @endforeach


@endsection
@section('card-footer-classes')
    @if(!$users->hasPages())
        d-none
    @endif
    justify-content-center d-flex align-items-center
@endsection
@section('card-footer-attributes')
    dir="ltr"
@endsection
@section('card-footer')
    {{$users->links()}}
@endsection


