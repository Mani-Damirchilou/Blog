@extends('layouts.panel')
@section('header')
    <h4>نقش ها</h4>
    @can('ساخت نقش')
        <a href="{{route('roles.create')}}" class="btn btn-primary rounded-circle" data-bs-toggle="tooltip" data-bs-title="نقش جدید" data-bs-placement="bottom"><i class="bi bi-plus fs-5"></i></a>
    @endcan
@endsection
@section('content')
    <div class="table-responsive">
        <table class="table table-hover table-bordered text-center">
            <thead class="table-primary">
            <tr>
                <th scope="col">شناسه</th>
                <th scope="col">نام</th>
                <th scope="col">مجوز (ها)</th>
                <th scope="col">عملیات</th>
            </tr>
            </thead>
            <tbody class="table-group-divider">
            @foreach($roles as $role)
                <tr>
                    <th scope="row">{{$role->id}}</th>
                    <td>{{$role->name}}</td>
                    <td>
                        @if(!$role->permissions->isEmpty())
                        {{implode(' , ',$role->permissions->pluck('name')->toArray())}}
                        @else
                            -
                        @endif
                    </td>
                    <td>
                        @can('ویرایش نقش')
                            <a href="{{route('roles.edit',$role->id)}}" class="link-primary"><i class="bi bi-pencil-square"></i></a>
                        @endcan
                        |
                            @can('حذف نقش')
                                <a href="{{route('roles.delete',$role->id)}}" class="link-danger"><i class="bi bi-trash"></i></a>
                            @endcan
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-center" dir="ltr">
        {{$roles->links()}}
    </div>
@endsection
