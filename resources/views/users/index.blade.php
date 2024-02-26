@extends('layouts.panel')
@section('subtitle','کاربران > لیست همه')
@section('header')
    <span class="fs-6">کاربران > لیست همه</span>
    @can('ساخت کاربر')
        <a href="{{route('users.create')}}" data-bs-toggle="tooltip" data-bs-title="کاربر جدید" class="btn btn-sm rounded-3 btn btn-primary"><i class="bi bi-plus "></i></a>
    @endcan
@endsection
@section('content')
    <div class="card">
        <div class="card-header fs-4">
            لیست کاربران
        </div>
        <div class="card-body table-responsive">
            @if($users->isEmpty())
                <div class="d-flex flex-column justify-content-center align-items-center fs-5 gap-4">
                <span>
                هیچ کاربری ثبت نشده است !
                </span>
                    @can('ساخت کاربر')
                        <a href="{{route('users.create')}}"  class="btn rounded-3 btn btn-primary">ساخت کاربر</a>
                    @endcan
                </div>
            @else
                <table class="table text-center table-hover">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">نام</th>
                        <th scope="col">ایمیل</th>
                        <th scope="col">نقش</th>
                        <th scope="col">حالت شب</th>
                        <th scope="col">عکس پروفایل</th>
                        <th scope="col">تاریخ عضویت</th>
                        <th scope="col">آخرین بروزرسانی</th>
                        <th scope="col">اقدامات</th>
                    </tr>
                    </thead>
                    <tbody class="table-group-divider">

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
                            <td><a href="{{$user->profile}}">مشاهده</a></td>
                            <td>{{$user->created_at_to_persian}}</td>
                            <td>{{$user->updated_at_to_persian}}</td>
                            <td class="d-flex gap-2 justify-content-center">
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
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            @endif
        </div>
        @if($users->hasPages())
            <div class="card-footer d-flex justify-content-center " dir="ltr">
                {{$users->links()}}
            </div>
        @endif
    </div>
@endsection
