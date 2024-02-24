@extends('layouts.panel')
@section('header')
    <h4>کاربر ها</h4>
    @can('ساخت کاربر')
    <a href="{{route('users.create')}}" class="btn btn-primary rounded-circle" data-bs-toggle="tooltip" data-bs-title="کاربر جدید" data-bs-placement="bottom"><i class="bi bi-plus fs-5"></i></a>
    @endcan
@endsection
@section('content')
    <div class="table-responsive">
    <table class="table table-hover table-bordered text-center">
        <thead class="table-primary">
        <tr>
            <th scope="col">شناسه</th>
            <th scope="col">نام</th>
            <th scope="col">ایمیل</th>
            <th scope="col"> تاریخ عضویت </th>
            <th scope="col"> عملیات </th>
        </tr>
        </thead>
        <tbody class="table-group-divider">
        @foreach($users as $user)
        <tr>
            <th scope="row">{{$user->id}}</th>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->created_at}}</td>
            <td>
                @can(['ویرایش کاربر','update'],$user)
                <a href="{{route('users.edit',$user->id)}}" class="link-primary"><i class="bi bi-pencil-square"></i></a>
                @endcan
                |
                @can(['حذف کاربر','delete'],$user)
                        <a href="{{route('users.delete',$user->id)}}" class="link-danger"><i class="bi bi-trash"></i></a>
                    @endcan
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    </div>
    <div class="d-flex justify-content-center" dir="ltr">
        {{$users->links()}}
    </div>
@endsection
